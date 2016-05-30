<?php
	if(isset($_GET['entrada_estoque'])){
		$entrada_estoque = $_GET['entrada_estoque'];
		include '../seg/connect.class.php';
		if(empty($entrada_estoque) || $entrada_estoque == null || $entrada_estoque == "Selecione-->>"){
			$sql = "SELECT * FROM material";
		}else{
			$sql = "SELECT * FROM material WHERE material = '".$entrada_estoque."' && grupo = 'Saida'";
			$query = $PDO->prepare($sql);
			$query->execute();
			$rows = $query->fetch(PDO::FETCH_ASSOC);
			echo $rows['estoque'];
		}
	}
?>