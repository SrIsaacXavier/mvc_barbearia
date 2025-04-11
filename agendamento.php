<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendamentos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Cadastrar Datas para Agendamento</h1>
        <?php if ($message): ?>
            <div class="message"><?= $message ?></div>
            <script>
                alert('Agendamento realizado com sucesso');
            </script>
        <?php endif; ?>
        <form method="post">
            <input type="date" name="data" required>
            <button type="submit" name="add_date" class="btn">Cadastrar Data</button>
        </form>

        <h2>Editar/Excluir Datas</h2>
        <?php while ($row = $stmt->fetch()): 
            $data_brasil = (new DateTime($row['data']))->format('d/m/Y');
        ?>
            <form method="post" class="agendamento">
                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                <input type="date" name="data" value="<?= $row['data'] ?>" required>
                <span><?= $data_brasil ?></span>
                <button type="submit" name="edit_date" class="btn">Editar</button>
                <button type="submit" name="delete_date" class="btn btn-danger">Excluir</button>
            </form>
        <?php endwhile; ?>
        <a href="dashboard.php" class="btn">Voltar</a>
    </div>
</body>
</html>
