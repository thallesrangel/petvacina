<?php

    $qtd_animais_dados = [];
    $qtd_vacinas_dados = [];
    $qtd_vermifugacao_dados = [];
    
    foreach($qtd_animais as $item ){
        $qtd_animais_dados = $item;
    }

    foreach($qtd_vacinas as $item) {
        $qtd_vacinas_dados = $item;
    }

    foreach($qtd_vermifugacao as $item) {
        $qtd_vermifugacao_dados = $item;
    }
?>

<div class="container">

    <div class="row justify-content-center">

        <div class="col-sm-12 col-md-3 mt-2">
            <div class="card border-left-primary shadow py-2">
                <div class="card-body">
                    <img src="<?=BASE_URL?>assets/img/pata.png" width="55" height="55" class="img-responsive">
                    <span class="h3 ml-5"><?= $qtd_animais_dados['qtd'] ?></span>
                    <p class="m-2 text-center">Animais registrados</p>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-3 mt-2">
            <div class="card border-left-primary shadow py-2">
                <div class="card-body">
                    <img src="<?=BASE_URL?>assets/img/seringa.png" width="55" height="55" class="img-responsive">
                    <span class="h3 ml-5"><?= $qtd_vacinas_dados['qtd'] ?></span>
                    <p class="m-2 text-center">Vacinas aplicadas</p>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-3 mt-2">
            <div class="card border-left-primary shadow py-2">
                <div class="card-body">
                    <img src="<?=BASE_URL?>assets/img/escudo.png" width="55" height="55" class="img-responsive">
                    <span class="h3 ml-5"><?= $qtd_vermifugacao_dados['qtd'] ?></span>
                    <p class="m-2 text-center">Vermífugo aplicados</p>
                </div>
            </div>
        </div>
    
    </div>
</div>