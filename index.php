<!-- This snippet was made by Glori4n(https://glori4n.com) as an exercise -->

<?php

session_start();

// Detects if there is someone logged in.
if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
    echo "<h1> You are logged in with the id: ".$_SESSION["id"]."</h1>";
    header("Refresh:2; url=list.php");
}else{
    header("Location: login.php");
}

require 'footer.php';

?>