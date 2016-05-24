<script type="text/javascript">
	$(document).ready(function(){
		$('#editar<?=$rows_func['id'];?>').click(function(){
			$('#nome_new<?=$rows_func['id'];?>').each(function() {
			if($(this).attr('disabled')){
				$(this).removeAttr('disabled');
			}else{
				$(this).attr({'disabled':'disabled'});
			}});
			$('#funcao_new<?=$rows_func['id'];?>').each(function() {
			if($(this).attr('disabled')){
				$(this).removeAttr('disabled');
			}else{
				$(this).attr({'disabled':'disabled'});
			}});
			$('#nivel_new<?=$rows_func['id'];?>').each(function() {
			if($(this).attr('disabled')){
				$(this).removeAttr('disabled');
			}else{
				$(this).attr({'disabled':'disabled'});
			}});
			$('#tel_new<?=$rows_func['id'];?>').each(function() {
			if($(this).attr('disabled')){
				$(this).removeAttr('disabled');
			}else{
				$(this).attr({'disabled':'disabled'});
			}});
			$('#endereco_new<?=$rows_func['id'];?>').each(function() {
			if($(this).attr('disabled')){
				$(this).removeAttr('disabled');
			}else{
				$(this).attr({'disabled':'disabled'});
			}});
			$('#bairro_new<?=$rows_func['id'];?>').each(function() {
			if($(this).attr('disabled')){
				$(this).removeAttr('disabled');
			}else{
				$(this).attr({'disabled':'disabled'});
			}});
			$('#nasc_new<?=$rows_func['id'];?>').each(function() {
			if($(this).attr('disabled')){
				$(this).removeAttr('disabled');
			}else{
				$(this).attr({'disabled':'disabled'});
			}});
			$('#admissao_new<?=$rows_func['id'];?>').each(function() {
			if($(this).attr('disabled')){
				$(this).removeAttr('disabled');
			}else{
				$(this).attr({'disabled':'disabled'});
			}});
			$('#demissao_new<?=$rows_func['id'];?>').each(function() {
			if($(this).attr('disabled')){
				$(this).removeAttr('disabled');
			}else{
				$(this).attr({'disabled':'disabled'});
			}});
			$('#salario_new<?=$rows_func['id'];?>').each(function() {
			if($(this).attr('disabled')){
				$(this).removeAttr('disabled');
			}else{
				$(this).attr({'disabled':'disabled'});
			}});
			$('#sim<?=$rows_func['id'];?>').each(function() {
			if($(this).attr('disabled')){
				$(this).removeAttr('disabled');
			}else{
				$(this).attr({'disabled':'disabled'});
			}});
			$('#nao<?=$rows_func['id'];?>').each(function() {
			if($(this).attr('disabled')){
				$(this).removeAttr('disabled');
			}else{
				$(this).attr({'disabled':'disabled'});
			}});
		});
		$('#salvar<?=$rows_func['id'];?>').click(function(){
			$('#cpf_new<?=$rows_func['id'];?>').each(function() {
			if($(this).attr('disabled')){
				$(this).removeAttr('disabled');
			}else{
				$(this).attr({'disabled':'disabled'});
			}});
			$('#rg_new<?=$rows_func['id'];?>').each(function() {
			if($(this).attr('disabled')){
				$(this).removeAttr('disabled');
			}else{
				$(this).attr({'disabled':'disabled'});
			}});
		});
	});
</script>
<?php
	if(isset($_POST['salvar'.$rows_func['id']])){
		if(empty($_POST['nome_new'.$rows_func['id']]) || empty($_POST['funcao_new'.$rows_func['id']]) || empty($_POST['nivel_new'.$rows_func['id']]) || empty($_POST['tel_new'.$rows_func['id']])
			|| empty($_POST['endereco_new'.$rows_func['id']]) || empty($_POST['bairro_new'.$rows_func['id']]) || empty($_POST['nasc_new'.$rows_func['id']]) || empty($_POST['cpf_new'.$rows_func['id']])
			|| empty($_POST['rg_new'.$rows_func['id']]) || empty($_POST['admissao_new'.$rows_func['id']]) || empty($_POST['demissao_new'.$rows_func['id']]) || empty($_POST['salario_new'.$rows_func['id']])){
			echo "<script>alert('Edite um campo antes de salvar!');</script>";
		}else{
			$func_novo = $_POST['nome_new'.$rows_func['id']];
			$funcao_novo = $_POST['funcao_new'.$rows_func['id']];
			$nivel_novo = $_POST['nivel_new'.$rows_func['id']];
			$tel_novo = $_POST['tel_new'.$rows_func['id']];
			$endereco_novo = $_POST['endereco_new'.$rows_func['id']];
			$bairro_novo = $_POST['bairro_new'.$rows_func['id']];
			$nascimento_novo = $_POST['nasc_new'.$rows_func['id']];
			$cpf_novo = $_POST['cpf_new'.$rows_func['id']];
			$rg_novo = $_POST['rg_new'.$rows_func['id']];
			$admissao_novo = $_POST['admissao_new'.$rows_func['id']];
			$demissao_novo = $_POST['demissao_new'.$rows_func['id']];
			$salario_novo = str_replace("R$","",str_replace(",",".",$_POST['salario_new'.$rows_func['id']]));
			$status = $_POST['ativo'.$rows_func['id']];

			$new_funcionario = $PDO->prepare("UPDATE funcionario SET `nome`='$func_novo', `funcao`='$funcao_novo', `nivel`='$nivel_novo', `telefone`='$tel_novo', `endereco`='$endereco_novo',
				`bairro`='$bairro_novo', `nascimento`='$nascimento_novo', `cpf`='$cpf_novo', `rg`='$rg_novo', `admissao`='$admissao_novo', `demissao`='$demissao_novo',`salario`='$salario_novo',
				`status`='$status' WHERE id = ".$_POST['funcionario_id'].";");
			$new_funcionario->execute();
				echo "<script>alert('Dados atualizados com Sucesso!')</script>";
				echo "<script>location.href='funcionario.php';</script>";
		}
	}
?>