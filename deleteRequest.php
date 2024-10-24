<?php
require_once 'connect.php';
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET,POST,PATCH,PUT,DELETE,OPTINS');
header('Access-Control-Allow-Headers: Origin,Content-Type,X-Auth-Token');
$data=json_decode(file_get_contents("php://input"));
$id=$data->id;

$sql="delete from requests where id='".$id."'";
$result=mysqli_query($con,$sql) or die(mysqli_error($con));

if($result){
    echo "Deleted Successfully";
}else{
    echo "There was a problem in the server.. Please try again later, Error: " . $result;   
}

mysqli_close($con);
