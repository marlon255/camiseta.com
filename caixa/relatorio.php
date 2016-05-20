<?php
	include '../include/header.php';
	include '../include/menu.php';
?>
<h1>Relatório de Caixa</h1>
<div>
<input id="bt_enter" type="submit" class="button" value="Entrada">
<input id="bt_exit" type="submit" class="button" value="Saída">
</div>
<div>
<input id="bt_all" type="submit" class="button" value="Todos">
</div>
<div class="hideshow">
<div class="relat" id="entrada">
	<div class="entrada_exibir">
		<div>Recibo</div>
		<div>Data</div>
		<div>Hora</div>
		<div>Fornecedor</div>
		<div>Item</div>
		<div>Quantidade</div>
		<div>Valor Unitario</div>
		<div>Desconto</div>
		<div>Total</div>
		<div>Usuário</div>
	</div>
	<div class="edit_enter">
		<input type="text" class="edit_model" disabled>
		<input type="text" class="edit_model" disabled>
		<input type="text" class="edit_model" disabled>
		<input type="text" class="edit_model" disabled>
		<input type="text" class="edit_model" disabled>
		<input type="text" class="edit_model" disabled>
		<input type="text" class="edit_model" disabled>
		<input type="text" class="edit_model" disabled>
		<input type="text" class="edit_model" disabled>
		<input type="text" class="edit_model" disabled>
	</div>
</div>
<div class="relat" id="saida">
	<div class="entrada_exibir">
		<div>Recibo</div>
		<div>Data</div>
		<div>Hora</div>
		<div>Fornecedor</div>
		<div>Item</div>
		<div>Quantidade</div>
		<div>Valor Unitario</div>
		<div>Desconto</div>
		<div>Total</div>
		<div>Usuário</div>
	</div>
	<div class="edit_enter">
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
		<input type="text" class="edit_model" disabled>
	</div>
</div>
<div class="relat" id="todos">
	<div class="entrada_exibir">
		<div>Recibo</div>
		<div>Data</div>
		<div>Hora</div>
		<div>Fornecedor</div>
		<div>Item</div>
		<div>Quantidade</div>
		<div>Valor Unitario</div>
		<div>Desconto</div>
		<div>Total</div>
		<div>Usuário</div>
	</div>
	<div class="edit_enter">
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
		<input type="text" class="edit_model" disabled>
	</div>
</div>
</div>
<?php
	include '../include/rodape.php';
?>