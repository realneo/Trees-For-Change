<?php include_once 'includes/header.php';?>
<?php include_once 'includes/left_pane.php';?>
<?php
    include_once 'includes/db_conn.php';
    // Total Trees Planted
    $result = mysql_query("SELECT * FROM `sold_tree`");
    $total_trees_planted = mysql_num_rows($result);
    
    // Total Tree Types
    $result = mysql_query("SELECT * FROM `tree_type`");
    $total_trees_types = mysql_num_fields($result);
    
    // Total Nurseries
    $result = mysql_query("SELECT * FROM `nursery`");
    $total_nurseries = mysql_num_fields($result);
    
    // Total Pending Assignments
    $result = mysql_query("SELECT * FROM `sold` WHERE `assigned` = 0");
    $total_not_assigned = 0;
    while($row = mysql_fetch_array($result)){
        $not_assigned_trees = $row['not_assigned_trees'];
        $total_not_assigned += $not_assigned_trees;
    }
    
    // Total Pending planting
    $result = mysql_query("SELECT * FROM `sold` WHERE `planted` = 0");
    $total_not_planted = 0;
    while($row = mysql_fetch_array($result)){
        $assigned_trees = $row['assigned_trees'];
        $total_not_planted += $assigned_trees;
    }
    
    // Last TFC Number
    $result = mysql_query("SELECT * FROM `serial_number` ORDER BY `id` DESC LIMIT 1");
    while($row = mysql_fetch_array($result)){
        $last_tfc_id = $row['id'];
        $serial_number_id = "TFC".str_pad($last_tfc_id, 6, '0', STR_PAD_LEFT);
    }
?>
<div class='span9'>
    <div class="row">
        <div class="span3">
            <h5>Statistics</h5>
            <div class="line_breaker"></div>
            <p><small>Total Trees Planted : </small><b><?php echo $total_trees_planted; ?></b></p>
            <p><small>Pending Assignments : </small><b><?php echo $total_not_assigned; ?></b></p>
            <p><small>Pending Planting : </small><b><?php echo $total_not_planted; ?></b></p>
            <p><small>Tree Types : </small><b><?php echo $total_trees_types; ?></b></p>
            <p><small>Nurseries : </small><b><?php echo $total_nurseries; ?></b></p>
            <p><small>Last Serial Number : </small><b><?php echo $serial_number_id; ?></b></p>
        </div>
        <div class="span4"></div>
    </div>
    
</div>

<?php include_once 'includes/footer.php';?>