<div class="d-sm-flex align-items-center justify-content-between mb-1 pl-2">
    <h1 class="h3 ml-3 gray-color">Registrar Anti-cio</h1>
</div>

<?php
    $url = explode('/', $_GET['url']);
?>

<form method="POST" class="p-4" action="<?=BASE_URL?>anticio/registrar_save/<?=$url[2];?>">
    <div class="row">
        <div class="col-md-3">
            <label for="produto">Produto *</labe>
            <input id="produto" type="text" class="form-control form-control-sm" name="nome_produto">
        </div>

        <div class="col-md-3">
            <label for="dose">Dose *</labe>
            <input id="dose" type="text" class="form-control form-control-sm" name="dose">
        </div>

        
        <div class="col-md-3">
            <label for="aplicacao">Data Aplicação *</labe>
            <input id="aplicacao" type="text"  date-input="d/m/y" class="form-control form-control-sm" name="data_aplicacao">
        </div>

        <div class="col-md-3">
            <label for="data_prox_dose">Data Reapliação</labe>
            <input id="data_prox_dose" type="text"  date-input="d/m/y" class="form-control form-control-sm" name="data_prox_dose">
        </div>

    </div>

    <div class="row">
    
        <div class="col-md-3">
            <label for="veterinario">Médico Veterinário</labe>
            <input id="veterinario" type="text" class="form-control form-control-sm" name="nome_veterinario">
        </div>

        <div class="col-md-2">
            <label for="registro_crmv">Registro CRMV</labe>
            <input id="registro_crmv" type="text" class="form-control form-control-sm" name="registro_crmv">
        </div>
    </div>

    <input class="btn btn-primary" type="submit" value="Registrar">
    <a class="btn btn-default" href="<?=BASE_URL?>">Cancelar</a>
</form> 

</div>