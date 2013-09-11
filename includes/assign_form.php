 <div class="well well-large">
        <p><small>Total Trees Request : <b><?php echo $quantity; ?></b></small></p>
        <p><small>Trees Not Assigned: <b>
            <?php
                $result = mysql_query("SELECT `not_assigned_trees` FROM `sold` WHERE `id` = '$assign_id'");
                while($row = mysql_fetch_array($result)){
                    echo $row['not_assigned_trees'];
                }
            ?>
            <input type='hidden' name='not_assigned' value='<?php echo $not_assigned ?>' />
        </b></small></p>
        <p><small>Trees Assigned: <b>
            <?php
                $result = mysql_query("SELECT `assigned_trees` FROM `sold` WHERE `id` = '$assign_id'");
                while($row = mysql_fetch_array($result)){
                    echo $row['assigned_trees'];
                }
            ?>
        </b></small></p>
        <form name='assign_form' method='post' action='includes/assign_process.php'>
            <p><small>Select Tree Type: 
                <select name="tree_type">
                    <?php
                        $result = mysql_query("SELECT * FROM `tree_type` ORDER BY `name` ASC");
                        while($row = mysql_fetch_array($result)){
                            $id = $row['id'];
                            $name = $row['name'];
                            $quantity = $row['quantity'];
                            echo "<option value='{$id}'>{$name} - {$quantity}</option>";
                        }
                    ?>  
                </select>
            </small></p>

            <p><small>Select Quantity :</small> <input type='text' name='quantity' placeholder='12345' class='span1' /></p>

            <input type='hidden' name='assign_id' value='<?php echo $assign_id ?>' />
            
            <button class='btn btn-info' type='submit'>Assign</button>
        </form>
    </div>