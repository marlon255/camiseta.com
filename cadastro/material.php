<?php
	include '../include/header.php';
	include '../include/menu.php';
	if(isset($_POST['btn_mat'])){
		if(empty($_POST['material']) || empty($_POST['tipo']) || empty($_POST['grupo']) || empty($_POST['custo'])){
			echo "<script>alert('Preencha os campos corretamente!');</script>";
		}else{
		$mat = $_POST['material'];
		$tipo = $_POST['tipo'];
		$grupo = $_POST['grupo'];
		$custo = $_POST['custo'];
	$sql_material = "INSERT INTO material(material, tipo, grupo, custo) VALUES (:mat, :tipo, :grupo, :custo)";
	$query_material = $PDO->prepare($sql_material);
	$query_material->bindValue(":mat", $mat);
	$query_material->bindValue(":tipo", $tipo);
	$query_material->bindValue(":grupo", $grupo);
	$query_material->bindValue(":custo", $custo);
	$validar_material = $PDO->prepare("SELECT * FROM material WHERE material = ?");
	$validar_material->execute(array($mat));
	if($validar_material->rowCount() == 0):
	$query_material->execute();
	echo "<script>alert('Cadastro realizado com Sucesso!')</script>";
	else:
		echo "<script>alert('Já possui este material cadastrado!')</script>";
	endif;
	}
}
$exibir_material = $PDO->prepare("SELECT * FROM material");
$exibir_material->execute();
$rows_material = $exibir_material->fetch(PDO::FETCH_ASSOC);
?>
<h1>Cadastro de Material</h1>
<form class="cadastro" method="post">
	<div class="lcadastro">
		<label>Material</label>
		<input name="material" type="text" class="text" required>
	</div>
	<div class="lcadastro">
		<label>Tipo</label>
		<input name="tipo" type="text" class="text" required>
	</div>
	<div class="lcadastro">
		<label>Grupo</label>
		<select name="grupo" required>
			<option selected disabled>Selecione-->></option>
			<option>Entrada</option>
			<option>Saida</option>
		</select>
	</div>
	<div class="lcadastro">
		<label>Custo</label>
		<select name="custo" required>
			<option selected disabled>Selecione-->></option>
			<option>Direto</option>
			<option>Indireto</option>
		</select>
	</div>
	<div>
		<input name="btn_mat" type="submit" class="button" value="Cadastrar">
	</div>
</form>
<div class="exibir">
	<div class="header">
		<div>Material</div>
		<div>Tipo</div>
		<div>Grupo</div>
		<div>Custo</div>
		<div>Ações</div>
	</div>
<?php
	do{
		include 'func_material.php';
?>
	<div class="material">
	<form method="post">
		<input type="hidden" name="material_id" value="<?=$rows_material['id'];?>">
		<input id="material_new<?=$rows_material['id'];?>" name="material_new<?=$rows_material['id'];?>" type="text" class="edit" value="<?=$rows_material['material'];?>" disabled>
		<input id="tipo_new<?=$rows_material['id'];?>" name="tipo_new<?=$rows_material['id'];?>" type="text" class="edit" value="<?=$rows_material['tipo'];?>" disabled>
		<select id="grupo_new<?=$rows_material['id'];?>" name="grupo_new<?=$rows_material['id'];?>" disabled>
			<option selected><?=$rows_material['grupo'];?></option>
			<option>Entrada</option>
			<option>Saida</option>
		</select>
		<select id="custo_new<?=$rows_material['id'];?>" name="custo_new<?=$rows_material['id'];?>" disabled>
			<option selected><?=$rows_material['custo'];?></option>
			<option>Direto</option>
			<option>Indireto</option>
		</select>
		<div>
		<input id="editar<?=$rows_material['id'];?>" name="editar<?=$rows_material['id'];?>" type="button" id="editar" class="editar" value="" title="Editar" required>
		<input id="salvar<?=$rows_material['id'];?>" name="salvar<?=$rows_material['id'];?>" type="submit" id="salvar" class="salvar" value="" title="Salvar" required>
		<input id="excluir<?=$rows_material['id'];?>" name="excluir<?=$rows_material['id'];?>" type="submit" id="excluir" class="excluir" value="" title="Deletar" required>
	</form>
		</div>
	</div>
<?php
	}while ($rows_material = $exibir_material->fetch(PDO::FETCH_ASSOC));
?>
</div>
<?php
	include '../include/rodape.php';
?>