<?php
	include '../include/header.php';
	include '../include/menu.php';
?>
<?php
//DETERMINANDO O HORARIO
date_default_timezone_set("America/Sao_Paulo");
	//LOOP PARA BUSCAR ITEM DE SAIDA
	$select_item = $PDO->prepare("SELECT * FROM material WHERE grupo = 'Saida'");
	$select_item->execute();
	$rows_itens = $select_item->fetch(PDO::FETCH_ASSOC);
	//INSERINDO OS DADOS NO BANCO
	if(isset($_POST['btn_exit_caixa'])):
		if (empty($_POST['exit_recibo']) || empty($_POST['exit_date']) || empty($_POST['exit_hora']) || empty($_POST['exit_fornecedor']) || empty($_POST['exit_item'])
		|| empty($_POST['exit_quatidade']) || empty($_POST['exit_unitario']) || empty($_POST['exit_desconto']) || empty($_POST['exit_total']) 
		|| $_POST['exit_total'] == "R$0,00" || $_POST['exit_total'] == "R$0,00"):
			echo "<script>alert('Preencha os campos corretamente!');</script>";
		else:
			$recibo = $_POST['exit_recibo'];
			$data = $_POST['exit_date'];
			$hora = $_POST['exit_hora'];
			$fornecedor = $_POST['exit_fornecedor'];
			$item = $_POST['exit_item'];
			$quantidade = $_POST['exit_quatidade'];
			$unitario = str_replace("R$","",str_replace(",",".",$_POST['exit_unitario']));
			$desconto = str_replace("R$","",str_replace(",",".",$_POST['exit_desconto']));
			$total = str_replace("R$","",str_replace(",",".",$_POST['exit_total']));

			$sql_exit_caixa = "INSERT INTO saida_caixa (recibo, data, hora, cliente, item, quantidade, unitario, desconto, total) 
			VALUES (:recibo, :data, :hora, :fornecedor, :item, :quantidade, :unitario, :desconto, :total)";
			$query_exit_caixa = $PDO->prepare($sql_exit_caixa);
			$query_exit_caixa->bindValue(":recibo",$recibo);
			$query_exit_caixa->bindValue(":data",$data);
			$query_exit_caixa->bindValue(":hora",$hora);
			$query_exit_caixa->bindValue(":fornecedor",$fornecedor);
			$query_exit_caixa->bindValue(":item",$item);
			$query_exit_caixa->bindValue(":quantidade",$quantidade);
			$query_exit_caixa->bindValue(":unitario",$unitario);
			$query_exit_caixa->bindValue(":desconto",$desconto);
			$query_exit_caixa->bindValue(":total",$total);
			$query_exit_caixa->execute();
			echo "<script>alert('Produto comprado!');</script>";
		endif;
	endif;
	$sql_exibir_saida = "SELECT * FROM saida_caixa WHERE data = '".date('Y-m-d')."'";
	$query_exibir_saida = $PDO->prepare($sql_exibir_saida);
	$query_exibir_saida->execute();
	$rows_exibir_saida = $query_exibir_saida->fetch(PDO::FETCH_ASSOC);
?>
<h1>Saída em Caixa</h1>
<form method="post" class="cadastro">
	<div class="lcadastro">
		<label>Recibo</label>
		<input name="exit_recibo" type="text" class="text" required>
	</div>
	<div class="lcadastro">
		<label>Data</label>
		<input name="exit_date" id="date" type="date" class="text" value="" required>
		<input name="exit_hora" type="time" step="1" id="hour">
	</div>
	<div class="lcadastro">
		<label>Fornecedor</label>
		<input name="exit_fornecedor" type="text" class="text" required>
	</div>
	<div class="lcadastro">
		<label>Item a ser Comprado</label>
		<select name="exit_item" required>
			<option selected disabled>Selecione-->></option>
<?php
	if($rows_itens > 0):
		do{
?>
			<option><?=$rows_itens['material'];?></option>
<?php
	}while($rows_itens = $select_item->fetch(PDO::FETCH_ASSOC));
	endif;
?>
		</select>
	</div>
	<div class="lcadastro">
		<label>Quantidade</label>
		<input name="exit_quatidade" type="number" class="text" id="quant" onblur="calcular()" required>
	</div>
	<div class="lcadastro">
		<label>Valor Unitario</label>
		<input name="exit_unitario" type="text" class="money" id="val" value="R$0,00" onblur="calcular()" required>
	</div>
	<div class="lcadastro">
		<label>Desconto</label>
		<input name="exit_desconto" type="text" class="money" id="desc" value="R$0,00" onblur="calcular()" required>
	</div>
	<div class="lcadastro">
		<label>Total</label>
		<input name="exit_total" type="text" class="text" id="tot" value="R$0,00" required readonly>
	</div>
	<div>
		<input name="btn_exit_caixa" type="submit" class="button" value="Comprar">
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
	</div>
<?php
	if($rows_exibir_saida > 0):
		do{
?>
	<div class="titulo">
		<div><?=$rows_exibir_saida['recibo'];?></div>
		<div><?=date('d-m-Y',strtotime($rows_exibir_saida['data']));?></div>
		<div><?=$rows_exibir_saida['hora'];?></div>
		<div><?=$rows_exibir_saida['cliente'];?></div>
		<div><?=$rows_exibir_saida['item'];?></div>
		<div><?=$rows_exibir_saida['quantidade'];?></div>
		<div><?="R$".number_format($rows_exibir_saida['unitario'],2,',','.');?></div>
		<div><?="R$".number_format($rows_exibir_saida['desconto'],2,',','.');?></div>
		<div><?="R$".number_format($rows_exibir_saida['total'],2,',','.');?></div>
	</div>
<?php
	}while ($rows_exibir_saida = $query_exibir_saida->fetch(PDO::FETCH_ASSOC));
	endif;
?>
</div>
<?php
	include '../include/rodape.php';
?>