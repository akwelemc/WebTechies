<?php
$host = 'localhost';
$db_name = 'WT2024';
$name = 'root';
$password = 'cs341webtech';

$conn = new mysqli($host, $name, $password, $db_name);

if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
}
