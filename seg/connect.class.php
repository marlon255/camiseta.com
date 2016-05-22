<?php
	define( 'host', 'localhost' );
	define( 'user', 'root' );
	define( 'senha', 'root' );
	define( 'dbname', 'camiseta.com' );

try{
    $PDO = new PDO( 'mysql:host=' . host . ';dbname=' . dbname, user, senha );
}catch ( PDOException $e ){
    echo 'Erro ao conectar com o MySQL: ' . $e->getMessage();
}
?>