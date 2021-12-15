
<?php
session_start();
require 'header.php';

// Detects if there is someone logged in.
if(isset($_SESSION["id"]) && !empty($_SESSION["id"])){
    $isAdmin = $_SESSION['role'] === 'admin';
    // Receives PDO's configuration and opens a connection with the Database.
    require 'config.php';

    // Detects if an ID was sent on the URL.
    if(isset($_GET["id"])){

    // Receives the ID and fetches all of the user's data, then sends the query to PDO.
    $id = addslashes($_GET["id"]);
    $sql = "SELECT * FROM users WHERE id = '$id'";
    $sql = $pdo->query($sql);

    // Detects if the user exists.
    if($sql->rowCount() > 0){

        // Stores user's data on $data.
        $data =  $sql->fetch();

        // Detects the submission from form.
        if(isset($_POST["submit"])){

            $name = addslashes($_POST["name"]);
            $email = addslashes($_POST["email"]);

            // This will detect if a new password has been sent, otherwise it wont change the password.
            if(isset($_POST["password"]) && !empty($_POST["password"])){
                $pass = addslashes(md5($_POST["password"]));
                $sql = "UPDATE users SET name ='$name', email='$email', password='$pass' WHERE id = '$id'";
                $pdo->query($sql);
            }else{
                $sql = "UPDATE users SET name ='$name', email='$email' WHERE id = '$id'";
                $pdo->query($sql);
            }
            header('Location: list.php');
        }        

    }else{
        header('Location: index.php');
    }

    }else{
        header('Location: index.php');
    }
?>

<h1 class="loginH">Update user: <?= $data["id"]; ?></h1>
<div class="card">
<form method="POST">
    <div class="in1">
    <label>Name:</label>
    <input type="text" name="name" value="<?= $data["name"]; ?>">
    </div>
    <div class="in2">
    <label>E-mail:</label>
    <input type="email" name="email" value="<?= $data["email"]; ?>">
    </div>
    <dib class="in3">
    <label>Password:</label>
    <input type="password" name="password">
    </dib>
    <input disabled="<?php !$isAdmin ?>" class="btn" type="submit" name="submit" value="SUBMIT">
</form>
</div>

<!-- <form method="POST" enctype="multipart/form-data" action="receiver.php">
    <input type="file" name="file[]" multiple>
    <input type="submit" name="submit" value="Submit File(s)">
</form> -->

<a href="index.php" class="back">Back</a>

<?php

}else{
    header("Location: login.php");
}

require 'footer.php';

?>