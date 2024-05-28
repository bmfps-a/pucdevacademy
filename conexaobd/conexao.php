<?php
$servername = "127.0.0.1:3306";
$username = "root";
<<<<<<< HEAD
$password = "root";
=======
$password = "root123.";
>>>>>>> d12f0e1d1b7d111a7a39cec6168a1eb445198b66
$dbname = "pucdevacademy";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

