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
        
     // Select Supplier Form
     if($_GET['supplier'] == true){
         include_once 'includes/select_nursery_form.php';
     }else{
         include_once 'includes/select_supplier_form.php';
     }
     if($_GET['nursery'] == true){
         // Do nothing
     }else{
         include_once 'includes/select_supplier_form.php';
     }   
     
     
    ?>
   
    
    
</div><!-- span9 -->

<?php include_once 'includes/footer.php';?>