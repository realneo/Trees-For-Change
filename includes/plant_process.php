<?php
    session_start();
    include_once('db_conn.php');
    
    // Getting Data from the Form
    $sold_id = $_GET['id'];
    $location_id = $_GET['location'];
    
    // Checking if all the field are filled
        $_SESSION['alert'] = "<div class='alert alert-block'>Please fill in the Location and GPS Coodinates.</div>";
        header("Location: ../planting.php");
        
        $query = mysql_query("UPDATE `sold` SET `planted` = '1', `location_id` = '$location_id' WHERE `id` ='$sold_id'");

        if ($query == true){
            $_SESSION['alert'] = "<div class='alert alert-success'>Successfully Planted these Trees.</div>";
            header("Location: ../planting.php"); 
        }else{
            $_SESSION['alert'] = "<div class='alert alert-danger'>There was an Error completing this Task.</div>";
            header("Location: ../planting.php");   
        }