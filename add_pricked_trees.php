<?php include_once 'includes/header.php';?>
<?php include_once 'includes/left_pane.php';?>
<?php include_once 'includes/db_conn.php';?>

<div class='span9'>
    <h4>Add Pricked Trees</h4> 
    <?php
        if ($_SESSION['alert'] == true){
            echo $_SESSION['alert'];
        }else{
            // Do nothin
        }
    ?>
    
    <?php
        
        // Getting The Names from the Database
        $q = mysql_query("SELECT * FROM `seeds`");
        while($row = mysql_fetch_array($q)){
            $seed_id = $row['id'];
        }
    ?>
    
    <form name="add_pricked_form" method="post" action="includes/add_pricked_process.php">
        <div class="well well-small">
            <p><small>Add Pricked Trees</small></p>
                <?php
                    echo "<select name='stock'>";
                    $q = mysql_query("SELECT * FROM `stock`");
                    while($row = mysql_fetch_array($q)){
                        $stock_id = $row['id'];
                        $tree_type_id = $row['tree_type_id'];
                        $quantity = $row['quantity'];
                        $pricked_month = $row['pricked_month'];
                        $qq = mysql_query("SELECT * FROM `tree_type` WHERE `id` = '$tree_type_id'");
                        while($rows = mysql_fetch_array($qq)){
                            $tree_type_name = $rows['name'];
                            $db_tree_type_id = $rows['id'];
                        }
                        
                        echo"<option value = '{$stock_id}'>{$tree_type_name} - {$quantity}</option>"; 
                    }
                    echo "</select>";
                ?>
            <input type='text' name='quantity' value='' placeholder ='12345' class='span1' />
            <br />
            <button type="submit" class="btn"><i class='icon-plus-sign'></i> Pricked Trees </button>
        </div>
    </form>
    
    
</div><!-- span9 -->

<?php include_once 'includes/footer.php';?>