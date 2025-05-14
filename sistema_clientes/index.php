<?php
session_start();
require 'conexao.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include('navbar.php'); ?>
    
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <h4>Clientes
                    <a href="cliente-create.php" class="btn btn-primary float-end">Adicionar Novo Cliente</a>
                </h4>
                <table class="table table-bordered mt-4">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Telefone</th>
                            <th>Endereço</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Consultar clientes usando PDO
                        $sql = "SELECT * FROM clientes";
                        $stmt = $conexao->prepare($sql);
                        $stmt->execute();
                        $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        
                        foreach ($clientes as $cliente) {
                            echo "<tr>
                                <td>{$cliente['nome']}</td>
                                <td>{$cliente['email']}</td>
                                <td>{$cliente['telefone']}</td>
                                <td>{$cliente['endereco']}</td>
                                <td>
                                    <a href='cliente-view.php?id={$cliente['id']}' class='btn btn-info'>Visualizar</a>
                                    <a href='cliente-edit.php?id={$cliente['id']}' class='btn btn-warning'>Editar</a>
                                    <form action='acoes.php' method='POST' class='d-inline'>
                                        <input type='hidden' name='delete_cliente' value='{$cliente['id']}'>
                                        <button type='submit' class='btn btn-danger'>Deletar</button>
                                    </form>
                                </td>
                            </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
