<?php
	define( 'host', 'localhost' );
	define( 'user', 'root' );
	define( 'senha', 'root' );
	define( 'dbname', 'u288612332_php' );

try{
    $PDO = new PDO( 'mysql:host=' . host . ';dbname=' . dbname, user, senha );
}catch ( PDOException $e ){
    echo 'Erro ao conectar com o MySQL: ' . $e->getMessage();
}
?>