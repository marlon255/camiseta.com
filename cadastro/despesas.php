<?php
	include '../include/header.php';
	include '../include/menu.php';

	//SCRIPT PARA CADASTRO EM BANCO DE DADOS
	if(isset($_POST['btn_despesas'])):
		if(empty($_POST['despesa']) || empty($_POST['tipo_despesa']) || empty($_POST['grupo_despesa']) || empty($_POST['custo_despesa'])):
			echo "<script>alert('Preencha os campos corretamente!');</script>";
		else:
			$despesa = $_POST['despesa'];
			$tipo_despesa = $_POST['tipo_despesa'];
			$grupo_despesa = $_POST['grupo_despesa'];
			$custo_despesa = $_POST['custo_despesa'];

			$sql_despesa = "INSERT INTO despesa (despesa, tipo_desp, grupo_desp, custo_desp) VALUES (:despesa, :tipo, :grupo, :custo)";
			$query_despesa = $PDO->prepare($sql_despesa);
			$query_despesa->bindValue(":despesa", $despesa);
			$query_despesa->bindValue(":tipo", $tipo_despesa);
			$query_despesa->bindValue(":grupo", $grupo_despesa);
			$query_despesa->bindValue(":custo", $custo_despesa);
			$validar_despesa = $PDO->prepare("SELECT * FROM despesa WHERE despesa = ?");
			$validar_despesa->execute(array($despesa));
			if($validar_despesa->rowCount() == 0):
				$query_despesa->execute();
				echo "<script>alert('Cadastro realizado com Sucesso!')</script>";
			else:
				echo "<script>alert('Já possui esta despesa cadastrado!')</script>";
			endif;
		endif;
	endif;
	//SCRIPT PARA EXIBIR DADOS DO BANCO.
	$exibir_despesa = $PDO->prepare("SELECT * FROM despesa");
	$exibir_despesa->execute();
	$rows_despesa = $exibir_despesa->fetch(PDO::FETCH_ASSOC);
?>
<h1>Cadastro de Despesas</h1>
<form class="cadastro" method="post">
	<div class="lcadastro">
		<label>Despesa</label>
		<input name="despesa" type="text" class="text" required>
	</div>
	<div class="lcadastro">
		<label>Tipo</label>
		<input name="tipo_despesa" type="text" class="text" required>
	</div>
	<div class="lcadastro">
		<label>Grupo</label>
		<select name="grupo_despesa" required>
			<option selected disabled>Selecione-->></option>
			<option>Entrada</option>
			<option>Saída</option>
		</select>
	</div>
	<div class="lcadastro">
		<label>Custo</label>
		<select name="custo_despesa" required>
			<option selected disabled>Selecione-->></option>
			<option>Direto</option>
			<option>Indireto</option>
		</select>
	</div>
	<div>
		<input name="btn_despesas" type="submit" class="button" value="Cadastrar">
	</div>
</form>
<div class="exibir">
	<div class="header">
		<div>Despesa</div>
		<div>Tipo</div>
		<div>Grupo</div>
		<div>Custo</div>
		<div>Ações</div>
	</div>
<?php
if($rows_despesa > 0){
	do{
		include 'func_despesa.php';
?>
	<form class="despesa" method="post">
		<input name="despesa_id" type="hidden" value="<?=$rows_despesa['id'];?>">
		<input name="despesa_new<?=$rows_despesa['id'];?>" id="despesa_new<?=$rows_despesa['id'];?>" type="text" class="edit" value="<?=$rows_despesa['despesa'];?>" disabled>
		<input name="tipo_new<?=$rows_despesa['id'];?>" id="tipo_new<?=$rows_despesa['id'];?>" type="text" class="edit" value="<?=$rows_despesa['tipo_desp'];?>" disabled>
		<select name="grupo_new<?=$rows_despesa['id'];?>" id="grupo_new<?=$rows_despesa['id'];?>" disabled>
			<option><?=$rows_despesa['grupo_desp'];?></option>
			<option>Entrada</option>
			<option>Saída</option>
		</select>
		<select name="custo_new<?=$rows_despesa['id'];?>" id="custo_new<?=$rows_despesa['id'];?>" disabled>
			<option><?=$rows_despesa['custo_desp'];?></option>
			<option>Direto</option>
			<option>Indireto</option>
		</select>
		<div>
		<input name="editar<?=$rows_despesa['id'];?>" id="editar<?=$rows_despesa['id'];?>" type="button" class="editar" value="" title="Editar" required>
		<input name="salvar<?=$rows_despesa['id'];?>" id="salvar<?=$rows_despesa['id'];?>" class="salvar" type="submit" value="" title="Salvar" required>
		<input name="excluir<?=$rows_despesa['id'];?>" id="excluir<?=$rows_despesa['id'];?>" class="excluir" type="submit" value="" title="Deletar" required>
		</div>
	</form>
<?php
	}while ($rows_despesa = $exibir_despesa->fetch(PDO::FETCH_ASSOC));
}else{
	echo "Nenhuma despesa cadastrada!";
}
?>
</div>
<?php
	include '../include/rodape.php';
?>