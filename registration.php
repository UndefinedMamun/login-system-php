<?php
session_start();
require 'header.php';

require 'config.php';


// Receives data from forms.
$name = addslashes(@$_POST["name"]);
$email = addslashes(@$_POST["email"]);
$password = addslashes(md5(@$_POST["password"]));

$sql = "INSERT INTO users (name, email, password) values ('$name', '$email', '$password')";

// Detects if there is a form submission, and sends $sql's query to PDO.
if (isset($_POST["submit"])) {
    $pdo->query($sql);
    header('Location: index.php');
}

?>

<h1 class="loginH">Register a new user:</h1>
<div class="card">
    <form method="POST">
        <div class="in1">
            <label>Name:</label>
            <input type="text" name="name">
        </div>
        <div class="in2">
            <label>E-mail:</label>
            <input type="email" name="email">
        </div>
        <div class="in3">
            <label>Password:</label>
            <input type="password" name="password">
        </div>
        <input class="btn" type="submit" name="submit" value="SUBMIT">
    </form>
</div>

<a href="index.php" class="back">Back</a>

<?php

require 'footer.php';

?>