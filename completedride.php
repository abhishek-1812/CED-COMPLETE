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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <script src = "script.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
</head>
<body class="id">
    <header>
    <div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">CED-<span id="cold">CAB</span></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="admindash.php">HOME<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          LOCATION
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="location.php">Add Location</a>
          <a class="dropdown-item" href="locationlist.php">Location List</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          USERS
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="pendinguser.php">Pending Users</a>
          <a class="dropdown-item" href="approveduser.php">Approved Users</a>
          <a class="dropdown-item" href="allusers.php">All Users</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          RIDES
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="requestride.php">Pending Rides</a>
          <a class="dropdown-item" href="completedride.php">Completed Rides</a>
          <a class="dropdown-item" href="cancelride.php">Cancelled Rides</a>
          <a class="dropdown-item" href="allride.php">All Rides</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          ACCOUNT
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="changepassword.php">Change Password</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
    </div>
    </header>
    <section>
    <select name="" id="sort_comp" class="sort">
            <option value="">SORT BY</option>
            <option value="ridedate">DATE</option>
            <option value="cabtype">CABTYPE</option>
            <option value="totaldist">DISTANCE</option>
        </select>
        <h2 class="text-center mt-4">COMPLETED RIDES</h2>
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
                        <th>STATUS</th>
                        <th>ACTION</th>
                    </tr>
                    <tbody id="data"></tbody>
                </table>
            </div>
    </section>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">INVOICE</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary " onclick="printPageArea('exampleModal')">Print</button>
      </div>
    </div>
  </div>
</div>
<footer>
  <div class="container-fluid">
      <div class="row align-items-center pad">
          <div class="col-lg-4 my-3 my-lg-0">
              <a class="btn btn-dark btn-social mx-2" href="#"><i class="fab fa-twitter"></i></a>
              <a class="btn btn-dark btn-social mx-2" href="#"><i class="fab fa-facebook-f"></i></a>
              <a class="btn btn-dark btn-social mx-2" href="#"><i class="fab fa-instagram"></i></a>
          </div>
          <div class="col-lg-4 text-lg-center rs">
              <p id="ced">CED-<span>CAB</span></p>
              <p class="text-danger"><i class="fas fa-heart"></i>
              Crafted lovingly in CEDCOSS.
          </div>
          <div class="col-lg-4 text-lg-right">
              <a class="mr-3 text-muted" href="#!">Features</a>
              <a class="mr-3 text-muted" href="#!">Reviews</a>
              <a class="mr-3 text-muted" href="#!">Sign up</a>
          </div>
      </div>
  </div>
</footer>
<script>

$(document).ready(function(){
    function fatch_comp_ride() {
    var action='comp_ride_data';
    $.ajax({
                url : 'ajaxaction.php',
                type : "POST",
                dataType :'json',
                data : {action:action},
                success : function (data) {
                var output;
                for(var i=0;i<data.length;i++) { 
                    output+= "<tr><td>" + data[i]['rideid'] + "</td><td>" + data[i]['ridedate'] + "</td><td>" + data[i]['from'] + "</td><td>" + data[i]['to'] + "</td><td>" + data[i]['cabtype'] + "</td><td>" + data[i]['totaldist'] + "</td><td>" + data[i]['luggage'] + "</td><td>" + data[i]['totalfare'] + "</td><td>" + data[i]['userid'] + "</td><td>" + data[i]['status'] + "</td><td><input type='submit' class='btn btn-danger' value='DELETE' id='delbtn' data-did=" + data[i]['rideid'] + "><input type='button' class='btn btn-primary mt-2' value='INVOICE' id='inv' data-toggle='modal' data-target='#exampleModal' data-iid=" + data[i]['rideid'] + "></td></tr>";                        
                }
                $('#data').html(output); 
            }             
          });  
        }
      
        fatch_comp_ride();
       
            $(document).on("click",'#delbtn', function(){
              if(confirm("Are you sure you want to delete?")==true){
            var id = $(this).data("did");
            var element=this;
            var action ='del_btn_for_all_ride';
            $.ajax({
                url : 'ajaxaction.php',
                type : "POST",
                data : {id:id, action:action},
                success : function (data) {
                  if(data==1){
                    fatch_comp_ride();
                    $(element).closest("tr").fadeOut();
                   } else {
                     alert(data);
                   }
                  }
            });
          }
        });
        $(document).on("click",'#inv', function(){
            var id = $(this).data("iid");
            var element=this;
            var action ='invoice_ride';
            $.ajax({
                url : 'ajaxaction.php',
                type : "POST",
                dataType :'json',
                data : {id:id, action:action},
                success : function (data) {
                    var output;

                output = '<table class="table">';
                    for(var i=0;i<data.length;i++) { 
                        output+= "<tr><th>ID</th><td>" + data[i]['rideid'] + "</td></tr><tr><th>RIDE DATE</th><td>" + data[i]['ridedate'] + "</td></tr><tr><th>FROM</th><td>" + data[i]['from'] + "</td></tr><tr><th>TO</th><td>" + data[i]['to'] + "</td></tr><tr><th>CABTYPE</th><td>" + data[i]['cabtype'] + "</td></tr><tr><th>DISTANCE</th><td>" + data[i]['totaldist'] + "</td></tr><tr><th>LUGGAGE (in kg)</th><td>" + data[i]['luggage'] + "</td></tr><tr><th>TOTAL FARE</th><td>" + data[i]['totalfare'] + "</td></tr></tr>";                        
                    }
                    output+= '</table>';   
                    $('.modal-body').html(output); 
                        
                }
            });
        });
        $('#sort_comp').change(function(){
            var sort_ride = $(this).val();
            var action = 'sort_comp_rides';
            $.ajax({
                url:'ajaxaction.php',
                type:'post',
                dataType : "json",
                data : {ride:sort_ride, action:action},
                success : function(data) {
                    var output;
                for(var i=0;i<data.length;i++) { 
                    output+= "<tr><td>" + data[i]['rideid'] + "</td><td>" + data[i]['ridedate'] + "</td><td>" + data[i]['from'] + "</td><td>" + data[i]['to'] + "</td><td>" + data[i]['cabtype'] + "</td><td>" + data[i]['totaldist'] + "</td><td>" + data[i]['luggage'] + "</td><td>" + data[i]['totalfare'] + "</td><td>" + data[i]['userid'] + "</td><td>" + data[i]['status'] + "</td><td><input type='submit' class='btn btn-danger' value='DELETE' id='delbtn' data-did=" + data[i]['rideid'] + "><input type='button' class='btn btn-primary mt-2' value='INVOICE' id='inv' data-toggle='modal' data-target='#exampleModal' data-iid=" + data[i]['rideid'] + "></td></tr>";                       
                }
                $('#data').html(output); 
                }
            })
        });
  });
  function printPageArea(exampleModal){
    var printt = document.getElementById('exampleModal');
    var winPrint = window.open('', '', 'width=900, height=650');
    winPrint.document.write(printt.innerHTML);
    winPrint.document.close();
    winPrint.focus();
    winPrint.print();
    winPrint.close();

  }
</script>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html> 