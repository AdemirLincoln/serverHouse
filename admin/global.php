

<?php 

$pdo = new PDO ( "mysql:host=localhost;dbname=serverhouse", "root", "root" );

if (!$pdo) {
    echo "Erro de Conexao";
}
?>