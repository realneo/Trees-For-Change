<?php include_once 'includes/header.php';?>
<?php include_once 'includes/left_pane.php';?>
<?php include_once 'includes/db_conn.php';?>

<div class='span9'>
    <h4>View All Trees</h4>
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
            <th>Tree Name</th>
            <th>Quantity</th>
            <td>Action</th>
        </tr>
        
        <?php
            $q = mysql_query("SELECT * FROM `tree_type` ORDER BY `id` DESC LIMIT 8");
            $num = 0;
            
            while($row = mysql_fetch_array($q)){
                $id = $row['id'];
                $num++;
                echo"
                    <form action='includes/delete_tree_type.php' method='get' onsubmit='return confirm(deleteMsg);'>
                        <input type='hidden' name='id' value='{$id}' />
                        <tr>
                            <td>{$num}</td>
                            <td>{$row['name']}</td>
                            <td>{$row['quantity']}</td>
                            <td><button class='btn btn-danger btn-mini'><i class='icon-trash icon-white'></i> Delete</button></td>
                        </tr>
                    </form>
                    ";
            }
        ?>
    </table>
</div><!-- span9 -->

<?php include_once 'includes/footer.php';?>