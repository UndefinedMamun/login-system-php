

<?php
require 'header.php';
session_start();



// Detects if there someone logged in.
if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
    $isAdmin = $_SESSION['role'] === 'admin';
    // Receives PDO's configuration and opens a connection with the Database.
    require 'config.php';

    // Fetches all users and sends it to the PDO.
    $sql = "SELECT * FROM users";
    $sql = $pdo->query($sql);
    
?>
<nav class="navbar">
<h2 style="text-align:center"><a href="add.php">Add USER</a></h2>
<div style='text-align:center' class="logout"><a href='logout.php'>Logout</a></div>
</nav>

<!-- Table for the users' display. -->
<div class="tcard">
<table width="100%">
    <tr>
    <th>Name</th>
    <th>E-mail</th>
    <?php if($isAdmin) echo "<th>Actions</th>" ?>
    </tr>
    <?php
    if($sql->rowCount() > 0){
    foreach($sql->fetchAll() as $user){
        echo "<tr>";
        echo "<td style='text-align:center'>".$user["name"]."</td>";
        echo "<td style='text-align:center'>".$user["email"]."</td>";
        if($isAdmin) echo '<td style="text-align:center"><a href="edit.php?id='.$user["id"].'">Edit</a> - <a href="delete.php?id='.$user["id"].'">Delete</a>';
        echo "</tr>";
    }
    }else{
    echo "There are no registered users.";
    }
?>
</table>
</div>


<?php

}else{
    header("Location: login.php");
}

require 'footer.php';

?>