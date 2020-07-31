<html>
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="PetVacina">
        <meta name="author" content="Thalles Rangel Lopes">
        <title>Pet Vacina</title>
        <script src="<?=BASE_URL?>assets/js/script.js"></script>
        <link rel="stylesheet" type="text/css" href="<?=BASE_URL?>assets/css/style.css"/>
        <link rel="stylesheet" type="text/css" href="<?=BASE_URL?>assets/css/bootstrap.min.css"/>
        <script
			  src="https://code.jquery.com/jquery-3.5.1.js"
			  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
			  crossorigin="anonymous"></script>
        <script type="text/javascript" src="<?=BASE_URL?>assets/js/script.js"></script>
        <script type="text/javascript" src="<?=BASE_URL?>assets/js/bootstrap.min.js"></script>
        <script src="https://unpkg.com/feather-icons"></script>
        
        <link href="<?=BASE_URL?>assets/css/select2.min.css" rel="stylesheet" />
        <script src="<?=BASE_URL?>assets/js/select2.min.js"></script>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        
</head>
    <body class="bg-purple">
    
        <div class="d-flex align-items-center justify-content-center h-100">
            <form method="POST" class="p-2 h-75 w-50 rounded bg-white" action="<?=BASE_URL?>usuario/registrar_save">
                <div class="text-center">
                    <img src="<?=BASE_URL?>/assets/img/logo.png">
                </div>

                <div class="row pt-3 pl-4 pr-4">
                    <div class="col-sm-12 col-md-6">
                        <label for="nome">Nome</label>
                        <input class="form-control form-control-sm" id="nome" type="text" name="nome" required>
                    </div>

                    <div class="col-sm-12 col-md-6">
                        <label for="sobrenome">Sobrenome</label>
                        <input class="form-control form-control-sm" id="sobrenome" type="text" name="sobrenome" required>
                    </div>
                </div>

                <div class="row pt-3 pl-4 pr-4">
                    <div class="col-sm-12 col-md-6">
                        <label for="email">E-mail</label>
                        <input class="form-control form-control-sm" id="email" type="email" name="email" required>
                    </div>

                    <div class="col-sm-12 col-md-6">
                        <label for="senha">Senha</label>
                        <input class="form-control form-control-sm" id="senha" type="password" name="senha" required>
                    </div>
                </div>
               
                <div class="row pt-3 pl-4 pr-4">
                    <div class="col-sm-12 col-md-6">
                        <label for="estado">Estado</label>
                        
                        <select class="form-control form-control-sm js-select" name="id_estado" onchange="pegarCidades(this)" required>
                            <?php
                            foreach($estado as $item){
                            ?>
                            <option value="<?= $item['id_estado'] ?>"> <?= $item['nome_estado']?> </option>
                            <?php }?>
                        </select>
                    </div>

                    <div class="col-sm-12 col-md-6">
                        <label for="cidade">Cidade</label>
                        <select id="cidade" class="form-control form-control-sm js-select" name="id_cidade" required>
                            
                        </select>
                    </div>
                </div>

                <input class="ml-4 mt-3 btn btn-primary" type="submit" value="Registrar">
                <a class="ml-4 mt-3 btn btn-link" href="<?=BASE_URL?>login">Voltar</a>
            </form>
        </div>
        <script type="text/javascript">var BASE_URL = '<?php echo BASE_URL; ?>';</script>
    </body>
</html>