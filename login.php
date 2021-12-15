<?php 
require 'header.php';
session_start();

// Detects if there is someone logged in.
if(!isset($_SESSION["id"]) && empty($_SESSION["id"])){
    
    // Detects if there was a submission from forms.
    if(isset($_POST["submit"])){

        $email = addslashes($_POST["email"]);
        $password = md5(addslashes($_POST["password"]));

        // Receives PDO's configuration and opens a connection with the Database.
        require 'config.php';

        // Directly sends the query to PDO with the form's data.
        $sql = $pdo->query("SELECT * FROM users WHERE email='$email' AND password='$password'");
        
        // Detects if it finds and user.
        if($sql->rowCount() > 0){

            // Fetches user's data and stores it on $data.
            $data = $sql->fetch();

            // Stores user's id on the session's id, therefore loggin in the user.
            $_SESSION["id"] = $data["id"];
            $_SESSION['role'] = $data['role'];
            $_SESSION['name'] = $data['name'];
            header("Location: index.php");

        }else{
            echo "Incorrect password, please try again.";
        }
    }

?>
    <div class="dgn1 dgn "></div>
    <div class="dgn2 dgn"></div>
    <div class="dgn3 dgn"></div>
    <div class="dgn4 dgn"></div>
    <div class="card">
        <h1 class="loginH" >Log &nbsp;<span class="i">i</span>n </h1>

        <form method="POST">
            <div class="in1">
            <label>E-mail</label>
            <input type="email" name="email">
            </div>
            <div class="in2">
            <label>Password</label>
            <input type="password" name="password">
            </div>
            <input class="btn" type="submit" name="submit" value="SUBMIT">
            <a style="top: 90%;" class="back" href="registration.php">Registration</a>
        </form>
    </div>

<?php

}else{
    echo "<h1> You are already logged in.</h1>";
    echo "<a href='logout.php'>Click here to log out</a>";
    header("Refresh:3; url=list.php");
}

require 'footer.php';

?>