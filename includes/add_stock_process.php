<?php
    ob_start();
    session_start();
    include_once('db_conn.php');
    
    // Getting Data from the Form
    $store_id = $_POST['store'];
    $tree_type_id = $_POST['tree_type_id'];
    $quantity = $_POST['quantity'];
    $pricked_month = $_POST['pricked_month'];
    
    // Checking if the fields are all set;
    if($quantity == false){
        $_SESSION['alert'] = "<div class='alert alert-block'>Please fill in the Quantity field.</div>";
        header("Location: ../add_stock.php");
    }else{
        // Check if the quantity is less than the seeds in the database
        $result = mysql_query("SELECT * FROM `store` WHERE `id` = '$store_id'");
        while($row = mysql_fetch_array($result)){
            $db_quantity = $row['total_est_qty'];
        }
        if($quantity > $db_quantity){
            $_SESSION['alert'] = "<div class='alert alert-block'>The Quantity is Greater than The Stock.</div>";
            header("Location: ../add_stock.php");
        }else{
            // Check if the stock is already in the database
            $result2 = mysql_query("SELECT * FROM `store` WHERE `id` = '$store_id'");
            while($rowss = mysql_fetch_array($result2) ){
                $db_quantity = $rowss['total_est_qty'];
            }
            //Subtract the quantity to the `stock` table
            $diff_qty2 = $db_quantity - $quantity;
            $query = mysql_query("UPDATE `store` SET `total_est_qty` = '$diff_qty2' WHERE `id` = '$store_id'");
            if($query == true){
                
                $result3 = mysql_query("SELECT * FROM `stock` WHERE `id` = '$tree_type_id'");
                while($rows = mysql_fetch_array($result3)){
                    $db_stock_qty = $rows['quantity'];
                }
                $sum_qty = $db_stock_qty + $quantity;
                $query2 = mysql_query("UPDATE `stock` SET `quantity` = '$sum_qty' WHERE `id` = '$tree_type_id'");
                if($query2 == true){
                    $_SESSION['alert'] = "<div class='alert alert-success'>Successfully Added.</div>";
                    header("Location: ../add_stock.php"); 
                }else{
                    $_SESSION['alert'] = "<div class='alert alert-block'>There was an error updating the Tree Type database</div>";
                    header("Location: ../add_stock.php");
                }
            }else{
                $_SESSION['alert'] = "<div class='alert alert-block'>There was an error updating the Stock database</div>";
                header("Location: ../add_stock.php");
            }
        }
    }
    ob_flush();
?>