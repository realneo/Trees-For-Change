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
                                    
                                </div>	
                            </div>

                            <div class='span4'>
                                <small>Serial Number</small>
                                <br />
                                <b>TFC000298</b>
                                <br />
                                <small>Donor</small>
                                <br/> 
                                <b>Ishaak Ahamed</b>
                                <br />
                                <small>On Behalf of</small>
                                <br />
                                <b>Kamran Fazil</b>
                                <br />
                                <small>Planted Date</small>
                                <br />
                                <b>September 2013</b>
                                <hr />
                                <small>Tree Type</small>
                                <br/> 
                                <table class=" span3 table-hover table-bordered table-striped">
                                    <tr>
                                        <td><small>English</small></td>
                                        <td><small>Local</small></td>
                                        <td><small>Botanic</small></td>
                                    </tr>
                                    <tr>
                                        <th>Mango</th>
                                        <th>Embe</th>
                                        <th>Mangoe</th>
                                    </tr>
                                </table>
                                <br />
                                <br />
                                <br />
                                <small>Tree Type</small>
                                <br />
                                <b>Fruit</b>

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