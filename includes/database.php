<?php
    require_once('config.php');
    class MySQLDatabase{
        private $connection;
        function __construct() {
            $this->open_connection();
        }
        public function open_connection(){
            $this->connection = mysql_connect(DB_SERVER, DB_USER, DB_PASS);
            if(!$this->connection){
                die("Database connection failed: ". mysql_error());
            }else{
                $db_select = mysql_select_db(DB_NAME, $this->connection);
                if(!$db_select){
                    die("Databse selection faile: ".mysql_error());
                }
            }
        }
        public function close_connection(){
            if(isset($this->connection)){
                mysql_close($this->connection);
                unset($this->connection);
            }
        }
    }
    
    $database = new MySQLDatabase();
    $db =& $database;
?>
