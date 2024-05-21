<?php
session_start();
require '../conexaobd/conexao.php';

$sql = "SELECT * FROM Aluno_puc";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table class='table'>";
    echo "<thead><tr><th>CPF</th><th>Nome</th><th>Email</th><th>RA</th><th>Telefone</th><th>Foto</th><th>Ações</th></tr></thead><tbody>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$row['CPF']}</td>";
        echo "<td>{$row['Nome']}</td>";
        echo "<td>{$row['Email']}</td>";
        echo "<td>{$row['Ra']}</td>";
        echo "<td>{$row['Telefone']}</td>";
        echo "<td><img src='data:image/jpeg;base64," . base64_encode($row['Foto_aluno']) . "' width='100' height='100' /></td>";
        echo "<td>";
        echo "<a href='alunos_edit.php?cpf={$row['CPF']}' class='btn btn-warning'>Editar</a> ";
        echo "<a href='alunos_delete.php?cpf={$row['CPF']}' class='btn btn-danger'>Excluir</a>";
        echo "</td>";
        echo "</tr>";
    }
    echo "</tbody></table>";
} else {
    echo "Nenhum registro encontrado.";
}

$conn->close();
?>
