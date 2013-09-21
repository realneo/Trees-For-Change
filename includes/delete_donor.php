<?php
    session_start();
    include_once('db_conn.php');
    
    // Getting Data from the Form
    $id = $_GET['id'];
    
    // Cheking to see if donor is associated with any transaction
    $qq = mysql_query("SELECT * FROM `sold` WHERE `donor_id` = '$id'");
    
    if(mysql_num_rows($qq) >= 1){
        $_SESSION['alert'] = "<div class='alert alert-danger'>This Donor is associated with some record in the Database. This Item cannot be deleted</div>";
        header("Location: ../add_donor.php");
    }else{
        mysql_query("DELETE FROM `donor` WHERE `id` = '$id'");
        $_SESSION['alert'] = "<div class='alert alert-success'>Donor was successfully Deleted</div>";
        header("Location: ../add_donor.php");
    }

?>
