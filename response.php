<?php

global $ctrl, $email, $name, $surname;
$ctrl = $_POST['Ctrl'];
$email = $_POST['Email'];
$name = $_POST['Name'];
$surname = $_POST['Surname'];

$url = "https://www.assodimi.it/admin/ext/user.php?Ctrl=$ctrl&Email=$email&Name=$name&Surname=$Surname";
// $url = "https://www.assodimi.it/admin/ext/user.php?Ctrl=7d593d9f178f68a9a3295738c6db3ced&Email=michele.c@cstv.it&Name=Michele&Surname=crivellaro";

$curl = curl_init("$url");
// error_log(var_export($curl));

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_HTTPHEADER, array(
    'Authorization: Bearer 37e1d2c63cb04ddd800ec6cf9ae1c325',
));

$response = curl_exec($curl);
$header_size = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
$header = substr($response, 0, $header_size);
$image_binary = substr($response, $header_size);
curl_close($curl);

print_r($response);

// print_r( json_decode($response, true));

?>