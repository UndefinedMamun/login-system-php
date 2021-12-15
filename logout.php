

<?php
session_start();

// Stores null on the current Session ID, therefore logging out the user.
$_SESSION["id"] = null;
session_destroy();
echo "<h1> You were logged out.</h1>";
header("Refresh:1; url=index.php");

require 'footer.php';
?>