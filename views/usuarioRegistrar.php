<html>
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
    <body class="bg-purple">
    
        <div class="mt-5 pb-4 container h-auto bg-white rounded">
            <img src="<?=BASE_URL?>/assets/img/logo.png">
        
        <form method="POST" class="p-2" action="<?=BASE_URL?>usuario/registrar_save">

            <div class="row pl-4">  
                <div class="col-sm-12 col-md-3">
                    <label for="nome">Nome</label>
                    <input class="form-control form-control-sm" id="nome" type="text" name="nome" required>
                </div>

                <div class="col-sm-12 col-md-3">
                    <label for="sobrenome">Sobrenome</label>
                    <input class="form-control form-control-sm" id="sobrenome" type="text" name="sobrenome" required>
                </div>
            </div>

            <div class="row pt-3 pl-4">
                <div class="col-sm-12 col-md-3">
                    <label for="email">E-mail</label>
                    <input class="form-control form-control-sm" id="email" type="email" name="email" required>
                </div>

                <div class="col-sm-12 col-md-3">
                    <label for="senha">Senha</label>
                    <input class="form-control form-control-sm" id="senha" type="password" name="senha" required>
                </div>

            </div>

            <div class="row pt-3 pl-4">
                <div class="col-sm-12 col-md-3">
                    <label for="cidade">Cidade</label>
                    <input class="form-control form-control-sm" id="cidade" type="text" name="cidade" required>
                </div>

                <div class="col-sm-12 col-md-3">
                    <label for="estado">Estado</label>
                    <input class="form-control form-control-sm" id="senha" type="text" name="estado" required>
                </div>

            </div>  
            
            <input class="ml-4 mt-3 btn btn-primary" type="submit" value="Registrar">
        </form>
        </div>
    
    </body>
</html>