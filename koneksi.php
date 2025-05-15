<<<<<<< HEAD
<?php 

$host="localhost";
$user="root";
$pass="";
$db="kora_db";
$conn=new mysqli($host,$user,$pass,$db);

if($conn->connect_error){
    http_response_code(500);
    die("gagal konek ke db: " . $conn->connect_error);
}
=======
<?php 

$host="localhost";
$user="root";
$pass="";
$db="kora_db";
$conn=new mysqli($host,$user,$pass,$db);

if($conn->connect_error){
    echo"gagal konek ke db".$conn->connect_error;
}
>>>>>>> cd0a9dd9413469b337ef770834175199865ee366
?>