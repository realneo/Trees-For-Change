 <form name="add_stock_form" method="post" action="includes/add_stock_process.php">
        <div class="well well-small">
            <p><small>Select Tree and Add New Stock</small></p>
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
            <button type="submit" class="btn"><i class='icon-plus-sign'></i> Add Stock</button>
        </div>
    </form>