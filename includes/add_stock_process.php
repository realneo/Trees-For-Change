<?php
    session_start();
    include_once('db_conn.php');
    
    // Getting Data from the Form
    $supplier_id = $_SESSION['supplier_id'];
    $nursery_id = $_SESSION['nursery_id'];
    $tree_type_id = $_POST['tree_type'];
    $quantity = $_POST['quantity'];
    
    // Checking if the fields are all set;
    
    if($quantity == false){
        $_SESSION['alert'] = "<div class='alert alert-block'>Please fill in the Quantity field.</div>";
        header("Location: ../add_stock.php");
    }else{
        $q = "INSERT INTO `stock` (`id`, `date`, `supplier_id`, `nursery_id`, `tree_type_id`, `quantity`) 
                            VALUES (NULL, CURDATE(), '$supplier_id', '$nursery_id', '$tree_type_id', '$quantity')";
        if(mysql_query($q) == true){
            // Update the tree_type table
            $qq = mysql_query("SELECT `quantity` FROM `tree_type` WHERE `id` = '$tree_type_id'");
            while($row = mysql_fetch_array($qq)){
                $db_quantity = $row['quantity'];
            }
            $total = $db_quantity + $quantity;
            
            $qqq = mysql_query("UPDATE `tree_type` SET `quantity` = '$total' WHERE `id` =$tree_type_id");
            
            if($qqq = true){
                $_SESSION['alert'] = "<div class='alert alert-success'>Successfully Added {$quantity} to Stock.</div>";
                header("Location: ../add_stock.php");  
            }
               
        }else{
            $_SESSION['alert'] = "<div class='alert alert-error'>There was an Error Adding this Stock.</div>";
            header("Location: ../add_stock.php");
        }
    }

?>
