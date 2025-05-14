<?php
session_start();
require 'conexao.php';

// Criar Cliente
if (isset($_POST['create_cliente'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];
    $data_nascimento = $_POST['data_nascimento'];

    $sql = "INSERT INTO clientes (nome, email, telefone, endereco, data_nascimento) 
            VALUES (:nome, :email, :telefone, :endereco, :data_nascimento)";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':telefone', $telefone);
    $stmt->bindParam(':endereco', $endereco);
    $stmt->bindParam(':data_nascimento', $data_nascimento);
    
    if ($stmt->execute()) {
        $_SESSION['mensagem'] = 'Cliente criado com sucesso';
    } else {
        $_SESSION['mensagem'] = 'Erro ao criar cliente';
    }

    header('Location: index.php');
    exit;
}

// Atualizar Cliente
if (isset($_POST['update_cliente'])) {
    $cliente_id = $_POST['cliente_id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];
    $data_nascimento = $_POST['data_nascimento'];

    $sql = "UPDATE clientes SET nome = :nome, email = :email, telefone = :telefone, 
            endereco = :endereco, data_nascimento = :data_nascimento WHERE id = :id";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':telefone', $telefone);
    $stmt->bindParam(':endereco', $endereco);
    $stmt->bindParam(':data_nascimento', $data_nascimento);
    $stmt->bindParam(':id', $cliente_id, PDO::PARAM_INT);
    
    if ($stmt->execute()) {
        $_SESSION['mensagem'] = 'Cliente atualizado com sucesso';
    } else {
        $_SESSION['mensagem'] = 'Erro ao atualizar cliente';
    }

    header('Location: index.php');
    exit;
}

// Deletar Cliente
if (isset($_POST['delete_cliente'])) {
    $cliente_id = $_POST['delete_cliente'];

    $sql = "DELETE FROM clientes WHERE id = :id";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':id', $cliente_id, PDO::PARAM_INT);
    
    if ($stmt->execute()) {
        $_SESSION['mensagem'] = 'Cliente deletado com sucesso';
    } else {
        $_SESSION['mensagem'] = 'Erro ao deletar cliente';
    }

    header('Location: index.php');
    exit;
}
