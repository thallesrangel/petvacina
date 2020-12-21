$(document).ready(function(){
    $('.telefone').mask('(00) 00000-0000');
    $('.data').mask("00/00/0000", {placeholder: "__/__/____"});
    $('.porcentagem').mask('##0,00%', {reverse: true});
    $('.quantidade').mask('000.000.000,00', {reverse: true});
    $('.valor-unitario').mask('000,00', {reverse: true});
    $('.valor-limite').mask('000.000,00', {reverse: true});
    $('.cnpj').mask('00.000.000/0000-00', {reverse: true});
    $('.cpf').mask('000.000.000-00', {reverse: true});
});


document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems, options);
});

$(document).ready(function(){
    $('.sidenav').sidenav();
});


window.onload = function() {
    console.log(pagina.tempo)
}

$(document).ready(function($){
  
    let traducao = {
    firstDayOfWeek: 1,
    
    weekdays: {
        shorthand: ["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sáb"],
        longhand: ["Domingo", "Segunda", "Terça", "Quarta", "Quinta", "Sexta", "Sábado"],
    }, 
    months: {
        shorthand: ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"],
        longhand: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto","Setembro", "Outubro", "Novembro", "Dezembro"],
    },
    };

    $('[date-input="d/m/y"]').flatpickr({
        dateFormat: "d/m/Y",
        locale:traducao
    });

    $('.js-select').select2();

     
    // ACTIVE STYLE BACK
    const links = $('.navbar-nav li a');

    $.each(links, function (index, link) {
        
        if (link.href == document.URL) {
            
            $(this).addClass('active');
        }
    });
});

$('.dropdown-toggle').dropdown('toggle');

function pegarCidades(obj) {
    var item = obj.value;

	$.ajax({
		url:BASE_URL+"/pegarcidades",
		type:'POST',
		data:{id_estado:item},
		dataType:'json',
		success:function(json) {
			var html = '';

			for(var i in json) {
                console.log(json);
				html += '<option value="'+json[i].id_cidade+'">'+json[i].nome_cidade+'</option>';
			}

			$("#cidade").html(html);
		}
	});
}

$(document).ready(function(){
    var item = $('#especieAnimal').trigger("change").val();

    $.ajax({
		url:BASE_URL+"/pegarracasporespecie",
		type:'POST',
		data:{id_especie:item},
		dataType:'json',
		success:function(json) {
			var html = '';

			for(var i in json) {
                console.log(json);
				html += '<option value="'+json[i].id_raca+'">'+json[i].nome_raca+'</option>';
			}
            $("#racaAnimal").html(html);
		}
	});
});


function pegarRacasPorEspecie(especie) {

    //var item = $('#especie').trigger("change").val();
    var item = especie.value;

    $.ajax({
		url:BASE_URL+"/pegarracasporespecie",
		type:'POST',
		data:{id_especie:item},
		dataType:'json',
		success:function(json) {
			var html = '';

			for(var i in json) {
                console.log(json);
				html += '<option value="'+json[i].id_raca+'">'+json[i].nome_raca+'</option>';
			}
            $("#racaAnimal").html(html);
		}
	});
}
