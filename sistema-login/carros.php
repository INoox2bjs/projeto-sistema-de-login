<?php

include 'conexao.php';

$link = getConnection();

$query = "SELECT carros.*, usuarios.nome AS vendedor FROM carros JOIN usuarios ON carros.id_vendedor = usuarios.id";
$result = mysqli_query($link, $query);
$carros = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_close($link);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carros à Venda</title>
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
            <h1>Carros à Venda</h1>
            <?php if (count($carros) > 0): ?>
                <table>
                    <thead>
                        <tr>
                            <th>Modelo</th>
                            <th>Marca</th>
                            <th>Ver Descrição</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($carros as $carro): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($carro['modelo']); ?></td>
                                <td><?php echo htmlspecialchars($carro['marca']); ?></td>
                                <td><a href="carro_detalhes.php?id=<?php echo $carro['id']; ?>">Ver Descrição</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>Nenhum carro disponível no momento.</p>
            <?php endif; ?>
        </div>
    </main>
    <footer>
        <p>&copy; 2025 Sistema de Vendas de Carros</p>
    </footer>
</body>
</html>
