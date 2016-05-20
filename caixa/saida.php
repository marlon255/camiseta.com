<?php
	include '../include/header.php';
	include '../include/menu.php';
?>
<h1>Saída em Caixa</h1>
<form class="cadastro">
	<div class="lcadastro">
		<label>Recibo</label>
		<input type="text" class="text" required>
	</div>
	<div class="lcadastro">
		<label>Data</label>
		<input id="date" type="date" class="text" value="" required>
		<input type="time" step="1" id="hour">
	</div>
	<div class="lcadastro">
		<label>Fornecedor</label>
		<input type="text" class="text" required>
	</div>
	<div class="lcadastro">
		<label>Item a ser Comprado</label>
		<select required>
			<option selected disabled>Selecione-->></option>
			<option>PHP</option>
		</select>
	</div>
	<div class="lcadastro">
		<label>Quantidade</label>
		<input type="text" class="text" id="quant" required>
	</div>
	<div class="lcadastro">
		<label>Valor Unitario</label>
		<input type="text" class="money" id="val" value="R$0,00" required>
	</div>
	<div class="lcadastro">
		<label>Desconto</label>
		<input type="text" class="money" id="desc" value="R$0,00" onblur="calcular()" required>
	</div>
	<div class="lcadastro">
		<label>Total</label>
		<input type="text" class="text" id="tot" required readonly>
		<input type="hidden" class="text" id="total" required readonly>
	</div>
	<div>
		<input type="submit" class="button" value="Vender">
	</div>
</form>
<div class="exibir">
	<div class="titulo">
		<div>Recibo</div>
		<div>Data</div>
		<div>Hora</div>
		<div>Fornecedor</div>
		<div>Item</div>
		<div>Quantidade</div>
		<div>Valor Unitario</div>
		<div>Desconto</div>
		<div>Total</div>
		<div>Ação</div>
	</div>
	<div class="entrada">
		<input type="text" class="edit_model" disabled>
		<input type="text" class="edit_model" disabled>
		<input type="text" class="edit_model" disabled>
		<input type="text" class="edit_model" disabled>
		<select disabled>
			<option>Selecione-->></option>
			<option>Selecione-->>></option>
		</select>
		<input type="text" class="edit_model" disabled>
		<input type="text" class="edit_model" disabled>
		<input type="text" class="edit_model" disabled>
		<input type="text" class="edit_model" disabled>
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