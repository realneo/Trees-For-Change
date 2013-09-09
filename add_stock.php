<?php include_once 'includes/header.php';?>
<?php include_once 'includes/left_pane.php';?>
<?php include_once 'includes/db_conn.php';?>

<div class='span9'>
    <h4>Add Stock</h4> 
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
            $_SESSION['supplier_id'] = false;
            $_SESSION['nursery_id'] = false;  
        }
        // Setting Sessions
        if($_SESSION['supplier_id'] == false){
           $_SESSION['supplier_id'] = $_GET['supplier'];
           $supplier_id = $_SESSION['supplier_id'];
        }
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
        $q = mysql_query("SELECT * FROM `nursery` WHERE `id` = '$nursery_id'");
        while($row = mysql_fetch_array($q)){
            $nursery_name = $row['name'];
            $_SESSION['nursery_name'] = $nursery_name;
        }
        
        if($_SESSION['supplier_id'] == true AND $_SESSION['nursery_id'] == true){
            include_once 'includes/selected_nursery_supplier.php';
            include_once 'includes/add_stock_form.php';
        }else if($_SESSION['supplier_id'] == true){
            include_once 'includes/select_nursery_form.php';
        }else{
            include_once 'includes/select_supplier_form.php';
        }
        
        
        
    ?>
   
    
    
</div><!-- span9 -->

<?php include_once 'includes/footer.php';?>