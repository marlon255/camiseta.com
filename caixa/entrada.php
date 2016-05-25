<?php
	include '../include/header.php';
	include '../include/menu.php';
?>
<?php
	//BUSCANDO OS ITENS A SER VENDIDO NO BANCO DE DADOS
	$select_item = $PDO->prepare("SELECT * FROM material WHERE grupo = 'Entrada'");
	$select_item->execute();
	$rows_itens = $select_item->fetch(PDO::FETCH_ASSOC);
	//INSERINDO DADOS NO BANCO
	if(isset($_POST['btn_enter_caixa'])):
		if(empty($_POST['enter_recibo']) || empty($_POST['enter_date_caixa']) || empty($_POST['enter_hour']) || empty($_POST['enter_cliente']) || empty($_POST['enter_item']) || 
			empty($_POST['enter_quant']) || empty($_POST['enter_uni']) || empty($_POST['enter_desc']) || empty($_POST['enter_total']) || $_POST['enter_uni'] == "R$0,00" ||
			$_POST['enter_desc'] == "R$0,00" || $_POST['enter_total'] == "R$"):
			echo "<script>alert('Preencha os campos corretamente!');</script>";
		else:
			$entrada_recibo = $_POST['enter_recibo'];
			$entrada_date = $_POST['enter_date_caixa'];
			$entrada_hour = $_POST['enter_hour'];
			$entrada_cliente = $_POST['enter_cliente'];
			$entrada_item = $_POST['enter_item'];
			$entrada_quantidade = $_POST['enter_quant'];
			$entrada_unitario = str_replace("R$","",str_replace(",",".",$_POST['enter_uni']));
			$entrada_desconto = str_replace("R$","",str_replace(",",".",$_POST['enter_desc']));
			$entrada_total = str_replace("R$","",str_replace(",",".",$_POST['enter_total']));

			$sql_enter_caixa = "INSERT INTO entrada_caixa (recibo, data, hora, cliente, item, quantidade, unitario, desconto, total) 
								VALUES (:recibo, :data, :hora, :cliente, :item, :quantidade, :unitario, :desconto, :total)";
			$query_enter_caixa = $PDO->prepare($sql_enter_caixa);
			$query_enter_caixa->bindValue(":recibo", $entrada_recibo);
			$query_enter_caixa->bindValue(":data", $entrada_date);
			$query_enter_caixa->bindValue(":hora", $entrada_hour);
			$query_enter_caixa->bindValue(":cliente", $entrada_cliente);
			$query_enter_caixa->bindValue(":item", $entrada_item);
			$query_enter_caixa->bindValue(":quantidade", $entrada_quantidade);
			$query_enter_caixa->bindValue(":unitario", $entrada_unitario);
			$query_enter_caixa->bindValue(":desconto", $entrada_desconto);
			$query_enter_caixa->bindValue(":total", $entrada_total);
			$query_enter_caixa->execute();
			echo "<script>alert('Cadastro realizado com Sucesso!');</script>";
		endif;
	endif;
?>
<h1>Entrada em Caixa</h1>
<form class="cadastro" method="post">
	<div class="lcadastro">
		<label>Recibo</label>
		<input name="enter_recibo" type="text" class="text" required>
	</div>
	<div class="lcadastro">
		<label>Data</label>
		<input id="date" name="enter_date_caixa" type="date" class="text" value="" required>
		<input name="enter_hour" type="time" step="1" id="hour">
	</div>
	<div class="lcadastro">
		<label>Cliente</label>
		<input name="enter_cliente" type="text" class="text" required>
	</div>
	<div class="lcadastro">
		<label>Item a ser Vendido</label>
		<select name="enter_item" required>
			<option selected disabled>Selecione-->></option>
			<?php do{ ?>
			<option><?=$rows_itens['material'];?></option>
			<?php }while ($rows_itens = $select_item->fetch(PDO::FETCH_ASSOC)); ?>
		</select>
	</div>
	<div class="lcadastro">
		<label>Quantidade</label>
		<input name="enter_quant" type="number" class="text" id="quant" required>
	</div>
	<div class="lcadastro">
		<label>Valor Unitario</label>
		<input name="enter_uni" type="text" class="money" id="val" value="R$0,00" onblur="calcular()" required>
	</div>
	<div class="lcadastro">
		<label>Desconto</label>
		<input name="enter_desc" type="text" class="money" id="desc" value="R$0,00" onblur="calcular()" required>
	</div>
	<div class="lcadastro">
		<label>Total</label>
		<input name="enter_total" type="text" class="money" id="tot" value="R$0,00" required readonly>
	</div>
	<div>
		<input name="btn_enter_caixa" type="submit" class="button" value="Vender">
	</div>
</form>
<div class="exibir">
	<div class="titulo">
		<div>Recibo</div>
		<div>Data</div>
		<div>Hora</div>
		<div>Cliente</div>
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