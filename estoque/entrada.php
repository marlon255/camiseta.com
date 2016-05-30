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
	if(isset($_POST['cad_enter_estoque'])){
		if(empty($_POST['mat_enter_estoque']) || $_POST['est_enter_estoque'] == null || empty($_POST['quant_enter_estoque']) || empty($_POST['new_enter_estoque']) || $_POST['mat_enter_estoque'] == "Selecione-->>"){
			echo "<script>alert('Preencha os campos corretamente!');</script>";
		}else{
			$material = $_POST['mat_enter_estoque'];
			$estoque = $_POST['est_enter_estoque'];
			$entrada = $_POST['quant_enter_estoque'];
			$total = $_POST['new_enter_estoque'];
		//INSERINDO DADOS NO BANCO
		$sql_enter_estoque = "INSERT INTO `estoque_e` (`material`, `quantidade`, `entrada`, `total`) VALUES (:material, :estoque, :entrada, :total)";
		$query_enter_estoque = $PDO->prepare($sql_enter_estoque);
		$query_enter_estoque->bindValue(":material", $material);
		$query_enter_estoque->bindValue(":estoque", $estoque);
		$query_enter_estoque->bindValue(":entrada", $entrada);
		$query_enter_estoque->bindValue(":total", $total);
		$query_enter_estoque->execute();
		$update_saida_estoque = $PDO->prepare("UPDATE material SET estoque = '".$total."' WHERE material = '".$material."'");
		$update_saida_estoque->execute();
		echo "<script>alert('Dados cadastrados com sucesso!');</script>";
		}
	}
?>
<h1>Entrada em Estoque</h1>
<form method="post" class="cadastro">
	<div class="lcadastro">
		<label>Material</label>
		<select name="mat_enter_estoque" id="mat_enter_estoque" onblur="getDados()" required>
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
		<input name="est_enter_estoque" type="text" class="text" id="estoque" required readonly>
	</div>
	<div class="lcadastro">
		<label>Entrada do estoque</label>
		<input name="quant_enter_estoque" type="text" class="text" id="entrada_estoque" onblur="enter_estoque()" required>
	</div>
	<div class="lcadastro">
		<label>Novo Estoque</label>
		<input name="new_enter_estoque" type="text" class="text" id="novo_estoque" required readonly>
	</div>
	<div>
		<input name="cad_enter_estoque" type="submit" class="button" value="Enviar">
	</div>
</form>
<?php
	include '../include/rodape.php';
?>