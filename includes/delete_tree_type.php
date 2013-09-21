<?php
    ob_start();
    session_start();
    include_once('db_conn.php');
    
    // Getting Data from the Form
    $id = $_GET['id'];
    
    // Cheking to see if location is associated with any transaction
    $q1 = mysql_query("SELECT * FROM `stock` WHERE `tree_type_id` = '$id'");
    $q2 = mysql_query("SELECT * FROM `seeds` WHERE `tree_type_id` = '$id'");
    $q3 = mysql_query("SELECT * FROM `serial_number` WHERE `tree_type_id` = '$id'");
    $q4 = mysql_query("SELECT * FROM `sold` WHERE `tree_type_id` = '$id'");
    $q5 = mysql_query("SELECT * FROM `sold_tree` WHERE `tree_type_id` = '$id'");
    $q6 = mysql_query("SELECT * FROM `store` WHERE `tree_type_id` = '$id'");
    
    if(mysql_num_rows($q1) >= 1 || mysql_num_rows($q2) >= 1 || mysql_num_rows($q3) >= 1 || mysql_num_rows($q4) >= 1 || mysql_num_rows($q5) >= 1|| mysql_num_rows($q5) >= 1){
        $_SESSION['alert'] = "<div class='alert alert-block'>This Tree Type is being used in the database</div>";
        header("Location: ../add_tree_type.php");
    }else{
        mysql_query("DELETE FROM `tree_type` WHERE `id` = '$id'");
        $_SESSION['alert'] = "<div class='alert alert-success'>Tree Name was successfully Deleted</div>";
        header("Location: ../add_tree_type.php");
    }
    ob_flush();
?>