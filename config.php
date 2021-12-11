<!-- This snippet was made by Glori4n(https://glori4n.com) as an exercise -->

<?php

    // Declaration of PDO's parameters.
    $dsn = "mysql:dbname=custom;host=127.0.0.1";
    $dbuser = "root";
    $dbpass = "";

    // Will attempt a connection with PDO, using the parameters listed above, if it fails, it will catch PDO's exception and store it on $e. 
    try {
        $pdo = new PDO($dsn, $dbuser, $dbpass);

    } catch(PDOException $e) {
        echo "Failed: ".$e->getMessage();
    }

?>