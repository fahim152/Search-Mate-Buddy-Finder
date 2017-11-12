<?php
    $src = $_FILES['img']['tmp_name'];
    $dest = $_FILES['img']['name'];
    
    if(move_uploaded_file($src, $dest)){
       echo $dest;
    }    
?>