<?php

// Detects if there was in fact a file that was sent.
if($_FILES['file']['size'][0] > 0){
    // Detects the ammount of files added.
    if(count($_FILES['file']['tmp_name']) > 0){

        // For each file it counts, it increments.
        for($c=0;$c<count($_FILES['file']['tmp_name']);$c++){

            // Receives the file name, and its entry according with the for function above.
            $path = $_FILES['file']['name'][$c];

            // Uses pathinfo to find it's extension.
            $extension = pathinfo($path, PATHINFO_EXTENSION);

            // $filename receives a hashed file name, entry, with the current time and a random number from 0 to 999, 
            // finally it receives a dot and the extension above, so there is no way to replace sent files via the sent function.
            $filename = md5($_FILES['file']['name'][$c].time().rand(0,999)).'.'.$extension;

            // Moves the uploaded file to its respective path with its new name.
            move_uploaded_file($_FILES['file']['tmp_name'][$c], 'uploaded-files/'.$filename);
        
        }

        // Counts how many files were added.
        $msg = count($_FILES['file']['tmp_name']);
            if($msg > 1){
                echo "The files were added.";
            }else{
                echo "The file was added.";
            }
            header("Refresh:2; url=".$_SERVER['HTTP_REFERER']);
        
    }else{
        echo "No files were added.";
        header("Refresh:2; url=".$_SERVER['HTTP_REFERER']);
    }
}else{
    echo "No files were added.";
    header("Refresh:2; url=".$_SERVER['HTTP_REFERER']);
}

require 'footer.php';

?>