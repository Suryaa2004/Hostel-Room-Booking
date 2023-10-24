<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "project";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname,"3307"))
{

	die("failed to connect!");
}