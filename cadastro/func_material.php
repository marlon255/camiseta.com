<script type="text/javascript">
$(document).ready(function(){
	//BOTAO EDITAR DOS MATERIAIS
	$('#editar<?=$rows_material['id'];?>').click(function(){
		$('#material_new<?=$rows_material['id'];?>').each(function() {
		if($(this).attr('disabled')){
			$(this).removeAttr('disabled');
		}else{
			$(this).attr({'disabled':'disabled'});
		}});

		$('#tipo_new<?=$rows_material['id'];?>').each(function() {
		if($(this).attr('disabled')){
			$(this).removeAttr('disabled');
		}else{
			$(this).attr({'disabled':'disabled'});
		}});

		$('#grupo_new<?=$rows_material['id'];?>').each(function() {
		if($(this).attr('disabled')){
			$(this).removeAttr('disabled');
		}else{
			$(this).attr({'disabled':'disabled'});
		}});

		$('#custo_new<?=$rows_material['id'];?>').each(function() {
		if($(this).attr('disabled')){
			$(this).removeAttr('disabled');
		}else{
			$(this).attr({'disabled':'disabled'});
		}});
	});
});
</script>
<?php
	if(isset($_POST['salvar'.$rows_material['id']])){
		if(empty($_POST['material_new'.$rows_material['id']]) || empty($_POST['tipo_new'.$rows_material['id']]) || empty($_POST['grupo_new'.$rows_material['id']]) || empty($_POST['custo_new'.$rows_material['id']])){
			echo "Edite um campo antes de salvar!";
		}else{
			$mat_new = $_POST['material_new'.$rows_material['id']];
			$tip_new = $_POST['tipo_new'.$rows_material['id']];
			$grupo_new = $_POST['grupo_new'.$rows_material['id']];
			$cust_new = $_POST['custo_new'.$rows_material['id']];

			$new_mat = $PDO->prepare("UPDATE material SET material='$mat_new', tipo='$tip_new', grupo='$grupo_new', custo='$cust_new' WHERE id= ".$_POST['material_id'].";");
			$new_mat->execute();
				echo "<script>alert('Dados atualizados com Sucesso!')</script>";
				echo "<script>location.href='material.php';</script>";
		}
	}
?>
<?php
	if(isset($_POST['excluir'.$rows_material['id']])){
		$del_mat = $PDO->prepare("DELETE FROM material WHERE id = ".$_POST['material_id'].";");
		$del_mat->execute();
		echo "<script>alert('Dados deletados com Sucesso!')</script>";
		echo "<script>location.href='material.php';</script>";
	}
?>