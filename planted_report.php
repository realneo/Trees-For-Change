<?php include_once 'includes/header.php';?>
<?php include_once 'includes/left_pane.php';?>
<?php include_once 'includes/db_conn.php';?>

<div class='span9'>
    <h4>Planted Treess Report</h4>
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
            <th>Below 9 Months</th>
            <th>1 to 2 Years</th>
            <th>2 Years & Above</th>
        </tr>
        <?php
            $num = 0;
            $result = mysql_query("SELECT * FROM `planted`");
            while($row = mysql_fetch_array($result)){
                $num++;
                $planted_date = $row['date']; 
                $sold_id = $row['sold_id'];
                $result2 = mysql_query("SELECT * FROM `sold` WHERE `id` = '$sold_id'");
                while($rows = mysql_fetch_array($result2)){
                    $quantity = $rows['quantity'];
                }
                
                // Trees Below 9 Months
                $today = date('Y-m-d');
                $subscription_start = strtotime($planted_date);
		$now = strtotime($today);
		
		function total_months($a){
			$year = date("Y", $a);
			$ymonths= $year * 12;
			
			$month = date("n", $a);
			$total = $ymonths + $month;
						
			return $total;
		}

		echo $dif = abs(total_months($subscription_start) - total_months($today));
                

            }
        ?>
        
    </table>
    
<?php include_once 'includes/footer.php';?>