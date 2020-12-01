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
 * This is a "Docblock Comment," also known as a "docblock." 
 */
session_start();

if ($_SESSION['userdata']=='') { 
    header('Location: login.php');
} else {
    echo '<h1><center>Welcome Admin !!</center></h1>
    <center>'.$_SESSION['userdata']['username'].'<center>';
}   

 
?>