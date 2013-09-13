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
    <form action="includes/delete_location.php" method="get" onsubmit="return confirm('Are you sure you want to Delete this Item?');">
    <table class="table table-striped table-hover">
        <tr>
            <th>#</th>
            <th>Location Name</th>
            <th>Longitude</th>
            <th>Latitude</th>
            <td>Action</th>
        </tr>
        
        <?php
            $q = mysql_query("SELECT * FROM `location` ORDER BY `id` DESC");
            $num = 0;
            
            while($row = mysql_fetch_array($q)){
                $id = $row['id']; 
                $num++;
                echo"
                    <input type='hidden' name='id' value='{$id}' />
                    <tr>
                        <td>{$num}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['longitude']}</td>
                        <td>{$row['latitude']}</td>
                        <td><button class='btn btn-danger btn-mini'><i class='icon-trash icon-white'></i> Delete</button></td>
                    </tr>
                    ";
            }
        ?>
    </table>
    </form>
</div><!-- span9 -->

<?php include_once 'includes/footer.php';?>