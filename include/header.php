<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
// CHAMANDO URL DE CSS APARTIR DA BASE
	define('URL', 'http://'.$_SERVER['SERVER_NAME'].'/camiseta.com/');
?>
<html xmlns="http://www.w3.org/1999/xhtml" id="tela">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Sistema para controle de estoque</title>
<link rel="shortcut icon" href="<?=URL;?>/img/icone.ico" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="<?=URL;?>/css/estilo.css">
<script type="text/javascript" src="<?=URL;?>/js/jquery.min.js"></script>
<script type="text/javascript" src="<?=URL;?>/js/jquery.maskMoney.js"></script>
<script type="text/javascript" src="<?=URL;?>/js/funcoes.js"></script>
</head>
<?php
// QUEBRAMOS O ARQUIVO PELA \\
$diretorio = explode("\\", dirname(__FILE__));
// PEGAMOS AS PARTES QUE INTERESSA PARA MONTAR A BASE
$base = $diretorio[0]."\\".$diretorio[1]."\\".$diretorio[2]."\\".$diretorio[3]."\\";

include ($base."seg\connect.class.php");
?>
<body>
	<div class="topo">
		<div class="logo">
		</div>
		<div class="name">
			<h2>Camiseta.com</h2>
			<h3>Feita para você!</h3>
		</div>
		<div class="usuario">
			<h2>Usuario online.</h2>
		</div>
		<div class="img_user">
		</div>
	</div>