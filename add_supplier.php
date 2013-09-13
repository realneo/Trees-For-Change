<?php include_once 'includes/header.php';?>
<?php include_once 'includes/left_pane.php';?>
<?php include_once 'includes/db_conn.php';?>

<div class='span9'>
    <h4>Add Supplier</h4>
    <?php
        if ($_SESSION['alert'] == true){
            echo $_SESSION['alert'];
        }else{
            // Do nothin
        }
    ?>
    <form name="add_supplier_form" method="post" action="includes/add_supplier_process.php" class="form-inline">
        <div class="well well-small">
            <small>Supplier:</small> <input type="text" class="input-small span3" placeholder="ABC Company" name="name">
            <small>City:</small> <input type="text" class="input-small span3" placeholder="Dar es salaam" name="city">
            <br />
            <br />
            <small>Country:</small> <input type="text" class="input-small span3" placeholder="Tanzania" name="country">
            
            <small>Email:</small> <input type="text" class="input-small span3" placeholder="info@abc.com" name="email">
            <br />
            <br />
            <small>Telephone:</small> <input type="text" class="input-small span2" placeholder="+255 22 2200099" name="telephone">
            <small>Mobile:</small> <input type="text" class="input-small span2" placeholder="+255 700 123456" name="mobile">
            
            <button type="submit" class="btn"><i class='icon-plus-sign'></i> Add Supplier</button>
        </div>
    </form>
    
    <p>Recent Added Suppliers</p>
    <form action="includes/delete_supplier.php" method="get" onsubmit="return confirm('Are you sure you want to Delete this Item?');">
    <table class="table table-striped table-hover">
        <tr>
            <th>#</th>
            <th>Supplier</th>
            <th>Email</th>
            <th>Telephone</th>
            <th>Mobile</th>
            <th>Action</th>
        </tr>
        
        <?php
            $q = mysql_query("SELECT * FROM `supplier` ORDER BY `id` DESC LIMIT 5");
            $num = 0;
            
            while($row = mysql_fetch_array($q)){
                $id = $row['id']; 
                $num++;
                echo"
                    <input type='hidden' name='id' value='{$id}' />
                    <tr>
                        <td>{$num}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['telephone']}</td>
                        <td>{$row['mobile']}</td>
                        <td><button class='btn btn-danger btn-mini'><i class='icon-trash icon-white'></i> Delete</button></td>
                    </tr>
                    ";
            }
        ?>
    </table>
    </form>
</div><!-- span9 -->

<?php include_once 'includes/footer.php';?>