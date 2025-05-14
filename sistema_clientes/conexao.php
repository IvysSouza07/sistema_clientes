<?php
define('HOST', '127.0.0.1');
define('USUARIO', 'root');
define('SENHA', ''); 
define('DB', 'sistema_clientes');

try {
    // Conexão com PDO
    $conexao = new PDO("mysql:host=" . HOST . ";dbname=" . DB, USUARIO, SENHA);
    // Configura o PDO para gerar exceções em caso de erro
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro de conexão: " . $e->getMessage());
}
?>
