<?php
    session_start();
    include_once('db_conn.php');
    
    // Getting Data from the Form
    $id = $_GET['id'];
    
    // Cheking to see if location is associated with any transaction
    $qq = mysql_query("SELECT * FROM `store` WHERE `supplier_id` = '$id'");
    
    if(mysql_num_rows($qq) >= 1){
        $_SESSION['alert'] = "<div class='alert alert-error'>There was an error deleting this Supplier</div>";
        header("Location: ../add_supplier.php");
    }else{
        
        mysql_query("DELETE FROM `supplier` WHERE `id` = '$id'");
        $_SESSION['alert'] = "<div class='alert alert-success'>Supplier was successfully Deleted</div>";
        header("Location: ../add_supplier.php");
    }

?>
