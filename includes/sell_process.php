<?php
    session_start();
    include_once('db_conn.php');
    
    // Getting Data from the Form
    $donor_id = $_POST['donor'];
    $quantity = $_POST['quantity'];
    
    // Checking if all the fields are selected
    
    If($_POST['plaque_name_input'] == false ){
        $_SESSION['alert'] = "<div class='alert alert-block'>Please Write the plaque name field.</div>";
        header("Location: ../sell.php");
    }else if($quantity == false){
        $_SESSION['alert'] = "<div class='alert alert-block'>Please fill in the Quantity field.</div>";
        header("Location: ../sell.php");
    }else{
        $plaque_name = $_POST['plaque_name_input'];
        
        // Insert a new plaque_name 
        mysql_query("INSERT INTO `plaque_name` (`id`, `name`) VALUES (NULL, '$plaque_name')");
        $plaque_name_id = mysql_insert_id();
        
        $q = "INSERT INTO `sold` (`id`, `date`, `donor_id`, `plaque_name_id`, `quantity`, `not_assigned_trees`) 
                        VALUES (NULL, CURDATE(), '$donor_id', '$plaque_name_id', '$quantity', '$quantity')";
        if(mysql_query($q)==true){
            
            
            // Update Donor Table for the total number of trees planted
            $qq = mysql_query("SELECT `trees` FROM `donor` WHERE `id` = '$donor_id'");
            while($row = mysql_fetch_array($qq)){
                $db_quantity = $row['trees'];
            }
            $total = $db_quantity + $quantity;
            $qqq = mysql_query("UPDATE `donor` SET `trees` = '$total' WHERE `id` =$donor_id");
            
            
            $_SESSION['alert'] = "<div class='alert alert-success'>Successfully Sold {$quantity} trees.</div>";
            header("Location: ../sell.php"); 
        }else{
            $_SESSION['alert'] = "<div class='alert alert-error'>There was an Error selling these trees.</div>";
            header("Location: ../sell.php");
        }
    }
    

?>
