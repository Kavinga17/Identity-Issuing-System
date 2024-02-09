<?php

$serverName="localhost";
$dbUser="root";
$dbPassword="";
$dbName="spark_identity";

$conn= new mysqli($serverName,$dbUser,$dbPassword,$dbName);

if(!$conn){
    die("Connection Faild");
}
?>