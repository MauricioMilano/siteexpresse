var tempo = new Number();

// Tempo em segundos

tempo = 1800;

function startCountdown(){

// Se o tempo não for zerado

if((tempo - 1) >= 0){

// Pega a parte inteira dos minutos

var min = parseInt(tempo/60);

// horas, pega a parte inteira dos minutos
var hor = parseInt(min/60);

//atualiza a variável minutos obtendo o tempo restante dos minutos
min = min % 60;

// Calcula os segundos restantes
var seg = tempo%60;

// Formata o número menor que dez, ex: 08, 07, ...

if(min < 10){
min = "0"+min;

min = min.substr(0, 2);

}

if(seg <=9){
seg = "0"+seg;

}

if(hor <=9){
hor = "0"+hor;
}

// Cria a variável para formatar no estilo hora/cronômetro

horaImprimivel = hor+':' + min + ':' + seg;

//JQuery pra setar o valor

$("#sessao").html(horaImprimivel);

// Define que a função será executada novamente em 1000ms = 1 segundo

setTimeout('startCountdown()',1000);

// diminui o tempo

tempo--;

// Quando o contador chegar a zero faz esta ação
	} else {
		window.alert('Você foi desconectado devido a inatividade!');
		window.open('logout.php', '_self');
	}

}

// Chama a função ao carregar a tela
startCountdown();