<?php 

$servername = "localhost";
$username = "root";
$password = "nixith27";
$database = "DietDB";

//the connection object
$con = new mysqli($servername, $username, $password, $database);

//check the connection
if($con -> connect_error){
    die("Connection failed : " .$con -> connect_error);
}else{
    echo "Connected successfully";
}

?>