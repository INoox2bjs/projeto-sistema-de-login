<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'conexao.php';
    $link = getConnection();

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_BCRYPT);

    $query = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";
    mysqli_query($link, $query);

    echo "Cadastro realizado com sucesso! <a href='login.php'>Faça login</a>";
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
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
            <h1>Cadastro</h1>
            <form method="POST">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" id="nome" name="nome" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="senha">Senha</label>
                    <input type="password" id="senha" name="senha" required>
                </div>
                <button type="submit">Cadastrar</button>
            </form>
        </div>
    </main>
    <footer>
        <p>&copy; 2025 Sistema de Login</p>
    </footer>
</body>
</html>
