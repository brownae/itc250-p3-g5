<?php

//0700 is an octal permissions code meaning only the owner can read, write or execute.
 
/*
Login to Database with only SELECT, UPDATE and INSERT permissions.
*/ 
define('SERVER', 'mysql.mdavis.dreamhosters.com'); #DB Host URL
define('DBNAME','wn17_newsstand');  #Database name
define('SHIBBOLETH', 'Project3'); #DB p/\55VV0rd    
define('USERNAME','newsstand');     #userName

/*
Uses constants to create a PDO database connection
@return PDO MySQL database connection object.
*/
function db_conn() {

    try {
        $conn = new PDO('mysql:host=' . SERVER . ';dbname='  . DBNAME . ';', USERNAME, SHIBBOLETH);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    }
    catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
    }
}