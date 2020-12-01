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
    <title>User-Dashboard</title>
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
                        <a class="nav-link" href="userdash.php">BACK</a>
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
    <select name="" id="ride_sorting" class="sort">
            <option value="">SORT BY</option>
            <option value="ridedate">DATE</option>
            <option value="totaldist">DISTANCE</option>
            <option value="totalfare">FARE</option>
            <option value="cabtype">CAB TYPE</option>
        </select>
        <h2 class="text-center mt-4">YOUR ALL RIDE</h2>
            <div class="container text-center">   
                <table class="table table-dark table-bordered" >
                    <tr>
                        <th>ID</th>
                        <th>RIDE DATE</th>
                        <th>FROM</th>
                        <th>TO</th>
                        <th>CAB-TYPE</th>
                        <th>DISTANCE</th>
                        <th>LUGGAGE</th>
                        <th>TOTAL FARE</th>
                        <th>USER-ID</th>
                    </tr>
                    <tbody id="data"></tbody>
                </table>
            </div>
    </section>
<script>

$(document).ready(function(){
    function allRideUser() {
    var action='usr_all_data';
    var c_id = <?php echo $_SESSION['userdata']['userid']?>;
    $.ajax({
                url : 'ajaxaction.php',
                type : "POST",
                dataType :'json',
                data : {action:action ,id:c_id},               
                success : function (data) {
                var output;
                for(var i=0;i<data.length;i++) { 
                    output+= "<tr><td>" + data[i]['rideid'] + "</td><td>" + data[i]['ridedate'] + "</td><td>" + data[i]['from'] + "</td><td>" + data[i]['to'] + "</td><td>" + data[i]['cabtype'] + "</td><td>" + data[i]['totaldist'] + "</td><td>" + data[i]['luggage'] + "</td><td>" + data[i]['totalfare'] + "</td><td>"+data[i]['userid']+"</td></tr>";                        
                }
                $('#data').html(output); 
                }               
            });
        }
       allRideUser();
       $('#ride_sorting').change(function(){
            var sort_ride = $(this).val();
            var id = <?php echo $_SESSION['userdata']['userid']?>;
            var action = 'sort_user_ride';
            $.ajax({
                url:'ajaxaction.php',
                type:'post',
                dataType : "json",
                data : {ride:sort_ride, action:action, id:id},
                success : function(data) {
                    var output;
                for(var i=0;i<data.length;i++) { 
                    output+= "<tr><td>" + data[i]['rideid'] + "</td><td>" + data[i]['ridedate'] + "</td><td>" + data[i]['from'] + "</td><td>" + data[i]['to'] + "</td><td>" + data[i]['cabtype'] + "</td><td>" + data[i]['totaldist'] + "</td><td>" + data[i]['luggage'] + "</td><td>" + data[i]['totalfare'] + "</td><td>" + data[i]['userid'] + "</td></tr>";                        
                }
                $('#data').html(output); 
                }
            })
        });
    });
</script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html> 