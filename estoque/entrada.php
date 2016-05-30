<?php
	include '../include/header.php';
	include '../include/menu.php';
?>
<?php
	$sql_exibir_item = "SELECT * FROM material WHERE grupo = 'Saida'";
	$query_exibir_item = $PDO->prepare($sql_exibir_item);
	$query_exibir_item->execute();
	$rows_exibir_item = $query_exibir_item->fetch(PDO::FETCH_ASSOC);
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
		<input type="text" class="text" id="estoque" required readonly>
	</div>
	<div class="lcadastro">
		<label>Entrada do estoque</label>
		<input type="text" class="text" id="entrada_estoque" onblur="enter_estoque()" required>
	</div>
	<div class="lcadastro">
		<label>Novo Estoque</label>
		<input type="text" class="text" id="novo_estoque" required readonly>
	</div>
	<div>
		<input name="cad_enter_estoque" type="submit" class="button" value="Enviar">
	</div>
</form>
<?php
	include '../include/rodape.php';
?>