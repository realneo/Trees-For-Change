 <form name="sell_form" method="post" action="includes/sell_process.php">
        <div class="well well-small">
            <p><small>Select A Donor</small></p>
                <?php
                    echo "<select name='donor' class='span4'>";
                    $q = mysql_query("SELECT * FROM `donor`");
                    while($row = mysql_fetch_array($q)){
                        $id = $row['id'];
                        $first_name = $row['first_name'];
                        $middle_name = $row['middle_name'];
                        $last_name = $row['last_name'];
                        echo"<option value = '{$id}'>ID {$id} - {$first_name} {$middle_name} {$last_name}</option>"; 
                    }
                    echo "</select>";
                ?>
            <p><small>Select Plaque Name or Add a New Name</small></p>
            <input type='text' name='plaque_name_input' value='' placeholder ='Imran Khalfan' class='span3' />
            <p><small>Quantity of Trees</small></p>
            <input type='text' name='quantity' value='' placeholder ='12345' class='span1' />
            <br />
            <button type="submit" class="btn">Sell</button>
        </div>
    </form>