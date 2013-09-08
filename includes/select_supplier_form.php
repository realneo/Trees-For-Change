 <form name="add_stock_form" method="get" action="add_stock.php">
        <div class="well well-small">
            <p><small>Select Supplier</small></p>
            <select name="supplier">
                <?php
                    $q = mysql_query("SELECT * FROM `supplier`"); 
                    while($row = mysql_fetch_array($q)){
                        $supplier_id = $row['id'];
                        $supplier_name = $row['name'];
                        echo"<option value = '{$supplier_id}'>{$supplier_name}</option>";
                    }
                ?>
            </select>
            <br />
            
            <button type="submit" class="btn">Select Supplier</button>
        </div>
    </form>