<?php
	include '../include/header.php';
	include '../include/menu.php';
?>
<?php
	//BUSCANDO OS MATERIAIS A SER LISTADOS
	$sql_exibir_item = "SELECT * FROM material";
	$query_exibir_item = $PDO->prepare($sql_exibir_item);
	$query_exibir_item->execute();
	$rows_exibir_item = $query_exibir_item->fetch(PDO::FETCH_ASSOC);
?>
<h1>Estoque dos Materiais</h1>
<table class="estoque">
<tr>
<td style="border-left: 1px dotted #FFF;">Material</td>
<td>Em Estoque</td>
</tr>
<?php
	if($rows_exibir_item > 0):
		do{
?>
<tr>
<td style="border-left: 1px dotted #FFF;"><?=$rows_exibir_item['material'];?></td>
<td><?=$rows_exibir_item['estoque'];?></td>
</tr>
<?php
	}while($rows_exibir_item = $query_exibir_item->fetch(PDO::FETCH_ASSOC));
	endif;
?>
</table>
<?php
	include '../include/rodape.php';
?>