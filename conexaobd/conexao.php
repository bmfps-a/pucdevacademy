<?php
$servername = "localhost";
$username = "root";
$password = "Brunomatheus1";
$dbname = "pucdevacademy2";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

