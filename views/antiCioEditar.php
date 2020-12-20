<?php
    $dados = [];
    
    foreach($info as $item ){
        $dados = $item;
    }
?>
<div class="container bg-white rounded h-75">
    <div class="d-sm-flex align-items-center justify-content-between mb-1 pt-2">
        <h4 class="ml-2 gray-color">Editar Anti-cio</h4>
    </div>

    <?php
        $url = explode('/', $_GET['url']);
    ?>

    <form method="POST" class="p-2" action="<?=BASE_URL?>anticio/editar/<?=$url[2];?>">
        <div class="row">
            <input type="hidden" class="form-control form-control-sm" value="<?= $url[2] ?>" name="id_anticio">
            <div class="col-md-3">
                <label for="produto">Produto *</labe>
                <input id="produto" type="text" class="form-control form-control-sm" value="<?= $dados['nome_produto'] ?>" name="nome_produto">
            </div>

            <div class="col-md-3">
                <label for="dose">Dose *</labe>
                <input id="dose" type="text" class="form-control form-control-sm" value="<?= $dados['dose'] ?>" name="dose">
            </div>

            
            <div class="col-md-3">
                <label for="aplicacao">Data Aplicação *</labe>
                
                <input id="aplicacao" type="text"  date-input="d/m/y" class="form-control form-control-sm" value="<?= date("d/m/Y", strtotime($dados['data_aplicacao'])) ?>" name="data_aplicacao">
            </div>

            <div class="col-md-3">
                <label for="data_prox_dose">Data Reapliação</labe>
                <input id="data_prox_dose" type="text"  date-input="d/m/y" class="form-control form-control-sm" value="<?= date("d/m/Y", strtotime($dados['data_prox_dose'])) ?>"  name="data_prox_dose">
            </div>

        </div>

        <div class="row">
        
            <div class="col-md-3">
                <label for="veterinario">Médico Veterinário</labe>
                <input id="veterinario" type="text" class="form-control form-control-sm" value="<?= $dados['nome_veterinario'] ?>" name="nome_veterinario">
            </div>

            <div class="col-md-2">
                <label for="registro_crmv">Registro CRMV</labe>
                <input id="registro_crmv" type="text" class="form-control form-control-sm"  value="<?= $dados['registro_crmv'] ?>" name="registro_crmv">
            </div>
        </div>

        <input class="btn btn-primary" type="submit" value="Salvar">
        <a class="btn btn-default" href="<?=BASE_URL?>">Cancelar</a>
    </form> 

</div>