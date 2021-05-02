<?php
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "uper.id";

    $conn = mysqli_connect($servername,$username,$password,$db);

    if(!$conn){
        die("error");
    }

?>