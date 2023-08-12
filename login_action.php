<?php
session_start();

$url = "https://script.google.com/macros/s/AKfycbz5eD4I72WZhBwnJFa5L6Nl4EIZOLza7nx3Vvx8HZ3v1-E7508boLPJ7rYa1rfc1fIU/exec";
$postData = [
   "action" => "login",
   "email" => $_POST['email'],
   "password" => $_POST['password']
];

$ch = curl_init($url);
curl_setopt_array($ch, [
   CURLOPT_FOLLOWLOCATION => true,
   CURLOPT_RETURNTRANSFER => true,
   CURLOPT_POSTFIELDS => $postData
]);

$result = curl_exec($ch);
$result = json_decode($result, 1);

if($result['status'] == "success"){
   $_SESSION['user'] = $result['data'];
   header("location: dashboard.php");
}else{
   $_SESSION['error'] = $result['message'];
   header("location: login.php");
}

