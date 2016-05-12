<?php
	include '../include/header.php';
	include '../include/menu.php';
?>
<link rel="stylesheet" type="text/css" href="material.css">
<h1>Cadastro de Material</h1>
<form class="cadastro">
	<div class="lcadastro">
		<label>Material</label>
		<input type="text" required>
	</div>
	<div class="lcadastro">
		<label>Tipo</label>
		<input type="text" required>
	</div>
	<div class="lcadastro">
		<label>Grupo</label>
		<select required>
			<option selected disabled>Selecione-->></option>
			<option>Direto</option>
			<option>Indireto</option>
		</select>
	</div>
	<div>
		<input type="submit">
	</div>
</form>
<div class="exibir">
	<div class="header">
		<div>Material</div>
		<div>Tipo</div>
		<div>Grupo</div>
		<div>Ações</div>
	</div>
	<div class="material">
		<input type="text" required>
		<input type="text" required>
		<input type="text" required>
	</div>
</div>
<?php
	include '../include/rodape.php';
?>