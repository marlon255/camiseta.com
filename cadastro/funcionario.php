<?php
	include '../include/header.php';
	include '../include/menu.php';
?>
<?php
	//Inserindo o Funcionario no banco de dados

	if(isset($_POST['btn_func'])){
		if(empty($_POST['name_func']) || empty($_POST['func_func']) || empty($_POST['nivel_func']) || empty($_POST['tel_func']) || empty($_POST['end_func']) || empty($_POST['bairro_func']) ||
			empty($_POST['nasc_func']) || empty($_POST['cpf_func']) || empty($_POST['rg_func']) || empty($_POST['admissao_func']) || empty($_POST['sal_func'])){
			echo "<script>alert('Preencha os campos corretamente!');</script>";
		}else{
			$func = $_POST['name_func'];
			$funcao = $_POST['func_func'];
			$nivel = $_POST['nivel_func'];
			$tel = $_POST['tel_func'];
			$endereco = $_POST['end_func'];
			$bairro = $_POST['bairro_func'];
			$nascimento = $_POST['nasc_func'];
			$cpf = $_POST['cpf_func'];
			$rg = $_POST['rg_func'];
			$admissao = $_POST['admissao_func'];
			$demissao = $_POST['demissao_func'];
			$salario = str_replace("R$","",str_replace(",",".",$_POST['sal_func']));
			if($demissao == 0 || $demissao == NULL){
				$demissao = "00/00/0000";
			}

			$cad_func = $PDO->prepare("INSERT INTO funcionario (nome, funcao, nivel, telefone, endereco, bairro, nascimento, cpf, rg, admissao, demissao, salario, status)
				VALUES (:func, :funcao, :nivel, :tel, :endereco, :bairro, :nascimento, :cpf, :rg, :admissao, :demissao, :salario, 'sim')");
			$cad_func->bindValue(':func', $func);
			$cad_func->bindValue(':funcao', $funcao);
			$cad_func->bindValue(':nivel', $nivel);
			$cad_func->bindValue(':tel', $tel);
			$cad_func->bindValue(':endereco', $endereco);
			$cad_func->bindValue(':bairro', $bairro);
			$cad_func->bindValue(':nascimento', $nascimento);
			$cad_func->bindValue(':cpf', $cpf);
			$cad_func->bindValue(':rg', $rg);
			$cad_func->bindValue(':admissao', $admissao);
			$cad_func->bindValue(':demissao', $demissao);
			$cad_func->bindValue(':salario', $salario);
			$valida_func = $PDO->prepare("SELECT * FROM funcionario WHERE cpf = ?");
			$valida_func->execute(array($cpf));
			if($valida_func->rowCount() == 0){
				$cad_func->execute();
				echo "<script>alert('Cadastro realizado com Sucesso!')</script>";
			}else{
				echo "<script>alert('Este funcionário já esta cadastrado!');</script>";
			}
		}
	}
	$func_exibir = $PDO->prepare("SELECT * FROM funcionario");
	$func_exibir->execute();
	$rows_func = $func_exibir->fetch(PDO::FETCH_ASSOC);
?>
<h1>Cadastro de Funcionário</h1>
<form class="cadastro" method="post">
	<div class="lcadastro">
		<label>Nome Completo</label>
		<input name="name_func" type="text" class="text" required>
	</div>
	<div class="lcadastro">
		<label>Função</label>
		<input name="func_func" type="text" class="text" required>
	</div>
	<div class="lcadastro">
		<label>Nível</label>
		<select name="nivel_func" required>
			<option selected disabled>Selecione-->></option>
			<option value="1">Básico</option>
			<option value="2">Intermediário</option>
			<option value="3">Administrador</option>
		</select>
	</div>
	<div class="lcadastro">
		<label>Telefone</label>
		<input name="tel_func" type="text" class="text" required>
	</div>
	<div class="lcadastro">
		<label>Endereço</label>
		<input name="end_func" type="text" class="text" required>
	</div>
	<div class="lcadastro">
		<label>Bairro</label>
		<input name="bairro_func" type="text" class="text" required>
	</div>
	<div class="lcadastro">
		<label>Data de Nascimento</label>
		<input name="nasc_func" type="date" class="text" required>
	</div>
	<div class="lcadastro">
		<label>CPF</label>
		<input name="cpf_func" type="text" class="text" required>
	</div>
	<div class="lcadastro">
		<label>RG</label>
		<input name="rg_func" type="text" class="text" required>
	</div>
	<div class="lcadastro">
		<label>Data de Admissão</label>
		<input name="admissao_func" type="date" class="text" required>
	</div>
	<div class="lcadastro">
		<label>Data de Demissão</label>
		<input name="demissao_func" type="date" class="text">
	</div>
	<div class="lcadastro">
		<label>Sálario</label>
		<input name="sal_func" type="text" class="money" value="" required>
	</div>
	<div>
		<input name="btn_func" type="submit" class="button" value="Cadastrar">
	</div>
</form>
<input type="submit" class="button" id="pesquisa" value="Localizar">
<div class="modal" id="modal">
	<div class="head_modal">
		<div class="name_modal">Localizar Funcionário</div>
		<div class="exit_modal">X</div>
	</div>
	<div class="overflow">
	<div class="header_modal">
		<div>Nome Completo</div>
		<div>Função</div>
		<div>Nível</div>
		<div>Telefone</div>
		<div>Endereço</div>
		<div>Bairro</div>
		<div>Data de Nasc.</div>
		<div>CPF</div>
		<div>RG</div>
		<div>Data de Admissão</div>
		<div>Data de Demissão</div>
		<div>Sálario</div>
		<div>Ativo</div>
		<div>Ações</div>
	</div>
<?php
	do{
?>
	<form class="contexto" method="post">
	<input type="text" class="edit_model" value="<?=$rows_func['nome'];?>" disabled>
	<input type="text" class="edit_model" value="<?=$rows_func['funcao'];?>" disabled>
	<select disabled>
		<option value="<?=$rows_func['nivel'];?>"><?php 
			switch ($rows_func) {
				case $rows_func == '1':
					echo "Básico";
					break;
				case $rows_func == '2':
					echo "Intermediário";
					break;
				case $rows_func == '3':
					echo "Administrador";
					break;
			}
		?></option>
		<option value="1">Básico</option>
		<option value="2">Intermediário</option>
		<option value="3">Administrador</option>
	</select>
	<input type="text" class="edit_model" value="<?=$rows_func[''];?>" disabled>
	<input type="text" class="edit_model" value="<?=$rows_func[''];?>" disabled>
	<input type="text" class="edit_model" value="<?=$rows_func[''];?>" disabled>
	<input type="text" class="edit_model" value="<?=$rows_func[''];?>" disabled>
	<input type="text" class="edit_model" value="<?=$rows_func[''];?>" disabled>
	<input type="text" class="edit_model" value="<?=$rows_func[''];?>" disabled>
	<input type="text" class="edit_model" value="<?=$rows_func[''];?>" disabled>
	<input type="text" class="edit_model" value="<?=$rows_func[''];?>" disabled>
	<input type="text" class="edit_model" value="<?=$rows_func[''];?>" disabled>
	<div>
	<span>Sim</span><input type="radio" name="ativo" id="sim" class="bt_modal" value="sim" disabled>
	<span>Não</span><input type="radio" name="ativo" id="nao" class="bt_modal" value="nao" disabled>
	</div>
	<div>
	<input type="submit" class="bt_edit" value="">
	<input type="submit" class="bt_edit" value="">
	<input type="submit" class="bt_edit" value="">
	</div>
	</form>
<?php
	}while($rows_func = $func_exibir->fetch(PDO::FETCH_ASSOC));
?>
	</div>
</div>
<div class="fundo"></div>
<?php
	include '../include/rodape.php';
?>