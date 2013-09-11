<?php
    session_start();
    include_once('db_conn.php');
    
    // Getting Data from the Form
    $id = $_GET['id'];
    
    $q = "DELETE FROM `donor` WHERE `id` = '$id'";
    
    if(mysql_query($q) == true){
        $_SESSION['alert'] = "<div class='alert alert-success'>Donor was successfully Deleted</div>";
        header("Location: ../add_donor.php");
    }else{
        $_SESSION['alert'] = "<div class='alert alert-error'>There was an error deleting this Donor</div>";
        header("Location: ../add_donor.php");
    }

?>
