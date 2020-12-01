<?php
/**
 * Short description for code
 * php version 7.2.10
 * 
 * @category Category_Name
 * @package  PackageName
 * @author   Abhishek Singh <author@example.com>
 * @license  http://www.php.net/license/3_01.txt 
 * @link     http://pear.php.net/package/PackageName 
 * 
 * This is a "Docblock Comment," also known as a "docblock."  The class'
 * docblock, below, contains a complete description of how to write these.
 */
class Config
{
    public $servername; 
    public $dbuser ;
    public $dbpass;  
    public $dbname; 
    public $conn;

    public function connect()
    {
        $this->conn = new mysqli("localhost", "root", "", "cedcab");
        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $this->conn;
    }
}
$con = new Config();
$con->connect();

?>