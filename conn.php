<?php
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "uper_id";

    $conn = mysqli_connect($servername,$username,$password,$db);

    if(!$conn){
        die("error");
    }

?>