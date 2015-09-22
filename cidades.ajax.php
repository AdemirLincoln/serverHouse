<?php
header('Cache-Control: no-cache');
function arrayUtf8Enconde($array) {

//instancia um novo array
	$novo = array();

//entar em um loop para verificar e converter cada indice do array
	foreach ($array as $i => $value) {

//verifica se o indice é um array
		if (is_array($value)) {

//aqui chama novamente o próprio método para verificar novamente(recursividade)
			$value = arrayUtf8Enconde($value);

		} elseif (!mb_check_encoding($value, 'UTF-8')) {
//se não for array, verifica se o valor está codificado como UTF-8
			//aqui ele codifica
			$value = utf8_encode($value);
		}

//recoloca o valor no array
		$novo[$i] = $value;
	}

//retorna o array
	return $novo;
}

$con = new PDO("mysql:host=localhost;dbname=serverhouse", "root", "root");

if (!$con) {
    echo "Erro de Conexao";
}

$cod_estados = $_REQUEST['cod_estados'];

$cidades = array();

$sql = "SELECT cod_cidades, nome
			FROM cidades
			WHERE estados_cod_estados=$cod_estados
			ORDER BY nome";
$stmt = $con->prepare($sql);
$stmt->execute();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    
    // print_r($row);
    
    $cidades[] = array('cod_cidades' => $row['cod_cidades'], 'nome' => $row['nome']);
}

$cidades = arrayUtf8Enconde($cidades);



echo json_encode($cidades);

