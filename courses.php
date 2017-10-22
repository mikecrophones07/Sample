<?php 
$mysql_servername = "localhost";
$mysql_username = "root";
$mysql_password = "";
$mysql_dbname = "carparking";

$M_PLATE = $_POST['M_PLATE'];
$response = array();
$response = array();

$dbc = mysqli_connect($mysql_servername, $mysql_username, $mysql_password, $mysql_dbname) or die('Error connecting tto MySql server');
$sql = "SELECT * FROM parkers where plate_num = '$M_PLATE'";

$result = mysqli_query($dbc, $sql);
while($row = mysqli_fetch_assoc($result)) {
    $arrayData = array();
    $arrayData['plate_num'] = $row['plate_num'];
    $arrayData['drivername'] = $row['drivername'];
    $arrayData['drivertype'] = $row['drivertype'];
    $arrayData['carmodel'] = $row['carmodel'];

    array_push($response, $arrayData);
}

echo json_encode(array("accounts"=>$response));

?>