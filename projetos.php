<?php
session_start();
require '../conexaobd/conexao.php';

$sql = "SELECT * FROM Projeto";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table class='table'>";
    echo "<thead><tr><th>ID Projeto</th><th>Descrição</th><th>Nome Projeto</th><th>Data Início</th><th>Data Fim</th><th>Status</th><th>Ações</th></tr></thead><tbody>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$row['ID_Projeto']}</td>";
        echo "<td>{$row['Descricao']}</td>";
        echo "<td>{$row['Nome_projeto']}</td>";
        echo "<td>{$row['Data_Inicio']}</td>";
        echo "<td>{$row['Data_Fim']}</td>";
        echo "<td>{$row['Status']}</td>";
        echo "<td>";
        echo "<a href='projetos_edit.php?id={$row['ID_Projeto']}' class='btn btn-warning'>Editar</a> ";
        echo "<a href='projetos_delete.php?id={$row['ID_Projeto']}' class='btn btn-danger'>Excluir</a>";
        echo "</td>";
        echo "</tr>";
    }
    echo "</tbody></table>";
} else {
    echo "Nenhum registro encontrado.";
}

$conn->close();
?>
