<?php
	include '../include/header.php';
	include '../include/menu.php';
?>
<script type="text/javascript">
var now = new Date();
var dia = now.getDate();
var mes = now.getMonth()+1;
var ano = now.getFullYear();
var hoje = (dia + "/" + mes + "/" + ano);
</script>
<h1>Entrada em Caixa</h1>
<form class="cadastro">
	<div class="lcadastro">
		<label>Data</label>
		<input id="date" type="date" class="text" value="" required>
	</div>
	<div class="lcadastro">
		<label>Item a ser Vendido</label>
		<select required>
			<option selected disabled>Selecione-->></option>
			<option>PHP</option>
		</select>
	</div>
	<div class="lcadastro">
		<label>Quantidade</label>
		<input type="text" class="text" required>
	</div>
	<div class="lcadastro">
		<label>Valor Unitario</label>
		<input type="text" class="text" required>
	</div>
	<div class="lcadastro">
		<label>Desconto</label>
		<input type="text" class="text" required>
	</div>
	<div class="lcadastro">
		<label>Total</label>
		<input type="text" class="text" required>
	</div>
	<div>
		<input type="submit" class="button" value="Vender">
	</div>
</form>
<?php
	include '../include/rodape.php';
?>