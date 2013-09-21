<?php include_once 'includes/header.php';?>
<?php include_once 'includes/left_pane.php';?>
<?php include_once 'includes/db_conn.php';?>

<div class='span9'>
    <h4>Add Donor</h4>
    <?php
        if ($_SESSION['alert'] == true){
            echo $_SESSION['alert'];
        }else{
            // Do nothin
        }
    ?>
    <form name="add_donor_form" method="post" action="includes/add_donor_process.php" class="form-inline">
        <div class="well well-small">
            <small>First Name:</small> <input type="text" class="input-small span2" placeholder="Abdullah" name="first_name">
            <small>Middle Name:</small> <input type="text" class="input-small span2" placeholder="Muhammad" name="middle_name">
            <small>Last Name:</small> <input type="text" class="input-small span2" placeholder="Bahayan" name="last_name">
            <br />
            <br />
            <small>City:</small> <input type="text" class="input-small span2" placeholder="Dar es salaam" name="city">
            <small>Country:</small> <input type="text" class="input-small span2" placeholder="Tanzania" name="country">
            
            <small>Email:</small> <input type="text" class="input-small span3" placeholder="info@abc.com" name="email">
            <br />
            <br />
            <small>Mobile:</small> <input type="text" class="input-small span2" placeholder="+255 700 123456" name="mobile">
            
            <button type="submit" class="btn"><i class='icon-plus-sign'></i> Add Donor</button>
        </div>
    </form>
    
    <p>Recent Added Donors</p>
    <table class="table table-striped table-hover">
        <tr>
            <th>#</th>
            <th>First Name</th>
            <th>Middle Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Action</th>
        </tr>
        
        <?php
            $q = mysql_query("SELECT * FROM `donor`");
            $num = 0;
            
            while($row = mysql_fetch_array($q)){
                $id = $row['id']; 
                $num++;
                echo"
                   <form action='includes/delete_donor.php' method='get' onsubmit='return confirm(deleteMsg);'>
                        <input type='hidden' name='id' value='{$id}' />
                        <tr>
                            <td>{$num}</td>
                            <td>{$row['first_name']}</td>
                            <td>{$row['middle_name']}</td>
                            <td>{$row['last_name']}</td>
                            <td>{$row['email']}</td>
                            <td>{$row['mobile']}</td>
                            <td><button class='btn btn-danger btn-mini'><i class='icon-trash icon-white'></i> Delete</button></td>
                        </tr>
                    </form>
                    ";
            }
        ?>
    </table>
    
</div><!-- span9 -->

<?php include_once 'includes/footer.php';?>