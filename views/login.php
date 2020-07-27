<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="PetVacina">
        <meta name="author" content="Thalles Rangel Lopes">
        <title>Pet Vacina</title>
        <link rel="stylesheet" type="text/css" href="<?=BASE_URL?>assets/css/style.css"/>
        <link rel="stylesheet" type="text/css" href="<?=BASE_URL?>assets/css/bootstrap.min.css"/>
</head>

<style>
body{
	background-color: #ecf0f1;
    font-family: 'Barlow', sans-serif;
    backgroind: 
}
.tamanho-largura {
    max-width: 350px;
    height: auto;
    background: #FFF;
    padding: 2%;
    margin-top: 6%;
    border: 2px solid #ecf0f1; 
    border-radius: 10px;
}
</style>

 <div class="container tamanho-largura shadow-lg p-3 mb-5 bg-white rounded">
        
    <div class="d-flex justify-content-center">
        <img class="img-fluid" src="<?=BASE_URL . 'assets/img/logo.png'?>">
    </div>
    
    <br>

    <form action="<?=BASE_URL.'login/logar'?>" method="POST" id="form" autocomplete="off">

        <div class="form-group">
            <label>E-mail</label>
            <input class="form-control" type="email" name="email" placeholder="Digite seu e-mail"
                autocomplete="off" id="campo" required autofocus/>
        </div>

        <div class="form-group">
            <label>Senha</label>
            <input class="form-control" type="password" name="senha" placeholder="Digite sua senha" autocomplete="off" required/>
        </div>

        <div class="row">

            <div class="col-12">
                    <button type="submit" class="btn btn-sm btn-block btn-primary p-2">Entrar</button>
            </div>	
          
        </div>
        <p class="mt-3"><a class="d-flex justify-content-center" href="#">Recuperar acesso.</a></p>
    </form>
</div>



<!--
    Ajax login
<script>

$(function() {

    $('#form').on('submit', function(e)
    {
        e.preventDefault();

        var email = $('input[name=email]').val();
        var senha = $('input[name=senha').val();

        $.ajax({
            type: 'POST',
            url: '<=DIRPAGE.'/login/logar'?>',
            data: {email:email, senha:senha},
            sucess:function(msg) {
               alert(msg)
            }
        });
    });
});
</script> -->