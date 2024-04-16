<?php
include("../conexaobd/conexao.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Empresa</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        
        .btn-primary{
            background-color: #7742E8;
            border-color: #7742E8;
        }
        
        .mb-4{
            color: white;
            text-align: center;
        }
        
        .edit-form {
            background-color: #333333;
            border: 1px solid #333333;
            border-radius: 5px;
            padding: 20px;
            color: white;
        }

        .edit-form input[type="text"] {
            width: 100%;
            margin-bottom: 10px;
        }

        .edit-form input[type="submit"] {
            background-color: #7742E8;
            border-color: #7742E8;
            color: #ffffff;
        }

        .edit-form input[type="submit"]:hover {
            background-color: #7742E8;
            border-color: #7742E8;
        }
    </style>
</head>
<body style="background-color:  #222222;">
    <div class="container mt-4">
        <h3 class="mb-4">Editar Empresa</h3>
        <div class="edit-form">
<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['cnpj'])) {
    $cnpj = $_GET['cnpj'];
    
    $sql = "SELECT * FROM Empresa WHERE cnpj='$cnpj'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        echo "<form method='post' action='update_empresa.php' class='needs-validation' novalidate>
            <div class='form-group'>
                <label for='cnpj'>CNPJ:</label>
                <input type='text' id='cnpj' name='cnpj' class='form-control' value='" . $row['cnpj'] . "' readonly>
            </div>
            <div class='form-group'>
                <label for='nome_empresa'>Nome Empresa:</label>
                <input type='text' id='nome_empresa' name='nome_empresa' class='form-control' value='" . $row['nome_empresa'] . "'>
            </div>
            <div class='form-group'>
                <label for='nome_fantasia'>Nome Fantasia:</label>
                <input type='text' id='nome_fantasia' name='nome_fantasia' class='form-control' value='" . $row['nome_fantasia'] . "'>
            </div>
            <div class='form-group'>
                <label for='ramo_empresarial'>Ramo Empresarial:</label>
                <input type='text' id='ramo_empresarial' name='ramo_empresarial' class='form-control' value='" . $row['ramo_empresarial'] . "'>
            </div>
            <div class='form-group'>
                <label for='telefone'>Telefone:</label>
                <input type='text' id='telefone' name='telefone' class='form-control' value='" . $row['telefone'] . "'>
            </div>
            <input type='submit' value='Salvar' class='btn btn-primary'>
        </form>";
    } else {
        echo "Empresa não encontrada.";
    }
} else {
    echo "Requisição inválida.";
}
?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
