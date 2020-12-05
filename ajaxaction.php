<?php
require 'config.php';
require 'userclass.php';
$obj = new Config();
$data = $obj->connect();
$userobjects = new Userclass();

$action = $_POST['action']; 

switch ($action) {

case 'canc_ride_data':
    $output = $userobjects->canc_ride_data($data);
    echo $output;
    break;

case 'comp_ride_data':
    $output = $userobjects->comp_ride_data($data);
    echo $output;
    break;

case 'all_ride_data':
    $output = $userobjects->all_ride_data($data);
    echo $output;
    break;
    
case 'fatch_data':
    $output = $userobjects->fatch_data($data);
    print_r($output);
    break;

case 'edit_btn_for_ride':
    $id = $_POST['id'];
    $output = $userobjects->edit_btn_for_ride($id, $data);
    echo $output;
    break;

case 'del_btn_for_ride':
    $id = $_POST['id'];
    $output = $userobjects->del_btn_for_ride($id, $data);
    echo $output;
    break;

case 'del_btn_for_all_ride':
    $id = $_POST['id'];
    $output = $userobjects->del_btn_for_all_ride($id, $data);
    echo $output;
    break;

case 'pending_data':
    $output = $userobjects->pending_data($data);
    print_r($output);
    break;    

case 'del_btn_for_app_users':
    $id = $_POST['id'];
    $output = $userobjects->del_btn_for_app_users($id, $data);
    echo $output;
    break;

case 'approved_data':
    $output = $userobjects->approved_data($data);
    print_r($output);
    break;

case 'edit_btn_for_app_users':
    $id = $_POST['id'];
    $output = $userobjects->edit_btn_app_users($id, $data);
    echo $output;
    break;
case 'del_btn_for_approved_users':
    $id = $_POST['id'];
    $output = $userobjects->del_btn_for_approved_users($id, $data);
    echo $output;
    break;

case'pending_ride_user':
    $id = $_POST['id'];
    $output = $userobjects->pending_ride_user($data, $id);
    echo $output;
    break;
case'usr_cmpl_data':
    $id = $_POST['id'];
    $output = $userobjects->usr_compl_data($data, $id);
    print_r($output);
    break;

case 'usr_all_data':
    $id = $_POST['id'];
    $output = $userobjects->usr_all_data($data, $id);
    print_r($output);
    break;

case 'sort_ride':
    $ride_sort = $_POST['ride'];    
    $output = $userobjects->sort_ride($data, $ride_sort);
    print_r($output);
    break;

case 'sort_user_ride':
    $ride_sort = $_POST['ride'];
    $id = $_POST['id'];
    $output = $userobjects->sort_user_ride($data, $ride_sort, $id);
    print_r($output);
    break;

case'location_data':
    $output = $userobjects->locationList($data);
    print_r($output);
    break;
case'del_btn_for_location':
    $id = $_POST['id'];
    $output = $userobjects->del_btn_for_location($id, $data);
    echo $output;
    break;
case 'invoice_ride':
    $id = $_POST['id'];
    $output = $userobjects->invoice_ride($id, $data);
    echo $output;
    break;
case 'edit_btn_for_location':
    $id = $_POST['id'];
    $output = $userobjects->edit_btn_app_location($id, $data);
    print_r($output);
    break;
case 'sort_approved_user';
    $ride_sort = $_POST['ride'];
    $id = $_POST['id'];
    $output = $userobjects->sort_app_user($data, $ride_sort, $id);
    print_r($output);
    break;
case 'sort_pending_user':
    $ride_sort = $_POST['ride'];
    $id = $_POST['id'];
    $output = $userobjects->sort_pend_user($data, $ride_sort, $id);
    print_r($output);
    break;
case 'sort_comp_user':
    $ride_sort = $_POST['ride'];
    $id = $_POST['id'];
    $output = $userobjects->sort_comp_user($data, $ride_sort, $id);
    print_r($output);
    break;
case 'sort_comp_rides':
    $ride_sort = $_POST['ride'];    
    $output = $userobjects->sort_ride($data, $ride_sort);
    print_r($output);
    break;
case 'sort_req_ride':
    $ride_sort = $_POST['ride'];    
    $output = $userobjects->sort_req($data, $ride_sort);
    print_r($output);
    break;
case 'sort_canc_ride':
    $ride_sort = $_POST['ride'];    
    $output = $userobjects->sort_canc_ride($data, $ride_sort);
    print_r($output);
    break;
//filter all rides 
case 'filter_ride':
    $ride_sort = $_POST['ride'];    
    $output = $userobjects->filter_ride($data, $ride_sort);
    print_r($output);
    break;
case 'filter_user_ride':
    $ride_filter = $_POST['ride'];
    $id = $_POST['id'];
    $output = $userobjects->filter_user_ride($data, $ride_filter, $id);
    print_r($output);
    break;
case 'sort_pend_ride':
    $ride_sort = $_POST['ride'];
    $id = $_POST['id'];
    $output = $userobjects->sort_pend_user_ride($data, $ride_sort, $id);
    print_r($output);
    break;
case 'del_btn_for_pend_users':
    $id = $_POST['id'];
    $output = $userobjects->del_btn_for_pend_users($id, $data);
    echo $output;
    break;
}
?>