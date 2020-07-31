<div class="container bg-white rounded h-75">
    <div class="d-sm-flex align-items-center justify-content-between mb-1 pt-2">
        <h4 class="ml-2 gray-color">Registrar Vacina</h4>
    </div>

    <?php
        $url = explode('/', $_GET['url']);
    ?>

    <form method="POST" class="p-2" action="<?=BASE_URL?>vacina/registrar_save/<?=$url[2];?>">
        <div class="row">
            <div class="col-md-3">
                <label for="vacina">Vacina *</labe>
                <input id="vacina" type="text" class="form-control form-control-sm" name="nome_vacina">
            </div>

            <div class="col-md-3">
                <label for="dose">Dose *</labe>
                <input class="quantidade" id="dose" type="text" class="form-control form-control-sm" name="dose">
            </div>

            <div class="col-md-3">
                <label for="valor_total">Valor Total *</labe>
                <input class="valor-limite" id="valor_total" type="text" class="form-control form-control-sm" placeholder="R$" name="valor_total">
            </div>
    
        </div>

        <div class="row">

            <div class="col-md-3">
                <label for="aplicacao">Data Aplicação *</labe>
                <input id="aplicacao" type="text"  date-input="d/m/y" class="form-control form-control-sm" name="data_aplicacao">
            </div>

            <div class="col-md-3">
                <label for="revacinacao">Data Revacinação</labe>
                <input id="revacinacao" type="text"  date-input="d/m/y" class="form-control form-control-sm" name="data_revacinacao">
            </div>

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