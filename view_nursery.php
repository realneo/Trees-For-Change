<?php include_once 'includes/header.php';?>
<?php include_once 'includes/left_pane.php';?>
<?php include_once 'includes/db_conn.php';?>

<div class='span9'>
    <h4>View All Nurseries</h4>
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
            <th>Nursery Name</th>
            <th>Location</th>
            <td>Action</th>
        </tr>
        
        <?php
            $q = mysql_query("SELECT * FROM `nursery` ORDER BY `name` ASC");
            $num = 0;
            
            while($row = mysql_fetch_array($q)){
                $id = $row['id']; 
                $num++;
                $location_id = $row['location_id'];
                $qq = mysql_query("SELECT * FROM `location` WHERE `id` = '$location_id'");
                while($rows = mysql_fetch_array($qq)){
                    $location_name = $rows['name'];
                }
                echo"
                    <form action='includes/delete_nursery.php' method='get' onsubmit='return confirm(deleteMsg);'>
                    <input type='hidden' name='id' value='{$id}' />
                    <tr>
                        <td>{$num}</td>
                        <td>{$row['name']}</td>
                        <td>{$location_name}</td>
                        <td><button class='btn btn-danger btn-mini'><i class='icon-trash icon-white'></i> Delete</button></td>
                    </tr>
                    ";
            }
        ?>
    </table>
</div><!-- span9 -->

<?php include_once 'includes/footer.php';?>