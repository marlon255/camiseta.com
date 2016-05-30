<?php
	if(isset($_GET['saida_estoque'])){
		$saida_estoque = $_GET['saida_estoque'];
		include '../seg/connect.class.php';
		if(empty($saida_estoque) || $saida_estoque == null || $saida_estoque == "Selecione-->>"){
			$sql = "SELECT * FROM material";
		}else{
			$sql = "SELECT * FROM material WHERE material = '".$saida_estoque."'";
			$query = $PDO->prepare($sql);
			$query->execute();
			$rows = $query->fetch(PDO::FETCH_ASSOC);
			echo $rows['estoque'];
		}
	}
?>