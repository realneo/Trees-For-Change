<?php
    session_start();
    include_once('db_conn.php');
    
    // Getting Data from the Form
    $nursery_id = $_SESSION['nursery_id'];
    $tree_type_id = $_POST['tree_type'];
    $quantity = $_POST['quantity'];
    
    // Checking if the fields are all set;
    
    if($quantity == false){
        $_SESSION['alert'] = "<div class='alert alert-block'>Please fill in the Quantity field.</div>";
        header("Location: ../add_dead.php");
    }else{
        if($quantity == true){
            // Update the tree_type table
            $qq = mysql_query("SELECT * FROM `tree_type` WHERE `id` = '$tree_type_id'");
            while($row = mysql_fetch_array($qq)){
                $db_quantity = $row['quantity'];
                $db_dead = $row['dead'];
            }
            if ($db_quantity < $quantity){
                $_SESSION['alert'] = "<div class='alert alert-block'>The Dead should not exceed the Stock.</div>";
                header("Location: ../add_dead.php");
            }else{
                $total_qty = $db_quantity - $quantity;
                $total_dead = $db_dead + $quantity;
                $qqq = mysql_query("UPDATE `tree_type` SET `quantity` = '$total_qty', `dead` = '$total_dead' WHERE `id` = '$tree_type_id'");
                if($qqq = true){
                $_SESSION['alert'] = "<div class='alert alert-success'>Successfully Added {$quantity} to Dead Stock.</div>";
                header("Location: ../add_dead.php");  
            }
            }
               
        }else{
            $_SESSION['alert'] = "<div class='alert alert-error'>There was an Error Adding this Stock.</div>";
            header("Location: ../add_dead.php");
        }
    }

?>
