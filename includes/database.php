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
        public function query($sql){
            $result - mysql_query($sql, $this->connection);
            $this->confirm_query($result);
            return $result;
        }
        public function confirm_query($result){
            if(!$result){
                die("Database query failed: ".mysql_error());
            }
        }
        public function mysql_prep($value){
            $magic_quotes_active = get_magic_quotes_gpc();
            $new_enough_php = function_exists("mysql_real_espace_sting"); // i.e. PHP >= v4.3.0
            if($new_enough_php){// PHP v4.3.0 higher
                //undo any magic quote effects s mysql_real_escape_string can do the work
                if($magic_quotes_active){$value = stripslashes($value);}
                $value = mysql_real_escape_string($value);
            }else{ // before PHP v4.3.0
                //if magic quotes aren't already on then add slashes manually
                if (!$magic_quotes_active){ $value = addslashes($value);}
                //if magic quotes are active, then the slashes already exist
            }
            return $value;
        }
    }
    
    $database = new MySQLDatabase();
    $db =& $database;
?>
