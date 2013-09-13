 <form name="add_dead_form" method="post" action="includes/add_dead_process.php">
        <div class="well well-small">
            <p><small>Add Dead Trees</small></p>
                <?php
                    echo "<select name='tree_type'>";
                    $q = mysql_query("SELECT * FROM `tree_type`");
                    while($row = mysql_fetch_array($q)){
                        $id = $row['id'];
                        $name = $row['name'];
                        $quantity = $row['quantity'];
                        echo"<option value = '{$id}'>{$name} - {$quantity}</option>"; 
                    }
                    echo "</select>";
                ?>
            <input type='text' name='quantity' value='' placeholder ='12345' class='span1' />
            <br />
            <button type="submit" class="btn"><i class='icon-plus-sign'></i> Add Dead Trees</button>
        </div>
    </form>