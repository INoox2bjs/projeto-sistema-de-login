<?php

session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit;
}

$usuario = $_SESSION['usuario'];


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   
    include 'conexao.php';
  
    $link = getConnection();

    
    $modelo = $_POST['modelo'];
    $marca = $_POST['marca'];
    $ano = $_POST['ano'];
    $preco = $_POST['preco'];
    $descricao = $_POST['descricao'];
    
    $id_vendedor = $usuario['id'];

   
    $query = "INSERT INTO carros (modelo, marca, ano, preco, descricao, id_vendedor) VALUES ('$modelo', '$marca', '$ano', '$preco', '$descricao', '$id_vendedor')";
   
    mysqli_query($link, $query);

    echo "Carro adicionado com sucesso! <a href='carros.php'>Ver carros</a>";
 
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Carro</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <nav>
            <h2>Sistema de Vendas de Carros</h2>
            <ul class="nav-links">
                <li><a href="painel.php">Painel</a></li>
                <li><a href="add_carro.php">Adicionar Carro</a></li>
                <li><a href="carros.php">Ver Carros</a></li>
                <li><a href="logout.php">Sair</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="container">
            <h1>Adicionar Carro</h1>
            <form method="POST" id="addCarroForm" novalidate>
                <div class="form-group">
                    <label for="modelo">Modelo</label>
                    <input type="text" id="modelo" name="modelo" required>
                </div>
                <div class="form-group">
                    <label for="marca">Marca</label>
                    <input type="text" id="marca" name="marca" required>
                </div>
                <div class="form-group">
                    <label for="ano">Ano</label>
                    <input type="number" id="ano" name="ano" required>
                </div>
                <div class="form-group">
                    <label for="preco">Preço</label>
                    <input type="number" step="0.01" id="preco" name="preco" required>
                </div>
                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <textarea id="descricao" name="descricao"></textarea>
                </div>
                <button type="submit" class="btn">Adicionar Carro</button>
            </form>
        </div>
    </main>
    <footer>
        <p>&copy; 2025 Sistema de Vendas de Carros</p>
    </footer>
    <script src="js/add_carro.js"></script>
</body>
</html>
