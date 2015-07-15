<?
require_once('authenticator.php');

/**
 * Helpder class containing various database methods
 */

class DatabaseHelper{
    private $mysql;
    private $query;
    
    /**
     * Constructor method that initalise database connection
     */
     
    function DatabaseHelper(){
    // Open Connect to database
        $this->mysql = $this->connect();
    }

    /**
     * Selects the database
     * 
     * @return resource $mysql Successfully connected MySQL database resource
     */

    private function connect(){
    // Connect and select database
    # @TODO Replace error message with redirect + log + email notification
    $mysql = mysql_connect('localhost', 'tate_shamenator', 'aTT-gK6-2xy-663') 
                or die('Could not connect: ' . mysql_error());
                
                # @TODO Replace erroe message with redirect + log + email notification
    
    mysql_select_db('tate_shamenator') 
        or die('Could not select database');
        
        return $mysql;
}

    /**
     * inserts a single row of data into database based on parameters given and redirect users
     * on success and failure with message/error in URL parameter
     * 
     * @param string $table Name of table to insert into
     * @param array $formData Array of data to insert into row of table
     * @param string $successMessage Message attached success URL
     * 
     * @TODO Replace switch with default of 'manage-' .$table, if redirect param not supplied
     */

    // yolo here

    function insert($table, $formData, $successMessage){
    
    switch($table){
        case'shames':
            $section = 'manage-shames';
        break;
        case'users':
            $section = 'manage-users';
        break;
        case'websites':
            $section = 'manage-websites';
        break;
        default:
            $section = '';
    }
    
    foreach($formData as $key => $value){
        $values[] = $value;
        $keys[] = $key;
    }

    $sql = "INSERT INTO $table (".implode(',',$keys).") VALUES('".implode("','",$values)."')";
    $query = mysql_query($sql, $this->mysql);
  
    if(!$query)
    
        header( "Location: /shaming9000/$section/?success=$successMessage" );
    
    header( "Location: /shaming9000/$section/?error=" . mysql_error() );
    
}

        /**
         * Allows users to update specific data in the database
         * 
         * @param string $table Nam of table to update row in
         * @param array $formData Array of data to insert into specified row
         * @param int $id ID of row to update data within specified table
         * 
         * @TODO Write update method
         */
    public function update($table, $formData, $id){
    
        
    
    }
    
        /** 
         * Allows the user to delete data from the database
         * 
         * @param string $table Name of table to remove row from
         * @param int $id ID row to remove from table
         * 
         * @TODO Write remove method
         */
    public function remove($table, $id){
        
    }
    
        /**
         * Grabs the information from the database
         * 
         * @param string $table Name of table to fetch data from
         * @return array $result Array of rows from given table
         */
    
    public function getAllByTableName($table){
        if(!isset($table)){
            return false;
        }
        
        return $this->queryRows("SELECT * FROM `$table`");
        
        }
        
    
    /**
     * 
     * Fetches a single row from a table specified in the given SQL
     * 
     * @param string $sql SQL to run against connected database
     * @return array $row Row matched by the given SQL statement
     */
     
     public function queryRow($sql = ''){
         if( !isset($this->query) ){
            $this->query = mysql_query($sql, $this->mysql)
             or die('Query Failed: ' . mysql_error());
         }
         
         $row = mysql_fetch_assoc($this->query);
         
         return $row;
     }
     
     public function queryRows($sql = ''){
         while( $row = $this->queryRow($sql) ){
             $result[] = $row;
         }
         
         $this->query = null;
         return $result;
    }
    
}

