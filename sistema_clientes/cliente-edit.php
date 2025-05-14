<?php
session_start();
require 'conexao.php';

// Verifica se o id do cliente está presente na URL
if (isset($_GET['id'])) {
    $cliente_id = $_GET['id'];

    // Consulta para pegar os dados do cliente
    $sql = "SELECT * FROM clientes WHERE id = :id";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':id', $cliente_id, PDO::PARAM_INT);
    $stmt->execute();
    $cliente = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    header('Location: pageinicial.php');
    exit;
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include('navbar.php'); ?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h4>Editar Cliente</h4>
                <form action="acoes.php" method="POST">
                    <input type="hidden" name="cliente_id" value="<?= $cliente['id'] ?>">
                    <div class="mb-3">
                        <label>Nome</label>
                        <input type="text" name="nome" class="form-control" value="<?= $cliente['nome'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="<?= $cliente['email'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label>Telefone</label>
                        <input type="text" name="telefone" class="form-control" value="<?= $cliente['telefone'] ?>">
                    </div>
                    <div class="mb-3">
                        <label>Endereço</label>
                        <input type="text" name="endereco" class="form-control" value="<?= $cliente['endereco'] ?>">
                    </div>
                    <div class="mb-3">
                        <label>Data de Nascimento</label>
                        <input type="date" name="data_nascimento" class="form-control" value="<?= $cliente['data_nascimento'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="update_cliente" class="btn btn-warning">Atualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
