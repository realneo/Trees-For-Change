<?php
    session_start();
    include_once('db_conn.php');
    
    // Getting Data from the Form
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    
    
    // Checking if the Tree is already in the Database
    $q = mysql_query("SELECT * FROM `donor` WHERE `email` = '$email'");
    if(mysql_num_rows($q) >= 1){
        $_SESSION['alert'] = "<div class='alert alert-block'>This Email is already in the Database.</div>";
        header("Location: ../add_donor.php");
    }else{

        $q = "INSERT INTO `donor` (`id`, `date`, `first_name`, `middle_name`, `last_name`, `city`, `country`, `email`, `mobile`) 
                            VALUES (NULL, CURDATE(), '$first_name', '$middle_name', '$last_name', '$city', '$country', '$email', '$mobile');";
        if(mysql_query($q) == true){
            $_SESSION['alert'] = "<div class='alert alert-success'>Donor {$first_name} {$last_name} was successfully added.</div>";
            header("Location: ../add_donor.php");
        }else{
            $_SESSION['alert'] = "<div class='alert alert-error'>There was an Error Adding this Donor.</div>";
            header("Location: ../add_donor.php");
        }
    }

?>
