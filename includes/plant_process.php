<?php
    session_start();
    include_once('db_conn.php');
    
    // Getting Data from the Form
    $planted_id = $_GET['id'];
    
    $query = mysql_query("UPDATE `sold` SET `planted` = '1' WHERE `id` = '$planted_id'");
    
    if ($query == true){
        $_SESSION['alert'] = "<div class='alert alert-success'>Successfully Planted these Trees.</div>";
        header("Location: ../planting.php"); 
    }else{
        $_SESSION['alert'] = "<div class='alert alert-danger'>There was an Error completing this Task.</div>";
        header("Location: ../planting.php");   
    }