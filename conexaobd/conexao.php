<?php
$servername = "127.0.0.1:3306";
$username = "root";
$password = "root";
$dbname = "pucdevacademy";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

