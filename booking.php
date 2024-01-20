<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

if(!isset($_GET['Email_address']) || strlen($_GET['Email_address']) == 0) die("Property 'Email_address' is missing.");
if(!isset($_GET['Phone_number']) || strlen($_GET['Phone_number']) == 0) die("Property 'Phone_number' is missing.");
if(!isset($_GET['Full_name']) || strlen($_GET['Full_name']) == 0) die("Property 'Full_name' is missing.");
if(!isset($_GET['Inqury']) || strlen($_GET['Inqury']) == 0) die("Property 'Inqury' is missing.");
if(!isset($_GET['Date']) || strlen($_GET['Date']) == 0) die("Property 'Date' is missing.");

$email_address = $_GET['Email_address'];
$phone_number = $_GET['Phone_number'];
$full_name = $_GET['Full_name'];
$inqury = $_GET['Inqury'];
$date = $_GET['Date'];

$servername = "localhost";
$username = "CulavP";
$password = "CulavP_2022";
$database = "CulavP";

$sql = "INSERT INTO booking (date, status, fullName, emailAddress, phoneNumber, inqury) values ('" . $date . "', 0, '" . $full_name . "', '" . $email_address . "', '" . $phone_number . "', '" . $inqury . "')";

$connection = new mysqli($servername, $username, $password, $database);

if ($connection->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} else {
  $result = $connection->query($sql);
}

echo '{"status": 200}';
