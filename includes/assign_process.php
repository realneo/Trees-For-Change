<?php
    session_start();
    include_once('db_conn.php');
    
    // Getting Data from the Form
    $tree_type_id = $_POST['tree_type'];
    $quantity = $_POST['quantity'];
    $assign_id = $_POST['assign_id'];
    
    // Getting not_assigned from the database
    $result = mysql_query("SELECT * FROM `sold` WHERE `id` = '$assign_id'");
    while($row = mysql_fetch_array($result)){
        $assigned_trees = $row['assigned_trees'];
        $total_trees = $row['quantity'];
        $not_assigned_trees = $row['not_assigned_trees'];
        $sold_id = $row['id'];
        $plaque_name_id = $row['plaque_name_id'];
    }
    
    // Getting the total quantity of the tree_type selected
    $result = mysql_query("SELECT `quantity` FROM `tree_type` WHERE `id` = '$tree_type_id'");
    while($row = mysql_fetch_array($result)){
        $tree_type_quantity = $row['quantity'];
    }
    // Check if the requested quantity is greater than of equal to the tree_type quantity
   if($quantity > $not_assigned_trees){
        $_SESSION['alert'] = "<div class='alert alert-block'>The Quantity Entered is Greater than the Requested.</div>";
        header("Location: ../assign.php");
   } elseif ($quantity > $tree_type_quantity ) {
        $_SESSION['alert'] = "<div class='alert alert-block'>The Quantity Entered is Greater than the Quantity of the Selected Tree Type.</div>";
        header("Location: ../assign.php");    
   }else{
       
       // Update the `sold` Table 
       $sold_difference = $not_assigned_trees - $quantity;
       $sold_sum = $assigned_trees + $quantity;
       $upadate_sold = mysql_query("UPDATE `sold` SET `not_assigned_trees` = '$sold_difference', `assigned_trees` = '$sold_sum' WHERE `id` = '$assign_id'");
       
       // Update the `tree_type` table
       $tree_difference = $tree_type_quantity - $quantity;
       $update_tree_type = mysql_query("UPDATE `tree_type` SET `quantity` = '$tree_difference' WHERE `id` = '$tree_type_id'");
       
       // Generate TFC serial numbers for all the assigned trees
       $qq = mysql_query("SELECT * FROM `serial_number` ORDER BY `id` DESC LIMIT 1");
       while($rowss = mysql_fetch_array($qq)){
                $last_id = $rowss['id'];
                $next_id = $last_id + 1;   
       }
       
       for ($x = 1 ; $x<=$quantity ; $x++){
           $query = mysql_query("INSERT INTO `serial_number` (`tree_type_id`, `sold_id`) VALUES ('$tree_type_id', '$sold_id')");
           // Update the `sold_tree` table
           $serial_number_id = mysql_insert_id();
            mysql_query("INSERT INTO `sold_tree` (`sold_id`, `tree_type_id`, `plaque_name_id`, `serial_number_id`) 
                                    VALUES ('$sold_id', '$tree_type_id', '$plaque_name_id', '$serial_number_id')");
           
       }
       
       // Update the `sold` Table if all the trees are assigned
       $result = mysql_query("SELECT * FROM `sold` WHERE `id` = '$assign_id'");
        
       while($row = mysql_fetch_array($result)){
            $not_assigned_trees = $row['not_assigned_trees'];
            
            if($not_assigned_trees == 0){
                mysql_query("UPDATE `sold` SET `assigned` = '1' WHERE `id` =$assign_id");
            }else{
                // Do Nothing
            }
        }
       
        
       
      $_SESSION['alert'] = "<div class='alert alert-success'>Successfully Assigned {$quantity} trees.</div>";
      
      $result = mysql_query("SELECT * FROM `sold` WHERE `id` = '$assign_id'");
        while($row = mysql_fetch_array($result)){
            if($row['assigned'] == 0){
                header("Location: ../assign.php?id={$assign_id}");
            }else{
                header("Location: ../assigning.php");
            }
        }
       
   }
    

?>
