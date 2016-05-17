<?php
	include '../include/header.php';
	include '../include/menu.php';
?>
<h1>Cadastro de Funcionário</h1>
<form class="cadastro">
	<div class="lcadastro">
		<label>Nome Completo</label>
		<input type="text" class="text" required>
	</div>
	<div class="lcadastro">
		<label>Função</label>
		<input type="text" class="text" required>
	</div>
	<div class="lcadastro">
		<label>Nível</label>
		<select required>
			<option selected disabled>Selecione-->></option>
			<option value="1">Básico</option>
			<option value="2">Intermediário</option>
			<option value="3">Administrador</option>
		</select>
	</div>
	<div class="lcadastro">
		<label>Telefone</label>
		<input type="text" class="text" required>
	</div>
	<div class="lcadastro">
		<label>Endereço</label>
		<input type="text" class="text" required>
	</div>
	<div class="lcadastro">
		<label>Bairro</label>
		<input type="text" class="text" required>
	</div>
	<div class="lcadastro">
		<label>Data de Nascimento</label>
		<input type="date" class="text" required>
	</div>
	<div class="lcadastro">
		<label>CPF</label>
		<input type="text" class="text" required>
	</div>
	<div class="lcadastro">
		<label>RG</label>
		<input type="text" class="text" required>
	</div>
	<div class="lcadastro">
		<label>Data de Admissão</label>
		<input type="date" class="text" required>
	</div>
	<div class="lcadastro">
		<label>Data de Demissão</label>
		<input type="date" class="text" required>
	</div>
	<div class="lcadastro">
		<label>Sálario</label>
		<input type="text" class="text" required>
	</div>
	<div>
		<input type="submit" class="button" value="Cadastrar">
	</div>
</form>
<input type="submit" class="button" id="pesquisa" value="Localizar">
<div class="modal" id="modal">
	<div class="head_modal">
		<div class="name_modal">Localizar Funcionário</div>
		<div class="exit_modal">X</div>
	</div>
	<div class="overflow">
	<div class="header_modal">
		<div>Nome Completo</div>
		<div>Função</div>
		<div>Nível</div>
		<div>Telefone</div>
		<div>Endereço</div>
		<div>Bairro</div>
		<div>Data de Nasc.</div>
		<div>CPF</div>
		<div>RG</div>
		<div>Data de Admissão</div>
		<div>Data de Demissão</div>
		<div>Sálario</div>
		<div>Ativo</div>
		<div>Ações</div>
	</div>
	<div class="contexto">
	<input class="edit_model">
	<input class="edit_model">
	<input class="edit_model">
	<input class="edit_model">
	<input class="edit_model">
	<input class="edit_model">
	<input class="edit_model">
	<input class="edit_model">
	<input class="edit_model">
	<input class="edit_model">
	<input class="edit_model">
	<input class="edit_model">
	<input class="edit_model">
	<input class="edit_model">
	<input class="edit_model">
	<input class="edit_model">
	<input class="edit_model">
	</div>
	</div>
</div>
<div class="fundo"></div>
<?php
	include '../include/rodape.php';
?>