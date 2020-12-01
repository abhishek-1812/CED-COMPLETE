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
$output='';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-Dashboard</title>
    <link rel="stylesheet" type="text/css" href="style3.css">
    <!-- <script src = "script.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
</head>
<body class="id">
    <header>
    <div class="container-fluid">
        <nav class="navbar navbar-light bg-light navbar-expand-lg ">
            <div class="navbar-header">
                <a id="a1" href="#" class="navbar-brand">CED-<span id="cold">CAB</span></a>
            </div>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#navbaritem"> 
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse ml-auto" id="navbaritem">
                <ul class="navbar-nav ml-auto text-right">
                    <li class="nav-item">
                        <a class="nav-link" href="admindash.php">BACK</a>
                      </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">FEATURES</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">REVIEWS</a>
                      </li>

                      <li class="nav-item">
                        <a class="btn btn-custom-lg" id="btns" href="logout.php">LOG OUT</a>
                      </li>
                </ul>
            </div>      
        </nav>
    </div>
    </header>
    <section>
        <h2 class="text-center mt-4">APPROVED USERS</h2>
            <div class="container text-center">   
                <table class="table table-dark table-bordered" >
                    <tr>
                        <th>ID</th>
                        <th>USERNAME</th>
                        <th>NAME</th>
                        <th>DATE</th>
                        <th>MOBILE</th>
                        <th>ACTION</th>
                    </tr>
                    <tbody id="data"></tbody>
                </table>
            </div>
    </section>
<script>

$(document).ready(function(){
    function approvedUser() {
    var action='approved_data';
    $.ajax({
                url : 'ajaxaction.php',
                type : "POST",
                dataType :'json',
                data : {action:action},               
                success : function (data) {
                var output;
                for(var i=0;i<data.length;i++) { 
                    output+= "<tr><td>" + data[i]['userid'] + "</td><td>" + data[i]['username'] + "</td><td>" + data[i]['name'] + "</td><td>" + data[i]['date'] + "</td><td>" + data[i]['mobile'] + "</td><td><input type='submit' class='btn btn-danger' value='DELETE' id='delbtn' data-did=" + data[i]['userid'] + "></td></tr>";                        
                }
                $('#data').html(output); 
                }               
            });
        }
       approvedUser();


            $(document).on("click",'#delbtn', function(){
            var id = $(this).data("did");
            var element=this;
            var action ='del_btn_for_approved_users';
            $.ajax({
                url : 'ajaxaction.php',
                type : "POST",
                data : {id:id, action:action},
                success : function (data) {
                  if(data==1){
                    approvedUser();
                    $(element).closest("tr").fadeOut();
                   } else {
                     alert(data);
                   }
                }
            });
        })
    });
</script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html> 