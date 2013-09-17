<?php include_once 'includes/header.php';?>
<?php include_once 'includes/left_pane.php';?>
<?php include_once 'includes/db_conn.php';?>

<div class='span9'>
    <h4>Add Location</h4>
    <?php
        if ($_SESSION['alert'] == true){
            echo $_SESSION['alert'];
        }else{
            // Do nothin
        }
    ?>
    <form name="add_nursery_form" method="post" action="includes/add_location_process.php" class="form-inline">
        <div class="well well-small">
            <small>Location Name:</small> <input type='text' name='name' placeholder='Kisemvule' class='span2'/>
            <small>Longitude:</small> <input type='text' name='longitude' placeholder='6 45 52 (Longitude)' class='span2'/>
            <small>Latitude:</small> <input type='text' name='latitude' placeholder='39 14 50 (Latitude)' class='span2'/>
            <br />
            <br />
            <button type="submit" class="btn"><i class='icon-plus-sign'></i> Add Location</button>
        </div>
    </form>
    
    <p>Recent Added Locations</p>
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
            $q = mysql_query("SELECT * FROM `location` ORDER BY `id` DESC LIMIT 8");
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