
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
});


$(document).ready(function() {
    $('.js-select').select2();
});
