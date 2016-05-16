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
		<label>Salario</label>
		<input type="text" class="text" required>
	</div>
	<div>
		<input type="submit" class="button" value="Cadastrar">
		<input type="submit" class="button" value="Pesquisar" onclick="window.open('funcionario_pesquisa.php', 'Pagina', 'STATUS=NO, TOOLBAR=NO, LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=YES, TOP=10, LEFT=10, WIDTH=770, HEIGHT=400');">
	</div>
</form>
<div>
</div>
<?php
	include '../include/rodape.php';
?>