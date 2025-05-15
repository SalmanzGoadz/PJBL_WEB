<?php 

$host="localhost";
$user="root";
$pass="";
$db="kora_db";
$conn=new mysqli($host,$user,$pass,$db);

if($conn->connect_error){
    echo"gagal konek ke db".$conn->connect_error;
}
?>