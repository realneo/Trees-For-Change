<?php
    session_start();
    include_once('db_conn.php');
    
    // Getting Data from the Form
    $name = $_POST['name'];
    
    // Checking if the Tree is already in the Database
    $q = mysql_query("SELECT * FROM `tree_type` WHERE `name` = '$name'");
    if(mysql_num_rows($q) >= 1){
        $_SESSION['alert'] = "<div class='alert alert-block'>This Tree Name is already in the Database.</div>";
        header("Location: ../add_tree_type.php");
    }else{
        $q = "INSERT INTO `tree_type` (`id` ,`name`) VALUES (NULL , '$name')";
        if(mysql_query($q) == true){
            $_SESSION['alert'] = "<div class='alert alert-success'>Tree Name {$name} was successfully added.</div>";
            header("Location: ../add_tree_type.php");
        }else{
            $_SESSION['alert'] = "<div class='alert alert-error'>There was an Error Adding this tree name.</div>";
            header("Location: ../add_tree_type.php");
        }
    }

?>
