<!-- This snippet was made by Glori4n(https://glori4n.com) as an exercise -->

<?php
session_start();

// Detects if there is someone logged in.
if(isset($_SESSION["id"]) && !empty($_SESSION["id"])){
    require 'config.php';


// Receives data from forms.
$name = addslashes(@$_POST["name"]);
$email = addslashes(@$_POST["email"]);
$password = addslashes(md5(@$_POST["password"]));

$sql = "INSERT INTO users (name, email, password) values ('$name', '$email', '$password')";

// Detects if there is a form submission, and sends $sql's query to PDO.
if(isset($_POST["submit"])){
    $pdo->query($sql);
    header('Location: index.php');
}

?>

<h2>Register a new user:</h2>
<form method="POST">
    <label>Name:</label>
    <input type="text" name="name">
    <label>E-mail:</label>
    <input type="email" name="email">
    <label>Password:</label>
    <input type="password" name="password">
    <input type="submit" name="submit">
</form>

<a href="index.php">Back</a>

<?php

}else{
    header("Location: login.php");
}

require 'footer.php';

?>