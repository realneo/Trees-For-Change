 <form name="add_dead_form" method="post" action="includes/add_dead_seeds_process.php">
        <div class="well well-small">
            <p><small>Add Dead Seeds</small></p>
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
                        }
                        echo"<option value = '{$seed_id}'>{$tree_type_name} - {$total_est_qty}</option>"; 
                    }
                    echo "</select>";
                ?>
            <input type='text' name='quantity' value='' placeholder ='12345' class='span1' />
            <input type="hidden" name="seed_id" value="<?php echo $seed_id; ?>" />
            <input type="hidden" name="tree_type_id" value="<?php echo $tree_type_id; ?>" />
            <br />
            <button type="submit" class="btn"><i class='icon-plus-sign'></i> Add Dead Trees</button>
        </div>
    </form>