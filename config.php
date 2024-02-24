<?php
    $conn = mysqli_connect('localhost', 'root', '', 'jwelery');
    if(!$conn){
        die("Could not connect to database".mysqli_connect_error());
    }
?>