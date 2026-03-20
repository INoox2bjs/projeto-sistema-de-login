<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'conexao.php';
    $link = getConnection();

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $query = "SELECT * FROM usuarios WHERE email = '$email'";
    $result = mysqli_query($link, $query);
    $usuario = mysqli_fetch_assoc($result);

    if ($usuario && password_verify($senha, $usuario['senha'])) {
        $_SESSION['usuario'] = $usuario;
        header('Location: painel.php');
        exit;
    } else {
        $error = "Credenciais inválidas!";
    }

    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <nav>
            <h2>Sistema de Login</h2>
            <ul class="nav-links">
                <li><a href="login.php">Login</a></li>
                <li><a href="cadastro.php">Cadastro</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="container">
            <h1>Login</h1>
            <?php if (!empty($error)): ?>
                <p style="color: #e74c3c; font-weight: bold;"><?php echo htmlspecialchars($error); ?></p>
            <?php endif; ?>
            <form method="POST" id="loginForm" novalidate>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" autocomplete="username" required>
                </div>
                <div class="form-group">
                    <label for="senha">Senha</label>
                    <input type="password" id="senha" name="senha" autocomplete="current-password" required>
                </div>
                <button type="submit">Entrar</button>
            </form>
            <p class="text-center mb-2">Não tem uma conta? <a href="cadastro.php">Cadastre-se</a></p>
        </div>
    </main>
    <footer>
        <p>&copy; 2025 Sistema de Login</p>
    </footer>
    <script src="js/login.js"></script>
</body>

</html>
