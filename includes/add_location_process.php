<?php
    session_start();
    include_once('db_conn.php');
    
    // Getting Data from the Form
    $location_name = $_POST['name'];
    $longitude = $_POST['longitude'];
    $latitude = $_POST['latitude'];
    
    
    // Checking if the Tree is already in the Database
    $q = mysql_query("SELECT * FROM `location` WHERE `name` = '$location_name'");
    if(mysql_num_rows($q) >= 1){
        $_SESSION['alert'] = "<div class='alert alert-block'>This Location is already in the Database.</div>";
        header("Location: ../add_location.php");
    }else{

        $q = "INSERT INTO `location` (`id`, `name`, `longitude`, `latitude`) VALUES (NULL, '$location_name', '$longitude', '$latitude')";
        if(mysql_query($q) == true){
            $_SESSION['alert'] = "<div class='alert alert-success'>Location {$location_name} was successfully added.</div>";
            header("Location: ../add_location.php");
        }else{
            $_SESSION['alert'] = "<div class='alert alert-error'>There was an Error Adding this Donor.</div>";
            header("Location: ../add_location.php");
        }
    }

?>
