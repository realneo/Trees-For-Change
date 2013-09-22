<?php
    session_start();
    include_once('db_conn.php');
    
    // Getting Data from the Form
    $seed_id = $_POST['seed_id'];
    $store_id = $_POST['store'];
    $quantity = $_POST['quantity'];
    $tree_type_id = $_POST['tree_type_id'];
    
    // Checking if the fields are all set;
    
    if($quantity == false){
        $_SESSION['alert'] = "<div class='alert alert-block'>Please fill in the Quantity field.</div>";
        header("Location: ../add_dead_seeds.php");
    }else{
        if($quantity == true){
            // Update the tree_type table
            $qq = mysql_query("SELECT * FROM `store` WHERE `id` = '$store_id'");
            while($row = mysql_fetch_array($qq)){
                $db_total_est_qty = $row['total_est_qty'];
                $db_total_dead_qty = $row['total_dead_qty'];
            }
            if ($db_total_est_qty < $quantity){
                $_SESSION['alert'] = "<div class='alert alert-block'>The Dead should not exceed the Stock.</div>";
                header("Location: ../add_dead_seeds.php");
            }else{
                $total_qty = $db_total_est_qty - $quantity;
                $total_dead = $db_total_dead_qty + $quantity;
                $qqq = mysql_query("UPDATE `store` SET `total_est_qty` = '$total_qty', `total_dead_qty` = '$total_dead' WHERE `id` = '$store_id'");
                if($qqq = true){
                    $_SESSION['alert'] = "<div class='alert alert-success'>Successfully Added {$quantity} to Dead Stock.</div>";
                    header("Location: ../add_dead_seeds.php");  
                }
            }
               
        }else{
            $_SESSION['alert'] = "<div class='alert alert-error'>There was an Error Adding this Stock.</div>";
            header("Location: ../add_dead.php");
        }
    }

?>
