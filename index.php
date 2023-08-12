<?php
session_start();

if(!isset($_SESSION['user'])){
   header("location: signup.php");
}else{
   header("location: dashboard.php");
}