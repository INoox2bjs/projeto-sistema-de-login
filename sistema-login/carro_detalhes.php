<?php

include 'conexao.php';

$link = getConnection();

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = "SELECT carros.*, usuarios.nome AS vendedor FROM carros JOIN usuarios ON carros.id_vendedor = usuarios.id WHERE carros.id = ?";
    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $carro = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);
} else {
    $carro = null;
}

mysqli_close($link);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Carro</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <nav>
            <h2>Sistema de Vendas de Carros</h2>
            <ul class="nav-links">
                <li><a href="login.php">Login</a></li>
                <li><a href="cadastro.php">Cadastro</a></li>
                <li><a href="carros.php">Ver Carros</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="container">
            <h1>Detalhes do Carro</h1>
            <?php if ($carro): ?>
                <div class="car-details">
                    <p><strong>Modelo:</strong> <?php echo htmlspecialchars($carro['modelo']); ?></p>
                    <p><strong>Marca:</strong> <?php echo htmlspecialchars($carro['marca']); ?></p>
                    <p><strong>Ano:</strong> <?php echo htmlspecialchars($carro['ano']); ?></p>
                    <p><strong>Preço:</strong> R$ <?php echo number_format($carro['preco'], 2, ',', '.'); ?></p>
                    <p><strong>Descrição:</strong> <?php echo htmlspecialchars($carro['descricao']); ?></p>
                    <p><strong>Vendedor:</strong> <?php echo htmlspecialchars($carro['vendedor']); ?></p>
                </div>
                <a href="carros.php">Voltar à Lista</a>
            <?php else: ?>
                <p>Carro não encontrado.</p>
            <?php endif; ?>
        </div>
    </main>
    <footer>
        <p>&copy; 2025 Sistema de Vendas de Carros</p>
    </footer>
</body>
</html>
