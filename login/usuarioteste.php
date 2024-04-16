<?php
session_start();
include("../conexaobd/conexao.php");

if(!isset($_SESSION['emailcolaborador'])) {
    if(isset($_SESSION['emailempresa'])) {
        header("Location: ../homepage/index.php");
        exit();
    }
    else{
        header("Location: ../login/login.php");
        exit();
    }
}    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Empresas</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .btn-primary{
            background-color: #7742E8;
            border-color: #7742E8;
        }

        .btn-primary:hover, .btn-primary:focus {
            background-color: #7742E8 !important;
            border-color: #7742E8 !important;
            color: black;
        }

        .edit-btn {
            background-color: #25DF7C; 
            border-color: #25DF7C;
            color: white;
        }
        
        .delete-btn {
            background-color: #dc3545; 
            border-color: #dc3545;
            color: white;
        }
        
        .edit-btn:hover, .edit-btn:focus, .delete-btn:hover, .delete-btn:focus {
            background-color: #25DF7C !important;
            border-color: #25DF7C !important;
        }
        
        .delete-btn:hover, .delete-btn:focus {
            background-color: #dc3545 !important;
            border-color: #dc3545 !important;
        }

        .mb-4 {
            font-weight: bold;
            color: white
        }

        .custom-table {
            background-color: #f8f9fa; 
            color: #212529; 
        }

        .custom-table th {
            background-color: #343a40; 
            color: #ffffff; 
        }

        .custom-table td, .custom-table th {
            vertical-align: middle !important; 
        }
        tbody{
            background-color: #181818;
            color: white
            
        }
    </style>
</head>
<body style="background-color:  #222222;">
     <div class="container mt-4">
        <a href="../homepage/index.php" class="btn btn-primary">Voltar à Homepage</a>
    </div>
    <div class="container mt-4">
        <h3 class="mb-4" style="text-align:center">Listagem de Empresas</h3>
        <div class="table-responsive">
            <table class="table table-striped table-bordered custom-table">
                <thead class="thead-dark">
                    <tr>
                        <th>CNPJ</th>
                        <th>Nome Empresa</th>
                        <th>Nome Fantasia</th>
                        <th>Ramo Empresarial</th>
                        <th>Telefone</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>

<?php
$sql = "SELECT * FROM Empresa";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["cnpj"] . "</td>";
        echo "<td>" . $row["nome_empresa"] . "</td>";
        echo "<td>" . $row["nome_fantasia"] . "</td>";
        echo "<td>" . $row["ramo_empresarial"] . "</td>";
        echo "<td>" . $row["telefone"] . "</td>";
        echo "<td>
                    <a href='edit_empresa.php?cnpj=" . $row["cnpj"] . "' class='btn btn-sm edit-btn'>Editar</a>
                    <a href='delete_empresa.php?cnpj=" . $row["cnpj"] . "' class='btn btn-sm delete-btn ml-1' onclick=\"return confirm('Tem certeza que deseja excluir esta empresa?')\">Deletar</a>
                </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='6' class='text-center'>Não há empresas cadastradas ainda!</td></tr>";
}

mysqli_close($conn);
?>
                    
                </tbody>
            </table>
        </div>
    </div>

    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
