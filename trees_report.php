<?php include_once 'includes/header.php';?>
<?php include_once 'includes/left_pane.php';?>
<?php include_once 'includes/db_conn.php';?>

<div class='span9'>
    <h4>Trees Report</h4>
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
            <th>Tree Type</th>
            <th>Available</th>
            <th>Planted</th>
            <th>Dead</th>
        </tr>
        <?php
            // Getting Tree Types, Available and Dead
            $num = 0;
            $result = mysql_query("SELECT * FROM `tree_type` ORDER BY `name` ASC");
            while($row = mysql_fetch_array($result)){
                $num++;
                $tree_id = $row['id'];
                $tree_name = $row['name'];
                $tree_available = $row['quantity'];
                $tree_dead = $row['dead'];
                
                // Getting Tree that are planted
                $result2 = mysql_query("SELECT * FROM `sold_tree` WHERE `tree_type_id` = '$tree_id'");
                $trees_planted = mysql_num_rows($result2);
                
                echo "
                        <tr>
                            <td>{$num}</td>
                            <td>{$tree_name}</td>
                            <td>{$tree_available}</td>
                            <td>{$trees_planted}</td>
                            <td>{$tree_dead}</td>
                        </tr>
                    ";
            }
        ?>
        
    </table>
    
<?php include_once 'includes/footer.php';?>