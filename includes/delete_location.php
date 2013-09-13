<?php
    session_start();
    include_once('db_conn.php');
    
    // Getting Data from the Form
    $id = $_GET['id'];
    
    $q = "DELETE FROM `location` WHERE `id` = '$id'";
    
    if(mysql_query($q) == true){
        $_SESSION['alert'] = "<div class='alert alert-success'>Location was successfully Deleted</div>";
        header("Location: ../add_location.php");
    }else{
        $_SESSION['alert'] = "<div class='alert alert-error'>There was an error deleting this Location</div>";
        header("Location: ../add_location.php");
    }

?>
