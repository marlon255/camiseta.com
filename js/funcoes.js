//Função para calculo automatico
  function calcular(){
  var quant = document.getElementById('quant').value;
  var val = document.getElementById('val').value;
  var valor = val.replace("R$","").replace(",",".");
  var desc = document.getElementById('desc').value;
  var desconto = desc.replace("R$","").replace(",",".");
  var mult = quant * valor;
  if(desconto > 0){
    var tot = (mult - desconto);
  }else{
    var tot = (quant * valor);
  }
  var sub = document.getElementById('tot').value = "R$"+tot.toFixed(2);
  var total = sub.replace(".",",");
  document.getElementById('tot').value = total;
  }

  function enter_estoque(){
  var estoque = document.getElementById('estoque').value;
  var entrada_estoque = document.getElementById('entrada_estoque').value;
  if(estoque == null || estoque == "" || entrada_estoque == null || entrada_estoque == ""){
  "";
}else{
  var soma_estoque = parseInt(estoque) + parseInt(entrada_estoque);
  document.getElementById('novo_estoque').value = soma_estoque;
  }
  }

  function exit_estoque(){
  var estoque = document.getElementById('estoque').value;
  var saida_estoque = document.getElementById('saida_estoque').value;
  if(estoque == null || estoque == "" || saida_estoque == null || saida_estoque == ""){
  "";
}else{
  var subtracao_estoque = parseInt(estoque) - parseInt(saida_estoque);
  document.getElementById('new_estoque').value = subtracao_estoque;
  }
  }
//Usando o tamanho da tela para determinar o tamanho do HTML
  var screenHeight = screen.height;
  document.getElementById('tela').style.height = screenHeight-198+'px';
//Mostrando a data e hora atual para compra e venda de material
var now = new Date();
var day = now.getDate();
var month = now.getMonth() + 1;
var year = now.getFullYear();
if (month < 10) month = "0" + month;
if (day < 10) day = "0" + day;
var today = year + "-" + month + "-" + day;

  function checkTime(i) {
      return (i < 10) ? "0" + i : i;
  }

  function startTime() {
  var hoje = new Date();
          h = checkTime(hoje.getHours()),
          m = checkTime(hoje.getMinutes()),
          s = checkTime(hoje.getSeconds());
    hour = h + ":" + m + ":" + s;
      t = setTimeout(function () {
          startTime()
      }, 500);
  }
  startTime();
//Configuração do modal
  $(document).ready(function(){
  $(".exit_modal").click(function(){
		$(".modal").hide(500);
		$(".fundo").hide();
	});
	$(".fundo").click(function(){
  		$(".modal").hide(500);
		$(".fundo").hide();
  });
  $("#pesquisa").click(function(){
  		$(".modal").show(500);
		$(".fundo").show();
  });
  $("#bt_enter").click(function(){
	  $("#saida").hide(500);
	  $("#todos").hide(500);
	  $("#entrada").show(500);
  });
  $("#bt_exit").click(function(){
	  $("#entrada").hide(500);
	  $("#todos").hide(500);
	  $("#saida").show(500);
  });
  $("#bt_all").focus();
  $("#bt_all").click(function(){
	  $("#entrada").hide(500);
	  $("#saida").hide(500);
	  $("#todos").show(500);
  });
//Colocando hora nos input e atualizando ao clickar para mandar as informações para o banco de dados
  $("#date").val(today);
  $("#hour").hide();
  $("#hour").val(hour);
  $(".button").click(function(){
  $("#hour").val(hour);
  });
	//MASCARA MOEDA
	$(".money").maskMoney({showSymbol:true, symbol:"R$", decimal:",", thousands:"."});
});

//AJAX Entrada de estoque

function CriaRequest() {
try{request = new XMLHttpRequest();}catch (IEAtual){try{request = new ActiveXObject("Msxml2.XMLHTTP");}catch(IEAntigo){
try{request = new ActiveXObject("Microsoft.XMLHTTP");}catch(falha){request = false;}}}
if (!request)
   alert("Seu Navegador não suporta Ajax!");
else
   return request;
 }
function getDados() {
var nome   = document.getElementById("mat_enter_estoque").value;
var result = document.getElementById("estoque");
var xmlreq = CriaRequest();
xmlreq.open("GET", "entrada_estoque.php?entrada_estoque=" + nome, true);
xmlreq.onreadystatechange = function(){
if (xmlreq.readyState == 4) {
if (xmlreq.status == 200){result.value = xmlreq.responseText;}
else{result.value = "Erro: " + xmlreq.statusText;}}};
xmlreq.send(null);
}
function DadosGet() {
var nome   = document.getElementById("mat_exit_estoque").value;
var result = document.getElementById("estoque");
var xmlreq = CriaRequest();
xmlreq.open("GET", "saida_estoque.php?saida_estoque=" + nome, true);
xmlreq.onreadystatechange = function(){
if (xmlreq.readyState == 4) {
if (xmlreq.status == 200){result.value = xmlreq.responseText;}
else{result.value = "Erro: " + xmlreq.statusText;}}};
xmlreq.send(null);
}