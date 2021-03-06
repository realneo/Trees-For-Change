<?php include_once 'includes/header.php';?>
<?php include_once 'includes/left_pane.php';?>
<?php include_once 'includes/db_conn.php';?>

<div class='span9'>
    <h4>Add Nursery</h4>
    <?php
        if ($_SESSION['alert'] == true){
            echo $_SESSION['alert'];
        }else{
            // Do nothin
        }
    ?>
    <form name="add_nursery_form" method="post" action="includes/add_nursery_process.php" class="form-inline">
        <div class="well well-small">
            <small>Nursery Name:</small> <input type="text" class="input-small span2" placeholder="Name" name="name">
            <small>Location:</small>
            <select name='location'>
                <?php
                    $result = mysql_query("SELECT * FROM `location`");
                    while($row = mysql_fetch_array($result)){
                        $location_id = $row['id'];
                        $location_name = $row['name'];
                        echo "<option value='$location_id'>{$location_name}</option>";
                    }
                ?>  
            </select>
            <button type="submit" class="btn"><i class='icon-plus-sign'></i> Add Nursery</button>
        </div>
    </form>
    
    <p>Recent Added Nurseries</p>

    <table class="table table-striped table-hover">
        <tr>
            <th>#</th>
            <th>Nursery Name</th>
            <th>Location</th>
            <td>Action</th>
        </tr>
        
        <?php
            $q = mysql_query("SELECT * FROM `nursery` ORDER BY `name` ASC LIMIT 8");
            $num = 0;
            
            while($row = mysql_fetch_array($q)){
                $id = $row['id'];
                $location_id = $row['location_id'];
                $num++;
                $result = mysql_query("SELECT * FROM `location` WHERE `id` = '$location_id'");
                
                echo"
                    <form action='includes/delete_nursery.php' method='get' onsubmit='return confirm(deleteMsg);'>
                        <input type='hidden' name='id' value='{$id}' />
                        <tr>
                            <td>{$num}</td>
                            <td>{$row['name']}</td>
                            <td>";
                                while($rows = mysql_fetch_array($result)){
                                    $location_id = $rows['id'];
                                    $location_name = $rows['name'];
                                    echo "{$location_name}";
                                }
                            echo "</td>
                            <td><button class='btn btn-danger btn-mini'><i class='icon-trash icon-white'></i> Delete</button></td>
                        </tr>
                    </form>
                    ";
            }
        ?>
    </table>
</div><!-- span9 -->

<?php include_once 'includes/footer.php';?>