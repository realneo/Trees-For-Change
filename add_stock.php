<?php include_once 'includes/header.php';?>
<?php include_once 'includes/left_pane.php';?>
<?php include_once 'includes/db_conn.php';?>

<div class='span9'>
    <h4>Add Sown Seeds</h4> 
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
    
    <form name="add_stock_form" method="post" action="includes/add_stock_process.php">
        <div class="well well-small">
            <p><small>Add Sown Seeds</small></p>
                <?php
                    echo "<select name='store'>";
                    $q = mysql_query("SELECT * FROM `store`");
                    while($row = mysql_fetch_array($q)){
                        $seed_id = $row['id'];
                        $total_est_qty = $row['total_est_qty'];
                        $tree_type_id = $row['tree_type_id'];
                        
                        $qq = mysql_query("SELECT * FROM `tree_type` WHERE `id` = '$tree_type_id'");
                        while($rows = mysql_fetch_array($qq)){
                            $tree_type_name = $rows['name'];
                            $tree_type_id = $rows['id'];
                        }
                        $qq = mysql_query("SELECT * FROM `store` WHERE `tree_type_id` = '$tree_type_id'");
                            while($rowss = mysql_fetch_array($qq)){
                                $db_est_qty = $rowss['total_est_qty'];
                            }
                        echo"<option value = '{$seed_id}'>{$tree_type_name} - {$db_est_qty}</option>"; 
                    }
                    echo "</select>";
                ?>
            <input type='text' name='quantity' value='' placeholder ='12345' class='span1' />
            <p><small>Pricked Month</small></p>
            <select name="pricked_month">
                <option value="january">January</option>
                <option value="february">February</option>
                <option value="march">March</option>
                <option value="april">April</option>
                <option value="may">May</option>
                <option value="june">June</option>
                <option value="july">July</option>
                <option value="august">August</option>
                <option value="september">September</option>
                <option value="october">October</option>
                <option value="november">November</option>
                <option value="december">December</option>
            </select>
            <input type="hidden" name="tree_type_id" value="<?php echo $tree_type_id; ?>" />
            <br />
            <button type="submit" class="btn"><i class='icon-plus-sign'></i> Sown Seeds </button>
        </div>
    </form>
    
    
</div><!-- span9 -->

<?php include_once 'includes/footer.php';?>