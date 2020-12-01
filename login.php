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
session_start();
require 'config.php';
require 'userclass.php';
$obj = new Config();
$data = $obj->connect();
$msg='';


if (isset($_POST['submit'])) {
    $username = isset($_POST['username'])?$_POST['username']:'';
    $password = md5(isset($_POST['password'])?$_POST['password']:'');
  
    $userobj = new Userclass();
    $msg = $userobj->login($username, $password, $data);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>
        LOGIN
    </title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Rancho&display=swap" rel="stylesheet">
</head>
<body>
<header>
        <h1>CED-BOOKING PORTAL</h1>
        <p>LOGIN</p>
    </header>
<section>
    <div id="wrapper">
        <?php echo $msg;?>
        <div id="login-form">
            <form action="login.php" method="POST">
            <p>                          
                <input type="text" name="username" placeholder="Username" required>
            </p>
            <p>
                <input type="password" name="password" placeholder="Password" required>
            </p>
            <p>
                <input class="btn" type="submit" name="submit" value="Submit">
            </p>
            <p>
                Don't have account?
            </p>
            <p>
            <a href= "register.php">Sign Up</a>
            </p>
         </form>
        </div>
    </div>
    </section>
</body>
</html>