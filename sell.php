<?php include_once 'includes/header.php';?>
<?php include_once 'includes/left_pane.php';?>
<?php include_once 'includes/db_conn.php';?>

<div class='span9'>
    <h4>Sell Trees</h4>
    <?php
        if ($_SESSION['alert'] == true){
            echo $_SESSION['alert'];
        }else{
            // Do nothin
        }
    ?>
    
    <?php
    include_once 'includes/sell_form.php';
    ?>
    
    <p>Recent Sold Trees</p>
    
    <table class="table table-striped table-hover">
        <tr>
            <th>#</th>
            <th>Date</th>
            <th>Donor</th>
            <th>Plaque Name</th>
            <th>Quantity</th>
            <th>Assigned</th>
            <th>Planted</th>
        </tr>
        
        <?php
            $q = mysql_query("SELECT * FROM `sold` ORDER BY `id` DESC LIMIT 5");
            $num = 0;
            
            while($row = mysql_fetch_array($q)){
                $id = $row['id']; 
                $num++;
                $date = $row['date'];
                $donor_id = $row['donor_id'];
                
                $qq = mysql_query("SELECT * FROM `donor` WHERE `id` = '$donor_id'");
                while($rows = mysql_fetch_array($qq)){
                    $first_name = $rows['first_name'];
                    $middle_name = $rows['middle_name'];
                    $last_name = $rows['last_name'];
                    $donor = $first_name . ' ' . $last_name;
                    
                }
                $plaque_name_id = $row['plaque_name_id'];
                
                $qqq = mysql_query("SELECT * FROM `plaque_name` WHERE `id` = '$plaque_name_id'");
                while($rowss = mysql_fetch_array($qqq)){
                    $plaque_name = $rowss['name'];
                }
                $quantity = $row['quantity'];
                
                if($row['assigned'] == 0){
                    $assigined = 'No';
                }else{
                    $assigined = 'Yes';
                }
                if ($row['planted'] == 0){
                    $planted = 'No';
                }else{
                    $planted = 'Yes';
                }
                echo"
                    <input type='hidden' name='id' value='{$id}' />
                    <tr>
                        <td>{$num}</td>
                        <td>{$date}</td>
                        <td>{$donor}</td>
                        <td>{$plaque_name}</td>
                        <td>{$quantity}</td>
                        <td>{$assigined}</td>
                        <td>{$planted}</td>
                        
                    </tr>
                    ";
            }
        ?>
    </table>
    
</div><!-- span9 -->

<?php include_once 'includes/footer.php';?>