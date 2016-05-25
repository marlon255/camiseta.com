<?php
	include '../include/header.php';
	include '../include/menu.php';

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

			$sql_funcionario = "INSERT INTO funcionario (nome, funcao, nivel, telefone, endereco, bairro, nascimento, cpf, rg, admissao, demissao, salario, status)
				VALUES (:func, :funcao, :nivel, :tel, :endereco, :bairro, :nascimento, :cpf, :rg, :admissao, :demissao, :salario, 'sim')";
			$query_funcionario = $PDO->prepare($sql_funcionario);
			$query_funcionario->bindValue(':func', $func);
			$query_funcionario->bindValue(':funcao', $funcao);
			$query_funcionario->bindValue(':nivel', $nivel);
			$query_funcionario->bindValue(':tel', $tel);
			$query_funcionario->bindValue(':endereco', $endereco);
			$query_funcionario->bindValue(':bairro', $bairro);
			$query_funcionario->bindValue(':nascimento', $nascimento);
			$query_funcionario->bindValue(':cpf', $cpf);
			$query_funcionario->bindValue(':rg', $rg);
			$query_funcionario->bindValue(':admissao', $admissao);
			$query_funcionario->bindValue(':demissao', $demissao);
			$query_funcionario->bindValue(':salario', $salario);
			$valida_func = $PDO->prepare("SELECT * FROM funcionario WHERE cpf = ?");
			$valida_func->execute(array($cpf));
			if($valida_func->rowCount() == 0){
				$query_funcionario->execute();
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
		<input name="sal_func" type="text" class="money" value="R$0,00" required>
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
	if($rows_func > 0){
	do{
		include 'func_funcionario.php';
?>
	<form class="contexto" method="post">
	<input type="hidden" name="funcionario_id" value="<?=$rows_func['id'];?>">
	<input id="nome_new<?=$rows_func['id'];?>" name="nome_new<?=$rows_func['id'];?>" type="text" class="edit_model" value="<?=$rows_func['nome'];?>" disabled>
	<input id="funcao_new<?=$rows_func['id'];?>" name="funcao_new<?=$rows_func['id'];?>" type="text" class="edit_model" value="<?=$rows_func['funcao'];?>" disabled>
	<select id="nivel_new<?=$rows_func['id'];?>" name="nivel_new<?=$rows_func['id'];?>" disabled>
		<option value="<?=$rows_func['nivel'];?>"><?php
			switch ($rows_func['nivel']) {
				case "1":
					echo "Básico";
					break;
				case "2":
					echo "Intermediário";
					break;
				case "3":
					echo "Administrador";
					break;
				default:
					echo "Algum Erro!";
					break;
			}
		?></option>
		<option value="1">Básico</option>
		<option value="2">Intermediário</option>
		<option value="3">Administrador</option>
	</select>
	<input id="tel_new<?=$rows_func['id'];?>" name="tel_new<?=$rows_func['id'];?>" type="text" class="edit_model" value="<?=$rows_func['telefone'];?>" disabled>
	<input id="endereco_new<?=$rows_func['id'];?>" name="endereco_new<?=$rows_func['id'];?>" type="text" class="edit_model" value="<?=$rows_func['endereco'];?>" disabled>
	<input id="bairro_new<?=$rows_func['id'];?>" name="bairro_new<?=$rows_func['id'];?>" type="text" class="edit_model" value="<?=$rows_func['bairro'];?>" disabled>
	<input id="nasc_new<?=$rows_func['id'];?>" name="nasc_new<?=$rows_func['id'];?>" type="date" class="edit_model" value="<?=$rows_func['nascimento'];?>" disabled>
	<input id="cpf_new<?=$rows_func['id'];?>" name="cpf_new<?=$rows_func['id'];?>" type="text" class="edit_model" value="<?=$rows_func['cpf'];?>" disabled>
	<input id="rg_new<?=$rows_func['id'];?>" name="rg_new<?=$rows_func['id'];?>" type="text" class="edit_model" value="<?=$rows_func['rg'];?>" disabled>
	<input id="admissao_new<?=$rows_func['id'];?>" name="admissao_new<?=$rows_func['id'];?>" type="date" class="edit_model" value="<?=$rows_func['admissao'];?>" disabled>
	<input id="demissao_new<?=$rows_func['id'];?>" name="demissao_new<?=$rows_func['id'];?>" type="date" class="edit_model" value="<?=$rows_func['demissao'];?>" disabled>
	<input id="salario_new<?=$rows_func['id'];?>" name="salario_new<?=$rows_func['id'];?>" type="text" class="edit_model" value="<?=str_replace(".",",","R$".$rows_func['salario']);?>" disabled>
	<div>
	<span>Sim</span><input type="radio" name="ativo<?=$rows_func['id'];?>" id="sim<?=$rows_func['id'];?>" class="bt_modal" value="sim" <?php echo ($rows_func['status'] == 'sim') ? 'checked' : ''; ?> disabled>
	<span>Não</span><input type="radio" name="ativo<?=$rows_func['id'];?>" id="nao<?=$rows_func['id'];?>" class="bt_modal" value="nao" <?php echo ($rows_func['status'] == 'nao') ? 'checked' : ''; ?> disabled>
	</div>
	<div>
	<input id="editar<?=$rows_func['id'];?>" name="editar<?=$rows_func['id'];?>" type="button" class="editar" title="Editar" value="">
	<input id="salvar<?=$rows_func['id'];?>" name="salvar<?=$rows_func['id'];?>" type="submit" class="salvar" title="Salvar" value="">
	</div>
	</form>
<?php
	}while($rows_func = $func_exibir->fetch(PDO::FETCH_ASSOC));
}else{
	echo "Nenhum funcionário cadastrado!";
}
?>
	</div>
</div>
<div class="fundo"></div>
<?php
	include '../include/rodape.php';
?>