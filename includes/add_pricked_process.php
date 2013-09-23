<?php
    ob_start();
    session_start();
    include_once('db_conn.php');
    
    // Getting Data from the Form
    $stock_id = $_POST['stock'];   
    $quantity = $_POST['quantity'];
 
    // Checking if the fields are all set;
    if($quantity == false){
        $_SESSION['alert'] = "<div class='alert alert-block'>Please fill in the Quantity field.</div>";
        header("Location: ../add_pricked_trees.php");
    }else{
        // Check if the quantity is less than the seeds in the database
        $result = mysql_query("SELECT * FROM `stock` WHERE `id` = '$stock_id'");
        while($row = mysql_fetch_array($result)){
            $db_quantity = $row['quantity'];
            $tree_type_id = $row['tree_type_id'];
        }
        if($quantity > $db_quantity){
            $_SESSION['alert'] = "<div class='alert alert-block'>The Quantity is Greater than The Stock.</div>";
            header("Location: ../add_pricked_trees.php");
        }else{
            // Check if the stock is already in the database
            $result2 = mysql_query("SELECT * FROM `stock` WHERE `id` = '$stock_id'");
            while($rowss = mysql_fetch_array($result2) ){
                $db_quantity = $rowss['quantity'];
            }
            //Subtract the quantity to the `stock` table
            $diff_qty2 = $db_quantity - $quantity;
            $query = mysql_query("UPDATE `stock` SET `quantity` = '$diff_qty2' WHERE `id` = '$stock_id'");
            if($query == true){
                
                $result3 = mysql_query("SELECT * FROM `tree_type` WHERE `id` = '$tree_type_id'");
                while($rows = mysql_fetch_array($result3)){
                    $db_type_qty = $rows['quantity'];
                }
                $sum_qty = $db_type_qty + $quantity;
                $query2 = mysql_query("UPDATE `tree_type` SET `quantity` = '$sum_qty' WHERE `id` = '$tree_type_id'");
                if($query2 == true){
                    $_SESSION['alert'] = "<div class='alert alert-success'>Successfully Added.</div>";
                    header("Location: ../add_pricked_trees.php"); 
                }else{
                    $_SESSION['alert'] = "<div class='alert alert-block'>There was an error updating the Tree Type database</div>";
                    header("Location: ../add_pricked_trees.php");
                }
            }else{
                $_SESSION['alert'] = "<div class='alert alert-block'>There was an error updating the Stock database</div>";
                header("Location: ../add_pricked_trees.php");
            }
        }
    }
    ob_flush();
?>