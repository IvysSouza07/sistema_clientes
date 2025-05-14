<?php
session_start();
require 'conexao.php';

if (isset($_GET['id'])) {
    $cliente_id = $_GET['id'];
    $sql = "SELECT * FROM clientes WHERE id = :id";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':id', $cliente_id, PDO::PARAM_INT);
    $stmt->execute();
    $cliente = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Visualizar Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include('navbar.php'); ?>
    
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h4>Visualizar Cliente</h4>
                <?php if ($cliente): ?>
                    <div class="mb-3">
                        <label>Nome</label>
                        <p class="form-control"><?= $cliente['nome'] ?></p>
                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                        <p class="form-control"><?= $cliente['email'] ?></p>
                    </div>
                    <div class="mb-3">
                        <label>Telefone</label>
                        <p class="form-control"><?= $cliente['telefone'] ?></p>
                    </div>
                    <div class="mb-3">
                        <label>Endereço</label>
                        <p class="form-control"><?= $cliente['endereco'] ?></p>
                    </div>
                    <div class="mb-3">
                        <label>Data Nascimento</label>
                        <p class="form-control"><?= date('d/m/Y', strtotime($cliente['data_nascimento'])) ?></p>
                    </div>
                    <div class="mb-3">
                        <label>Data Cadastro</label>
                        <p class="form-control"><?= date('d/m/Y', strtotime($cliente['data_cadastro'])) ?></p>
                    </div>
                <?php else: ?>
                    <p>Cliente não encontrado.</p>
                <?php endif; ?>
                <a href="index.php" class="btn btn-danger">Voltar</a>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
