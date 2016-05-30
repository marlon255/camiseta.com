<?php
	include '../include/header.php';
	include '../include/menu.php';
?>
<?php
	//BUSCANDO OS MATERIAIS A SER LISTADOS
	$sql_exibir_item = "SELECT * FROM material";
	$query_exibir_item = $PDO->prepare($sql_exibir_item);
	$query_exibir_item->execute();
	$rows_exibir_item = $query_exibir_item->fetch(PDO::FETCH_ASSOC);
	//CADASTRANDO A AÇÃO NO BANCO DE DADOS
	if(isset($_POST['btn_exit_estoque'])){
		if(empty($_POST['mat_exit_estoque']) || $_POST['est_exit_estoque'] == null || empty($_POST['quant_exit_estoque']) || empty($_POST['new_exit_estoque']) || $_POST['mat_exit_estoque'] == "Selecione-->>"){
			echo "<script>alert('Preencha os campos corretamente!');</script>";
		}else{
			$material = $_POST['mat_exit_estoque'];
			$estoque = $_POST['est_exit_estoque'];
			$saida = $_POST['quant_exit_estoque'];
			$total = $_POST['new_exit_estoque'];
		//INSERINDO DADOS NO BANCO
		$sql_saida_estoque = "INSERT INTO `estoque_s` (`material`, `quantidade`, `saida`, `total`) VALUES (:material, :estoque, :saida, :total)";
		$query_saida_estoque = $PDO->prepare($sql_saida_estoque);
		$query_saida_estoque->bindValue(":material", $material);
		$query_saida_estoque->bindValue(":estoque", $estoque);
		$query_saida_estoque->bindValue(":saida", $saida);
		$query_saida_estoque->bindValue(":total", $total);
		$query_saida_estoque->execute();
		$update_saida_estoque = $PDO->prepare("UPDATE material SET estoque = '".$total."' WHERE material = '".$material."'");
		$update_saida_estoque->execute();
		echo "<script>alert('Dados cadastrados com sucesso!');</script>";
		}
	}
?>
<h1>Saída em Estoque</h1>
<form method="post" class="cadastro">
	<div class="lcadastro">
		<label>Material</label>
		<select name="mat_exit_estoque" id="mat_exit_estoque" onblur="DadosGet()" required>
			<option selected disabled>Selecione-->></option>
			<?php
			if($rows_exibir_item > 0):
				do{
			?>
			<option><?=$rows_exibir_item['material'];?></option>
			<?php
			}while($rows_exibir_item = $query_exibir_item->fetch(PDO::FETCH_ASSOC));
			endif;
			?>
		</select>
	</div>
	<div class="lcadastro">
		<label>Estoque</label>
		<input name="est_exit_estoque" type="text" class="text" id="estoque" required readonly>
	</div>
	<div class="lcadastro">
		<label>Saída do estoque</label>
		<input name="quant_exit_estoque" type="text" class="text" id="saida_estoque" onblur="exit_estoque()" required>
	</div>
	<div class="lcadastro">
		<label>Novo Estoque</label>
		<input name="new_exit_estoque" type="text" class="text" id="new_estoque" required readonly>
	</div>
	<div>
		<input name="btn_exit_estoque" type="submit" class="button" value="Enviar">
	</div>
</form>
<?php
	include '../include/rodape.php';
?>