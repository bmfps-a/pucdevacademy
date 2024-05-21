<?php
session_start();
require '../conexaobd/conexao.php';

$sql = "SELECT * FROM Empresa";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table class='table'>";
    echo "<thead><tr><th>CNPJ</th><th>Nome Empresa</th><th>Nome Fantasia</th><th>Ramo Empresarial</th><th>Telefone</th><th>Ações</th></tr></thead><tbody>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$row['CNPJ']}</td>";
        echo "<td>{$row['Nome_empresa']}</td>";
        echo "<td>{$row['Nome_fantasia']}</td>";
        echo "<td>{$row['Ramo_empresarial']}</td>";
        echo "<td>{$row['Telefone']}</td>";
        echo "<td>";
        echo "<a href='empresas_edit.php?cnpj={$row['CNPJ']}' class='btn btn-warning'>Editar</a> ";
        echo "<a href='empresas_delete.php?cnpj={$row['CNPJ']}' class='btn btn-danger'>Excluir</a>";
        echo "</td>";
        echo "</tr>";
    }
    echo "</tbody></table>";
} else {
    echo "Nenhum registro encontrado.";
}

$conn->close();
?>
