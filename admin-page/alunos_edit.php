<?php
session_start();
require '../conexaobd/conexao.php';

if (isset($_GET['cpf'])) {
    $cpf = $_GET['cpf'];

    $sql = "SELECT * FROM Aluno_puc WHERE CPF = '$cpf'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        // Formulário de edição
        echo "<form action='update_aluno.php' method='POST'>";
        echo "<input type='hidden' name='cpf' value='{$row['CPF']}'>";
        echo "<label for='nome'>Nome:</label>";
        echo "<input type='text' id='nome' name='nome' value='{$row['Nome']}'>";
        echo "<label for='email'>Email:</label>";
        echo "<input type='email' id='email' name='email' value='{$row['Email']}'>";
        echo "<label for='ra'>RA:</label>";
        echo "<input type='text' id='ra' name='ra' value='{$row['Ra']}'>";
        echo "<label for='telefone'>Telefone:</label>";
        echo "<input type='text' id='telefone' name='telefone' value='{$row['Telefone']}'>";
        echo "<button type='submit'>Salvar</button>";
        echo "</form>";
    } else {
        echo "Aluno não encontrado.";
    }
} else {
    echo "CPF não especificado.";
}

$conn->close();
?>
