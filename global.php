<?php 

	$con = new PDO ( "mysql:host=localhost;dbname=serverhouse", "root", "root" );

    if (!$con) {
        echo "Erro de Conexao";
    }

?>
