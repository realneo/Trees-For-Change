<?php include_once 'includes/header.php';?>
<?php include_once 'includes/left_pane.php';?>
<?php include_once 'includes/db_conn.php';?>

<div class='span9'>
    <h4>Assign</h4>
    <?php 
        $assign_id = $_GET['id'];
        //$assign_id = 42;
    
    ?>
    
    <?php
        if ($_SESSION['alert'] == true){
            echo $_SESSION['alert'];
        }else{
            // Do nothin
        }
    ?>
    
    <?php
            
            $result = mysql_query("SELECT * FROM `sold` WHERE `id` = '$assign_id'");
            $num = 0;
            while($row = mysql_fetch_array($result)){
                $num++;
                $plaque_name_id = $row['plaque_name_id'];
                $quantity = $row['quantity'];
                $date = $row['date'];
                $donor_id = $row['donor_id'];
                
                $result2 = mysql_query("SELECT * FROM `plaque_name` WHERE `id` = '$plaque_name_id'");
                while($rows = mysql_fetch_array($result2)){
                    $plaque_name = $rows['name'];
                }
                
                $result3 = mysql_query("SELECT * FROM `donor` WHERE `id` = '$donor_id'");
                while($rowss = mysql_fetch_array($result3)){
                    $donor_name = $rowss['first_name'].' '.$rowss['middle_name'].' '. $rowss['last_name'];
                }
                echo "
                        <p><small>DATE:</small> <b>{$date}</b></p>
                        <p><small>DONOR:</small> <b>{$donor_name}</b></p>
                        <p><small>PLAQUE NAME:</small> <b>{$plaque_name}</b></p>
                        <p><small>QUANTITY:</small> <b>{$quantity}</b></p>
                    ";
            }
        ?>
    
   <?php
        $result = mysql_query("SELECT * FROM `sold` WHERE `id` = '$assign_id'");
        while($row = mysql_fetch_array($result)){
            if($row['assigned'] == 0){
                include_once'includes/assign_form.php'; 
            }else{
                echo "<span class='badge badge-info'><h5>ASSIGNED</h5></span>";
            }
            if($row['planted'] == 1){
            echo "<span class='badge badge-success'><h5>PLANTED</h5></span>";
        }
        }
        
   ?>
    
    
</div><!-- span9 -->

<?php include_once 'includes/footer.php';?>