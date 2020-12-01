<?php
require 'config.php';
require 'userclass.php';
$obj = new Config();
$data = $obj->connect();


$errors = array();
$msg = '';

if (isset($_POST['submit'])) {
    $username = isset($_POST['username'])?$_POST['username']:'';
    $name = isset($_POST['name'])?$_POST['name']:'';
    $password = md5(isset($_POST['password'])?$_POST['password']:'');
    $repassword = md5(isset($_POST['repassword'])?$_POST['repassword']:'');
    $mobile = isset($_POST['mobile'])?$_POST['mobile']:'';

    if ($password==$repassword) {
        $con = new Userclass();
        $msg = $con->registration($username, $name, $password, $repassword, $mobile, $data);
    } else {
        $errors = array('input'=>'form','msg'=>'Password does not match');
    }


}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CED-CAB BOOKING USING PHP</title>
    <link rel="stylesheet" type="text/css" href="style.css"> 
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Rancho&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <h1>CED-BOOKING PORTAL</h1>
        <p>Registration</p>
    </header>
    <section>
        <div id="wrapper">
            <?php echo $msg;?>
            <div id="error">
                <?php if (sizeof($errors)>0) :?>
                    <ul>
                    <?php foreach ($errors as $error):?>
                        <li><?php echo $errors['msg'];break?></li>
                    <?php endforeach;?>
                    </ul>
                <?php endif;?>
            </div>
            <div id="signup-form">
            <form action="" method="POST">
                <p>                           
                    <input type="text" name="username" placeholder="Username" required>
                </p>
                <p>
                    <input type="text" name="name" placeholder="Name" required>
                </p>
                <p>
                    <input type="password" name="password" placeholder="Password" required>
                </p>
                <p>
                    <input type="password" name="repassword" placeholder="Re-Password" required>
                </p>
                <p>
                    <input type="number" name="mobile" placeholder="Mobile" required>   
                </p>
                <p>
                    <input class="btn1" type="submit" name="submit" value="Submit">
                </p>
                <p>
                    Already have an account!
                </p>
                <p>
                    <a href= "login.php">Log In</a> 
                </p>              
            </form>
            </div>
        </div>
    </section>
</body>
</html>