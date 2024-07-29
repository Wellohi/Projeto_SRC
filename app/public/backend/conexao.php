<?php

//TODO implementar lógica de autenticação a partir de arquivo .env
// require __DIR__ . '/../vendor/autoload.php';
//require_once __DIR__ . '/composer/autoload.php';

$config_ini_array = parse_ini_file("config.ini", true);

$dbusername = $config_ini_array['banco_dados']['dbusername'];
$dbsenha = $config_ini_array['banco_dados']['dbsenha'];


// Definindo as informações do banco de dado
$pdo = null;
$database_name = 'mysql:host=mysql_banco_de_dados;dbname=database_src;charset=utf8';
$username = $dbusername;
$password = $dbsenha;
 


// Definindo as opções de configuração para a conexão PDO
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Trata os erros como exceções
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Retorna os resultados das consultas como arrays associativos
    PDO::ATTR_EMULATE_PREPARES => false, // Desativa a emulação de preparação de consultas preparadas
];

try {
    // Criando uma nova instância da classe PDO com as informações do banco de dados e opções de configuração
    $pdo = new PDO($database_name, $username, $password, $options);
} catch (PDOException $e) {
    // Em caso de erro, relança a exceção PDOException
    echo 'Erro ao conectar ao banco de dados: ' . $e->getMessage();
    throw new PDOException($e->getMessage(), (int)$e->getCode());

}
