<?php
$host='localhost';
$dbname='user_db';
$usr='root';
$password="jkaty43785";
$mysqli = new mysqli($host, $usr, $password,$dbname);
if(mysqli_connect_errno())
{
    echo mysqli_connect_error();
}
$tel = $_POST['tel'];
$pw = $_POST['password'];
$now = date("Y-m-d H:i:s");
$insert = "INSERT INTO accounts (tel, pw, signup_time, wallet)
VALUES ('".$tel."', PASSWORD('".$pw."'), '".$now."',0 );";
echo $insert;
if($mysqli->query($insert) == TRUE) {
    echo 'ok';
}
else {
    echo "INSERT attempt failed" ;
}
$mysqli->close();