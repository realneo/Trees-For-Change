<?php
    session_start();
    include_once('db_conn.php');
    
    // Getting Data from the Form
    $id = $_GET['id'];
        
    // Cheking to see if location is associated with any transaction
    $qq = mysql_query("SELECT * FROM `sold` WHERE `location_id` = '$id'");
    $qqq = mysql_query("SELECT * FROM `nursery` WHERE `location_id` = '$id'");
    
    if(mysql_num_rows($qq) >= 1 || mysql_num_rows($qqq) >= 1){
        $_SESSION['alert'] = "<div class='alert alert-error'>This Location is associated with some record in the Database. This Item cannot be deleted</div>";
        header("Location: ../add_location.php");
    }else{
        mysql_query("DELETE FROM `location` WHERE `id` = '$id'");
        $_SESSION['alert'] = "<div class='alert alert-success'>Location was successfully Deleted</div>";
        header("Location: ../add_location.php");
    }

?>
