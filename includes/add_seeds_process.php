<?php
    session_start();
    include_once('db_conn.php');
    
    // Getting Data from the Form
    $supplier_id = $_POST['supplier'];
    $tree_type_id = $_POST['tree_type'];
    $weight = $_POST['weight'];
    $est_qty = $_POST['est_qty'];
    
    // Check if all fields are filled
    if($weight == FALSE || $est_qty == FALSE){
        $_SESSION['alert'] = "<div class='alert alert-block'>Please Fill in Both Fields.</div>";
        header("Location: ../add_seeds.php");
    }
    
    // Check if both fields are numbers
    if(!is_numeric($weight) || !is_numeric($est_qty)){
        $_SESSION['alert'] = "<div class='alert alert-block'>Please Fill in the Fields with Numbers Only.</div>";
        header("Location: ../add_seeds.php");
    }
 
    // Insert the Data to `seeds` table
    $query = mysql_query("INSERT INTO `seeds` (`id`, `date`, `supplier_id`, `tree_type_id`, `weight`, `est_qty`) 
                                    VALUES (NULL, CURDATE(), '$supplier_id', '$tree_type_id', '$weight', '$est_qty')");
    
    //Assign the Seed Id
    $seed_id  = mysql_insert_id();
    
    // Insert the Data to `store` table
    if($query == TRUE){
               
        // Check if the tree_type is already in the table
        $q = mysql_query("SELECT * FROM `store` WHERE `tree_type_id` = '$tree_type_id'");
        if(mysql_num_rows($q) == 0){
            mysql_query("INSERT INTO `store` (`id`, `tree_type_id`, `total_weight`, `total_est_qty`) 
                                        VALUES (NULL, '$tree_type_id', '$weight', '$est_qty')");
            $_SESSION['alert'] = "<div class='alert alert-success'>Stock was successfully added.</div>";
            header("Location: ../add_seeds.php");
        }else{
            // Get the quantity of the est_qty
            $qq = mysql_query("SELECT * FROM `store` WHERE `tree_type_id` = '$tree_type_id'");
            while($row = mysql_fetch_array($qq)){
                $db_est_qty = $row['total_est_qty'];
                $db_weight = $row['total_weight'];
            }
            $total_est_qty = $db_est_qty + $est_qty;
            $total_weight = $db_weight + $weight;
            mysql_query("UPDATE `store` SET `total_weight` = '$total_weight', `total_est_qty` = '$total_est_qty' WHERE `tree_type_id` = '$tree_type_id'");
            $_SESSION['alert'] = "<div class='alert alert-success'>Stock was successfully added.</div>";
            header("Location: ../add_seeds.php");
        }
    }

?>
