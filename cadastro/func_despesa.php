<script type="text/javascript">
$(document).ready(function(){
	//BOTAO EDITAR DOS MATERIAIS
	$('#editar<?=$rows_despesa['id'];?>').click(function(){
		$('#despesa_new<?=$rows_despesa['id'];?>').each(function() {
		if($(this).attr('disabled')){
			$(this).removeAttr('disabled');
		}else{
			$(this).attr({'disabled':'disabled'});
		}});

		$('#tipo_new<?=$rows_despesa['id'];?>').each(function() {
		if($(this).attr('disabled')){
			$(this).removeAttr('disabled');
		}else{
			$(this).attr({'disabled':'disabled'});
		}});

		$('#grupo_new<?=$rows_despesa['id'];?>').each(function() {
		if($(this).attr('disabled')){
			$(this).removeAttr('disabled');
		}else{
			$(this).attr({'disabled':'disabled'});
		}});

		$('#custo_new<?=$rows_despesa['id'];?>').each(function() {
		if($(this).attr('disabled')){
			$(this).removeAttr('disabled');
		}else{
			$(this).attr({'disabled':'disabled'});
		}});
	});
});
</script>
<?php
	if(isset($_POST['salvar'.$rows_despesa['id']])){
		if(empty($_POST['despesa_new'.$rows_despesa['id']]) || empty($_POST['tipo_new'.$rows_despesa['id']]) || empty($_POST['grupo_new'.$rows_despesa['id']]) || empty($_POST['custo_new'.$rows_despesa['id']])){
			echo "<script>alert('Edite um campo antes de salvar!');</script>";
		}else{
			$desp_new = $_POST['despesa_new'.$rows_despesa['id']];
			$tip_new = $_POST['tipo_new'.$rows_despesa['id']];
			$grupo_new = $_POST['grupo_new'.$rows_despesa['id']];
			$cust_new = $_POST['custo_new'.$rows_despesa['id']];

			$new_despesa = $PDO->prepare("UPDATE despesa SET despesa='$desp_new', tipo_desp='$tip_new', grupo_desp='$grupo_new', custo_desp='$cust_new' WHERE id= ".$_POST['despesa_id'].";");
			$new_despesa->execute();
				echo "<script>alert('Dados atualizados com Sucesso!')</script>";
				echo "<script>location.href='despesas.php';</script>";
		}
	}
?>
<?php
	if(isset($_POST['excluir'.$rows_despesa['id']])){
		$del_mat = $PDO->prepare("DELETE FROM despesa WHERE id = ".$_POST['despesa_id'].";");
		$del_mat->execute();
		echo "<script>alert('Dados deletados com Sucesso!')</script>";
		echo "<script>location.href='despesas.php';</script>";
	}
?>