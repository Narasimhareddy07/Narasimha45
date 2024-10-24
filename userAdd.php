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
$pass = md5($data->pass);


// **** Insert data into user table ****
$sql = "insert into users(phone,name,address,gender,hostel_id) 
    values('" . $phone . "','" . $name . "','" . $address . "','" . $gender . "','" . $hostel_id . "')";
$res = mysqli_query($con, $sql) or die(mysqli_error($con));
if ($res) {
    // *** Insert data into creds table ****
    $sql1 = "insert into creds(username,pass,type) values('" . $phone . "','" . $pass . "', 'student')";
    $res1 = mysqli_query($con, $sql1) or die(mysqli_error($con));

    if ($res1) {
        echo $name . " you have been registed successfully.";
    } else {
        echo "! Please Contact to the admin.. You are registerd but not in the Login Credentials..";
    }
} else {
    echo "! There was a problem in your registration, please Try again Later...";
}
mysqli_close($con);
