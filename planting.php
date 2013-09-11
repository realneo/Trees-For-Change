<?php include_once 'includes/header.php';?>
<?php include_once 'includes/left_pane.php';?>
<?php include_once 'includes/db_conn.php';?>

<div class='span9'>
    <h4>Assigning Tree Types and Serial Numbers</h4>
    <?php
        if ($_SESSION['alert'] == true){
            echo $_SESSION['alert'];
        }else{
            // Do nothin
        }
    ?>
    <table class="table table-striped table-hover">
        <tr>
            <th>#</th>
            <th>Date</th>
            <th>Serial No.</th>
            <th>Plaque Name</th>
            <th>Quantity</th>
            <td>Action</th>
        </tr>
        
        <?php
            $result = mysql_query("SELECT * FROM `sold` WHERE `assigned` = 1 AND `planted` = 0");
            $num = 0;
            while($row = mysql_fetch_array($result)){
                $num++;
                $plaque_name_id = $row['plaque_name_id'];
                $quantity = $row['quantity'];
                $date = $row['date'];
                $sold_id = $row['id'];
                
                $result2 = mysql_query("SELECT * FROM `plaque_name` WHERE `id` = '$plaque_name_id'");
                while($rows = mysql_fetch_array($result2)){
                    $plaque_name = $rows['name'];
                }
                
                $result4 = mysql_query("SELECT * FROM `sold_tree` WHERE `plaque_name_id` = '$plaque_name_id'");
                while($rowss = mysql_fetch_array($result4)){
                    $serial_id = $rowss['serial_number_id'];
                }
                
                $serial_number_id = "TFC".str_pad($serial_id, 6, '0', STR_PAD_LEFT); 
                echo "
                    <tr>
                        <td>{$num}</td>
                        <td>{$date}</td>
                        <td>{$serial_number_id}</td>
                        <td>{$plaque_name}</td>
                        <td>{$quantity}</td>
                        <td><a href='includes/plant_process.php?id={$sold_id}' class='btn btn-mini btn-success'>Planted</a></td>
                    </tr>
                    ";
            }
        ?>
    </table>
</div><!-- span9 -->

<?php include_once 'includes/footer.php';?>