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
            <table>
                <tr>
                    <td>
                        <p><small>Group</small></p>
                        <select name="tree_group">
                            <option value="Indigenous">Indigenous</option>
                            <option value="Exotic">Exotic</option>
                        </select>
                    </td>
                    <td>
                        <p><small>Tree Category</small></p>
                        <select name="tree_category">
                            <option value="Fruits">Fruits</option>
                            <option value="Timber">Timber</option>
                            <option value="Medicine">Medicine</option>
                            <option value="Deco">Deco</option>
                            <option value="Flowers">Flowers</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p><small>English Name</small></p>
                        <input class="span3" id="name" name="name" placeholder="Mango" type="text">
                    </td>
                    <td>
                        <p><small>Botanic Name</small></p>
                        <input class="span3" id="name" name="botanic_name" placeholder="Mangoes" type="text">
                    </td>
                    <td>
                        <p><small>Local Name</small></p>
                        <input class="span3" id="name" name="local_name" placeholder="Embe" type="text">
                    </td>
                </tr>
            </table>
            <button class="btn" type="submit"><i class='icon-plus-sign'></i> Add Tree Type</button>
        </div>
    </form>
    <p>Recent Added Tree Types</p>
    <form action="includes/delete_tree_type.php" method="get" onsubmit="return confirm('Are you sure you want to Delete this Item?');">
    <table class="table table-striped table-hover">
        <tr>
            <th>#</th>
            <th>Group</th>
            <th>Category</th>
            <th>English Name</th>
            <th>Local Name</th>
            <th>Botanic Name</th>
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
                        <td>{$row['tree_group']}</td>
                        <td>{$row['tree_category']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['local_name']}</td>
                        <td>{$row['botanic_name']}</td>
                        <td><button class='btn btn-danger btn-mini'><i class='icon-trash icon-white'></i> Delete</button></td>
                    </tr>
                    ";
            }
        ?>
    </table>
    </form>
</div><!-- span9 -->

<?php include_once 'includes/footer.php';?>