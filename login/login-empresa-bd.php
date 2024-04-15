<?php
include("../conexaobd/conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    header("Location: ../homepage/index.php");
}

$conn->close();
?>
