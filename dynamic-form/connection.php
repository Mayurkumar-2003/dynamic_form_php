<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "dynamic_form";

    $obj = new mysqli($host, $user, $pass, $db);
    // echo "<pre>"; print_r($obj); exit();
    if ($obj->connect_errno != 0) 
    {
        echo $obj->connect_error;
        exit;
    }
?>