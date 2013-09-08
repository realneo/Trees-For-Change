<?php
    session_start();
    include_once('db_conn.php');
    
    // Getting Data from the Form
    $name = $_GET['id'];
    
    $q = "DELETE FROM `tree_type` WHERE `id` = '$name'";
    
    if(mysql_query($q) == true){
        $_SESSION['alert'] = "<div class='alert alert-success'>Tree Name was successfully Deleted</div>";
        header("Location: ../add_tree_type.php");
    }else{
        $_SESSION['alert'] = "<div class='alert alert-error'>There was an error deleting this Tree Name</div>";
        header("Location: ../add_tree_type.php");
    }

?>
