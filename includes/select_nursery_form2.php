 <form name="add_dead_form" method="get" action="add_dead.php">
        <div class="well well-small">
            <p><small>Select Nursery</small></p>
            <select name="nursery">
                <?php
                    $q = mysql_query("SELECT * FROM `nursery`");
                    while($row = mysql_fetch_array($q)){
                        $nursery_id = $row['id'];
                        $nursery_name = $row['name'];
                        echo"<option value = '{$nursery_id}'>{$nursery_name}</option>"; 
                    }
                ?>
            </select>
            <br />
            
            <button type="submit" class="btn"><i class='icon-plus-sign'></i> Select Nursery</button>
        </div>
    </form>