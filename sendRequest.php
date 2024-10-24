<?php
include "connect.php";
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET,POST,PATCH,PUT,DELETE,OPTINS');
header('Access-Control-Allow-Headers: Origin,Content-Type,X-Auth-Token');
$data = json_decode(file_get_contents("php://input"));
$phone = $data->phone;
$name = $data->name;
$address = $data->address;
$gender = $data->gender;
$hostel_id = $data->hostel_id;
$purpose = $data->reason;
$d_from = $data->d_from;
$d_to = $data->d_to;
$todayDate = date("Y-m-d");

// **** Insert data into user table ****
$sql = "insert into requests(hostel_id,name,phone,gender,purpose,d_from,d_to,address,status,issue_date) 
    values('" . $hostel_id . "','" . $name . "','" . $phone . "','" . $gender . "','" . $purpose . "',
    '" . $d_from . "', '" . $d_to . "', '" . $address . "', '0', '" . $todayDate . "')";
$res = mysqli_query($con, $sql) or die(mysqli_error($con));
if ($res) {
    echo "Request Sent Successfully";
} else {
    echo "! There was a problem in sending the request. Try again Later";
}
mysqli_close($con);
