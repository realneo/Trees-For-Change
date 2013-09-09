<?php include_once 'includes/header.php';?>
<?php include_once 'includes/left_pane.php';?>
<?php include_once 'includes/db_conn.php';?>

<div class='span9'>
    <h4>Add Tree Type</h4>
    <?php
        if ($_SESSION['alert'] == true){
            echo $_SESSION['alert'];
        }else{
            // Do nothin
        }
    ?>
    <form name="add_tree_type_form" method="post" action="includes/add_tree_type_process.php">
        <div class="well well-small">
            <p><small>Add a New Tree Type</small></p>
            <div class="input-append">
                <input class="span5" id="name" name="name" placeholder="Mango" type="text">
                <button class="btn" type="submit">Add Tree Type</button>
            </div>
        </div>
    </form>
    <p>Recent Added Tree Types</p>
    <form action="includes/delete_tree_type.php" method="get" onsubmit="return confirm('Are you sure you want to Delete this Item?');">
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
                    <input type='hidden' name='id' value='{$id}' />
                    <tr>
                        <td>{$num}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['quantity']}</td>
                        <td><button class='btn btn-danger btn-mini'>Delete</button></td>
                    </tr>
                    ";
            }
        ?>
    </table>
    </form>
</div><!-- span9 -->

<?php include_once 'includes/footer.php';?>