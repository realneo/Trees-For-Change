<?php
    session_start();
    include_once('db_conn.php');
    
    // Getting Data from the Form
    $name = $_POST['name'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $telephone = $_POST['telephone'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    
    
    // Checking if the Tree is already in the Database
    $q = mysql_query("SELECT * FROM `supplier` WHERE `name` = '$name'");
    if(mysql_num_rows($q) >= 1){
        $_SESSION['alert'] = "<div class='alert alert-block'>This Supplier is already in the Database.</div>";
        header("Location: ../add_supplier.php");
    }else{

        $q = "INSERT INTO `supplier` (`id`, `date`, `name`, `city`, `country`, `telephone`, `mobile`, `email`) 
                            VALUES (NULL, CURDATE(), '$name', '$city', '$country', '$telephone', '$mobile', '$email');";
        if(mysql_query($q) == true){
            $_SESSION['alert'] = "<div class='alert alert-success'>Supplier {$name} was successfully added.</div>";
            header("Location: ../add_supplier.php");
        }else{
            $_SESSION['alert'] = "<div class='alert alert-error'>There was an Error Adding this Supplier.</div>";
            header("Location: ../add_supplier.php");
        }
    }

?>
