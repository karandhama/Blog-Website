<?php
    $image = $_POST['image_choose'];
    $temp = explode(".", $image);
    $newfilename = round(microtime(true)) . '.' . end($temp);
    move_uploaded_file($image, "Blogs/" . $newfilename);
    echo $image;
?>