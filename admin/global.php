

<?php 
// $pdo = new PDO ( "mysql:host=mysql.clubecidade.com.br;dbname=clubecidade", "clubecidade", "labor007" );
$pdo = new PDO ( "mysql:host=localhost;dbname=serverhouse", "root", "root" );

if (!$pdo) {
    echo "Erro de Conexao";
}
?>