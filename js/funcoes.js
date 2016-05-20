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
  document.getElementById('total').value = tot;
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
        }, 1000);
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