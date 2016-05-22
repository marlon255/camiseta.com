<?php
	include '../include/header.php';
	include '../include/menu.php';
?>
<h1>Entrada em Estoque</h1>
<form class="cadastro">
	<div class="lcadastro">
		<label>Material</label>
		<select required>
			<option selected disabled>Selecione-->></option>
			<option>PHP</option>
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
		<input type="submit" class="button" value="Enviar">
	</div>
</form>
<?php
	include '../include/rodape.php';
?>