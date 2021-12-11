<!-- This snippet was made by Glori4n(https://glori4n.com) as an exercise -->

<?php
session_start();

// Detects if there is someone logged in.
if(isset($_SESSION["id"]) && !empty($_SESSION["id"])){

    require 'config.php';

    // Detects if an ID was sent on the URL.
    if(isset($_GET["id"])){

        // Receives the ID and sends the DELETE query to PDO.
        $id = addslashes($_GET["id"]);
        $sql = "DELETE FROM users WHERE id = '$id'";
        $pdo->query($sql);

        header('Location: list.php');

    }else{
    header('Location: index.php');
    }

}else{
    header("Location: login.php");
}

require 'footer.php';

?>