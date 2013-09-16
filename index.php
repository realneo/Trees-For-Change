<?php 
    session_start(); 
    include_once 'includes/db_conn.php';
?>
<!DOCTYPE html>
	
<html lang='en'>
    <head>
            <link href='css/bootstrap.css' rel='stylesheet' type='text/css' />
            <script src="js/jquery-1.10.2.min.js"></script>
            <script src="js/bootstrap.js"></script>

            <title>Trees For Change</title>
    </head>
    <body>
        <div class='container'>
            <br />
            <br />
            <br />
            <div class='row'>
                <div class='span10 offset1 mini_container'>

                    <div class='row'>
                        <div class='span2 index_logo'><img src='img/tree.gif' alt='Trees For Change' /></div>
                        <div class='span6 offset2'><h1>TREES FOR CHANGE</h1></div>
                    </div>

                    <div class='line_breaker'></div>

                        <div class='row'>
                            <div class='span6'>
                                <br />

                                <div class='hero-unit green_color'>
                                    <?php
                                        $result = mysql_query("SELECT * FROM `sold_tree`");
                                        $total_trees_planted = mysql_num_rows($result);
                                    ?>
                                    <h1><?php echo $total_trees_planted; ?></h1>
                                    <p>Total Trees Planted</p>
                                </div>	
                            </div>

                            <div class='span4'>
                                <h3>Admin Area</h3>
                                <?php
                                        if ($_SESSION['alert'] == true){
                                                echo $_SESSION['alert'];
                                        }else{
                                                // Do nothin
                                        }
                                ?>
                                <p><small>This section is only for authorized administrators</small></p>
                                <form class="form-verticle" name='login_form' method='post' action='includes/login_process.php'>
                                    <div class="control-group">
                                            <label class="control-label" for="inputEmail">Username</label>
                                            <div class="controls">
                                                    <input type="text" id="username" name='username' class='input-xlarge' placeholder="Username">
                                            </div>
                                    </div>
                                    <div class="control-group">
                                            <label class="control-label" for="inputPassword">Password</label>
                                            <div class="controls">
                                                    <input type="password" id="password" name='password' class='input-xlarge' placeholder="Password">
                                            </div>
                                    </div>
                                    <div class="control-group">
                                            <div class="controls">
                                                    <button type="submit" class="btn btn-success btn-block pull-left"><i class="icon-lock icon-white"></i> Log in</button>
                                            </div>
                                    </div>
                                </form>
                                <br />
                                <hr />
                                <p class='green_color'><small>Enter your Tree Serial Number</small></p>
                                <div class="input-append">
                                    <input class="span2" id="appendedInputButton" placeholder="TFC000101" type="text">
                                    <button class="btn" type="button"><i class="icon-search"></i> Search</button>
                                </div>

                            </div>

                    </div>

                </div>

                <div class='row'>
                    <div class='span10 offset1'>
                            <p style='padding-left:23px;'><small>All Rights Reserved 2013. Trees For Change a Project by Islamic Help</small></p>
                    </div>
                </div>
            </div>
        </div><!-- container -->
    </body>
</html>
<?php
	// Erase un-wanted sessions
	$_SESSION['alert'] = '';
?>