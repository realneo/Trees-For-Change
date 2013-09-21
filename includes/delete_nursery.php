<?php
    session_start();
    include_once('db_conn.php');
    
    // Getting Data from the Form
    $id = $_GET['id'];
    
    // Cheking to see if location is associated with any transaction
    $qq = mysql_query("SELECT * FROM `stock` WHERE `nursery_id` = '$id'");
    
    if(mysql_num_rows($qq) >= 1){
        $_SESSION['alert'] = "<div class='alert alert-block'>This Nursery is associated with some data in the Database</div>";
        header("Location: ../add_nursery.php");
    }else{
        mysql_query("DELETE FROM `nursery` WHERE `id` = '$id'");
        
        $_SESSION['alert'] = "<div class='alert alert-success'>Nursery was successfully Deleted</div>";
        header("Location: ../add_nursery.php");
    }

?>
