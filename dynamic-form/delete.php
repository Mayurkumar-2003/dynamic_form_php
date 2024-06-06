<?php
    include "connection.php";
    // $host = "localhost";
    // $user = "root";
    // $password = "";
    // $database = "dynamic_form";

    // $connection = mysqli_connect($host, $user, $password, $database);

    $delete_id = $_GET['del_id'];
    // echo "<pre>"; print_r($delete_id); exit();
    $sql = $obj->query("delete from index_master where id='$delete_id'");

    // if($connection)
    // {
        if($sql)
        {
            header("location:table_data1.php");
        }
        else {
            echo "<script>alert('Data Delete Succesful')</script>";
        }
    // }
    // else {
    //     echo "<script>alert('Database not connected')</script>";
    // }
?>