<?php include_once 'includes/header.php';?>
<?php include_once 'includes/left_pane.php';?>
<?php include_once 'includes/db_conn.php';?>

<div class='span9'>
    <h4>Add Dead Trees</h4> 
    <?php
        if ($_SESSION['alert'] == true){
            echo $_SESSION['alert'];
        }else{
            // Do nothin
        }
    ?>
    
    <?php
        // Clear Selection
        if($_GET['clear'] == true){
            $_SESSION['nursery_id'] = false;  
        }
        // Setting Sessions
        if ($_SESSION['nursery_id'] == false){
            $_SESSION['nursery_id'] = $_GET['nursery'];
            $nursery_id = $_SESSION['nursery_id'];
        }
        
        // Getting The Names from the Database
        $q = mysql_query("SELECT * FROM `supplier` WHERE `id` = '$supplier_id'");
        while($row = mysql_fetch_array($q)){
            $supplier_name = $row['name'];
            $_SESSION['supplier_name'] = $supplier_name;
        }
        
        if($_SESSION['nursery_id'] == true){
            include_once 'includes/add_dead_form.php';
        }else{
            include_once 'includes/select_nursery_form2.php';
        }
        
        
        
    ?>
   
    
    
</div><!-- span9 -->

<?php include_once 'includes/footer.php';?>