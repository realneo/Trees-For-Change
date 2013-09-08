<?php
    session_start();
    include_once('db_conn.php');
    
    // Getting Data from the Form
    $id = $_GET['id'];
    
    $q = "DELETE FROM `supplier` WHERE `id` = '$id'";
    
    if(mysql_query($q) == true){
        $_SESSION['alert'] = "<div class='alert alert-success'>Supplier was successfully Deleted</div>";
        header("Location: ../add_supplier.php");
    }else{
        $_SESSION['alert'] = "<div class='alert alert-error'>There was an error deleting this Supplier</div>";
        header("Location: ../add_supplier.php");
    }

?>
