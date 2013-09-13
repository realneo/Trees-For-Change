<?php
    session_start();
    include_once('db_conn.php');
    
    // Getting Data from the Form
    $name = $_POST['name'];
    $location_id = $_POST['location'];
    
    
    // Checking if the Tree is already in the Database
    $q = mysql_query("SELECT * FROM `nursery` WHERE `name` = '$name'");
    if(mysql_num_rows($q) >= 1){
        $_SESSION['alert'] = "<div class='alert alert-block'>This Nursery is already in the Database.</div>";
        header("Location: ../add_nursery.php");
    }else{

        $q = "INSERT INTO `nursery` (`id` ,`date`, `name` ,`location_id`) VALUES (NULL ,CURDATE() ,'$name', '$location_id')";
        if(mysql_query($q) == true){
            $_SESSION['alert'] = "<div class='alert alert-success'>Nursery {$name} was successfully added.</div>";
            header("Location: ../add_nursery.php");
        }else{
            $_SESSION['alert'] = "<div class='alert alert-error'>There was an Error Adding this Nursery.</div>";
            header("Location: ../add_nursery.php");
        }
    }

?>
