<?php
	include '../include/header.php';
	include '../include/menu.php';
?>
<h1>Cadastro de Material</h1>
<form class="cadastro">
	<div class="lcadastro">
		<label>Material</label>
		<input type="text" class="text" required>
	</div>
	<div class="lcadastro">
		<label>Tipo</label>
		<input type="text" class="text" required>
	</div>
	<div class="lcadastro">
		<label>Grupo</label>
		<select required>
			<option selected disabled>Selecione-->></option>
			<option>Entrada</option>
			<option>Saída</option>
		</select>
	</div>
	<div class="lcadastro">
		<label>Custo</label>
		<select required>
			<option selected disabled>Selecione-->></option>
			<option>Direto</option>
			<option>Indireto</option>
		</select>
	</div>
	<div>
		<input type="submit" class="button" value="Cadastrar">
	</div>
</form>
<div class="exibir">
	<div class="header">
		<div>Material</div>
		<div>Tipo</div>
		<div>Grupo</div>
		<div>Custo</div>
		<div>Ações</div>
	</div>
	<div class="material">
		<input type="text" class="edit" disabled>
		<input type="text" class="edit" disabled>
		<select disabled>
			<option>Selecione-->></option>
			<option>Selecione-->>></option>
		</select>
		<select disabled>
			<option>Selecione-->></option>
			<option>Selecione-->>></option>
		</select>
		<div>
		<input type="submit" id="editar" class="bt_edit" value="" title="Editar" required>
		<input type="submit" id="salvar" class="bt_edit" value="" title="Salvar" required>
		<input type="submit" id="excluir" class="bt_edit" value="" title="Deletar" required>
		</div>
	</div>
</div>
<?php
	include '../include/rodape.php';
?>