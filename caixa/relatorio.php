<?php
	include '../include/header.php';
	include '../include/menu.php';
?>
<?php
//DETERMINANDO LOCALIZAÇÃO PARA DATA E HORA
date_default_timezone_set("America/Sao_Paulo");
	//Chamando os dados do banco para entrada
	$sql_entrada_banco = "SELECT * FROM entrada_caixa";
	$query_entrada_banco = $PDO->prepare($sql_entrada_banco);
	$query_entrada_banco->execute();
	$rows_entrada_banco = $query_entrada_banco->fetch(PDO::FETCH_ASSOC);
	//Chamando os dados do banco para saida
	$sql_saida_banco = "SELECT * FROM saida_caixa";
	$query_saida_banco = $PDO->prepare($sql_saida_banco);
	$query_saida_banco->execute();
	$rows_saida_banco = $query_saida_banco->fetch(PDO::FETCH_ASSOC);
	//Chamando os dados do banco para entrada e saida
	$sql_todos_banco = "(SELECT * FROM entrada_caixa) UNION (SELECT * FROM saida_caixa) ORDER BY data";
	$query_todos_banco = $PDO->prepare($sql_todos_banco);
	$query_todos_banco->execute();
	$rows_todos_banco = $query_todos_banco->fetch(PDO::FETCH_ASSOC);
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
	<div class="entrada_exibir">
		<div>Recibo</div>
		<div>Data</div>
		<div>Hora</div>
		<div>Cliente/Fornecedor</div>
		<div>Item</div>
		<div>Quantidade</div>
		<div>Valor Unitario</div>
		<div>Desconto</div>
		<div>Total</div>
	</div>
	<!-- DIV PARA VER SOMENTE ENTRADA DE CAIXA -->
	<div class="edit_enter" id="entrada">
<?php
	if($rows_entrada_banco > 0):
		do{
?>
		<div><?=$rows_entrada_banco['recibo'];?></div>
		<div><?=date('d-m-Y',strtotime($rows_entrada_banco['data']));?></div>
		<div><?=$rows_entrada_banco['hora'];?></div>
		<div><?=$rows_entrada_banco['cliente'];?></div>
		<div><?=$rows_entrada_banco['item'];?></div>
		<div><?=$rows_entrada_banco['quantidade'];?></div>
		<div><?="R$".number_format($rows_entrada_banco['unitario'],2,',','.');?></div>
		<div><?="R$".number_format($rows_entrada_banco['desconto'],2,',','.');?></div>
		<div><?="R$".number_format($rows_entrada_banco['total'],2,',','.');?></div>
<?php
	}while($rows_entrada_banco = $query_entrada_banco->fetch(PDO::FETCH_ASSOC));
	endif;
?>
	</div>
	<!-- DIV PARA VER SOMENTE SAIDA DE CAIXA -->
	<div class="edit_enter" id="saida">
<?php
	if($rows_saida_banco > 0):
		do{
?>
		<div><?=$rows_saida_banco['recibo'];?></div>
		<div><?=date('d-m-Y',strtotime($rows_saida_banco['data']));?></div>
		<div><?=$rows_saida_banco['hora'];?></div>
		<div><?=$rows_saida_banco['cliente'];?></div>
		<div><?=$rows_saida_banco['item'];?></div>
		<div><?=$rows_saida_banco['quantidade'];?></div>
		<div><?="R$".number_format($rows_saida_banco['unitario'],2,',','.');?></div>
		<div><?="R$".number_format($rows_saida_banco['desconto'],2,',','.');?></div>
		<div><?="R$".number_format($rows_saida_banco['total'],2,',','.');?></div>
<?php
	}while($rows_saida_banco = $query_saida_banco->fetch(PDO::FETCH_ASSOC));
	endif;
?>
	</div>
	<!-- DIV PARA VER ENTRADA E SAIDA DE CAIXA -->
	<div class="edit_enter" id="todos">
<?php
	if($rows_todos_banco > 0):
		do{
?>
		<div><?=$rows_todos_banco['recibo'];?></div>
		<div><?=date('d-m-Y',strtotime($rows_todos_banco['data']));?></div>
		<div><?=$rows_todos_banco['hora'];?></div>
		<div><?=$rows_todos_banco['cliente'];?></div>
		<div><?=$rows_todos_banco['item'];?></div>
		<div><?=$rows_todos_banco['quantidade'];?></div>
		<div><?="R$".number_format($rows_todos_banco['unitario'],2,',','.');?></div>
		<div><?="R$".number_format($rows_todos_banco['desconto'],2,',','.');?></div>
		<div><?="R$".number_format($rows_todos_banco['total'],2,',','.');?></div>
<?php
	}while($rows_todos_banco = $query_todos_banco->fetch(PDO::FETCH_ASSOC));
	endif;
?>
	</div>
</div>
<?php
	include '../include/rodape.php';
?>