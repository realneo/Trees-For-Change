<?php include_once 'includes/header.php';?>
<?php include_once 'includes/left_pane.php';?>
<?php include_once 'includes/db_conn.php';?>

<div class='span9'>
    <h4>Add Stock to Store</h4>
    <?php
        if ($_SESSION['alert'] == true){
            echo $_SESSION['alert'];
        }else{
            // Do nothin
        }
    ?>
    <form name="add_seeds_form" method="post" action="includes/add_seeds_process.php">
        <div class="well well-small">
             <p><small>Select Supplier</small></p>
            <select name="supplier">
                <?php
                    $result = mysql_query("SELECT * FROM `supplier` ORDER BY `name` ASC");
                    while($row = mysql_fetch_array($result)){
                        $supplier_id = $row['id'];
                        $supplier_name = $row['name'];
                        echo "<option value='{$supplier_id}'>{$supplier_name}</option>";
                    }
                ?>
            </select>
            <p><small>Select Tree Type</small></p>
            <select name="tree_type">
                <?php
                    $result = mysql_query("SELECT * FROM `tree_type` ORDER BY `name` ASC");
                    while($row = mysql_fetch_array($result)){
                        $tree_type_id = $row['id'];
                        $tree_type_name = $row['name'];
                        echo "<option value='{$tree_type_id}'>{$tree_type_name}</option>";
                    }
                ?>
            </select>
            <p><small>Weight</small></p>
            <input class="span1" id="name" name="weight" placeholder="10" type="text"> KGs
            <p><small>Estimated Trees</small></p>
            <input class="span2" id="name" name="est_qty" placeholder="1000" type="text">
            <br />
            <button class="btn" type="submit"><i class='icon-plus-sign'></i> Add to Store </button>
        </div>
    </form>
    <p>Recent Added Stock</p>
    <table class="table table-striped table-hover">
        <tr>
            <th>#</th>
            <th>Tree Type</th>
            <th>Total Weight</th>
            <th>Total Estimation</th>
        </tr>
        
        <?php
            $q = mysql_query("SELECT * FROM `store` ORDER BY `id` DESC LIMIT 8");
            $num = 0;
            
            while($row = mysql_fetch_array($q)){
                $id = $row['id'];
                $num++;
                $tree_type_id = $row['tree_type_id'];
                $total_weight = $row['total_weight'];
                $total_est_qty = $row['total_est_qty'];
                $qq = mysql_query("SELECT * FROM `tree_type` WHERE `id` = '$tree_type_id'");
                while($rows = mysql_fetch_array($qq)){
                    $tree_type_name = $rows['name'];
                }
                echo"
                    <input type='hidden' name='id' value='{$id}' />
                    <tr>
                        <td>{$num}</td>
                        <td>{$tree_type_name}</td>
                        <td>{$total_weight}</td>
                        <td>{$total_est_qty}</td>
                    </tr>
                    ";
            }
        ?>
    </table>
</div><!-- span9 -->

<?php include_once 'includes/footer.php';?>