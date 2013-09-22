<?php include_once 'includes/header.php';?>
<?php include_once 'includes/left_pane.php';?>
<?php include_once 'includes/db_conn.php';?>

<div class='span9'>
    <h4>Add Dead Seeds</h4> 
    <?php
        if ($_SESSION['alert'] == true){
            echo $_SESSION['alert'];
        }else{
            // Do nothin
        }
    ?>
    
    <?php
        
        // Getting The Names from the Database
        $q = mysql_query("SELECT * FROM `seeds`");
        while($row = mysql_fetch_array($q)){
            $seed_id = $row['id'];
        }

        include_once 'includes/add_dead_seeds_form.php';
        
    ?>
   
    
    
</div><!-- span9 -->

<?php include_once 'includes/footer.php';?>