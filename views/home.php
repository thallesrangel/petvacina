
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

        <div class="col-sm-12 col-md-4">
            <div class="card m-4 border-left-primary shadow h-100 py-2">
                <div class="card-body text-center">
                <img src="<?=BASE_URL?>assets/img/pata.png" width="75" height="75" class="img-responsive">
                    <h3><?= $qtd_animais_dados['qtd'] ?></h3>
                    <p class="m-0">Animais Registrados</p>
                
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-4">
            <div class="card m-4 border-left-primary shadow h-100 py-2">
                <div class="card-body text-center">
                <img src="<?=BASE_URL?>assets/img/seringa.png" width="75" height="75" class="img-responsive">
                    <h3><?= $qtd_vacinas_dados['qtd'] ?></h3>
                    <p class="m-0">Vacinas Aplicadas</p>
                
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-4">
            <div class="card m-4 border-left-primary shadow h-100 py-2">
                <div class="card-body text-center">
                <img src="<?=BASE_URL?>assets/img/escudo.png" width="75" height="75" class="img-responsive">
                    <h3><?= $qtd_vermifugacao_dados['qtd'] ?></h3>
                    <p class="m-0">Vermífugo Aplicados</p>
                
                </div>
            </div>
        </div>
    
    </div>
</div>