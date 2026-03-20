<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit;
}

$usuario = $_SESSION['usuario'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <nav>
            <h2>Sistema de Login</h2>
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
            <h1>Bem-vindo ao Painel, <?php echo htmlspecialchars($usuario['nome']); ?>!</h1>
            <p>Você está logado no sistema de autenticação.</p>
            <p>Email: <?php echo htmlspecialchars($usuario['email']); ?></p>
            <a href="logout.php" class="btn">Logout</a>
        </div>
    </main>
    <footer>
        <p>&copy; 2025 Sistema de Login</p>
    </footer>
</body>
</html>
