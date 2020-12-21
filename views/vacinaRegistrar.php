<div class="container bg-white rounded h-75">
    <div class="d-sm-flex align-items-center justify-content-between mb-1 pt-2">
        <h4 class="ml-2 gray-color">Registrar Vacina</h4>
    </div>

    <?php
        $url = explode('/', $_GET['url']);
    ?>

    <form method="POST" class="p-2" action="<?=BASE_URL?>vacina/registrar_save/<?=$url[2];?>">
        <div class="row">
        
            <div class="col-sm-12 col-md-3">
                <label for="vacina">Vacina *</label>
                <input id="vacina" type="text" class="form-control form-control-sm" name="nome_vacina" required >
            </div>

            <div class="col-sm-12 col-md-2">
                <label for="dose">Dose (ml) *</label>
                <input id="dose" type="text" class="form-control form-control-sm quantidade" name="dose" placeholder="0.000,00" required >
            </div>

            <div class="col-sm-12 col-md-2">
                <label for="aplicacao">Data Aplicação *</label>
                <input id="aplicacao" type="text"  date-input="d/m/y" class="form-control form-control-sm" name="data_aplicacao" value="<?=date("d/m/Y")?>">
            </div>

        </div>

        <div class="row mt-3">

            <div class="col-sm-12 col-md-2">
                <label for="revacinacao">Data Revacinação</label>
                <input id="revacinacao" type="text"  date-input="d/m/y" class="form-control form-control-sm" name="data_revacinacao">
            </div>

            <div class="col-sm-12 col-md-3">
                <label for="veterinario">Médico Veterinário</label>
                <input id="veterinario" type="text" class="form-control form-control-sm" name="nome_veterinario">
            </div>

            <div class="col-sm-12 col-md-2">
                <label for="registro_crmv">Registro CRMV</label>
                <input id="registro_crmv" type="text" class="form-control form-control-sm" name="registro_crmv">
            </div>

        </div>

        <div class="row mt-4">
            <div class="col-12">
                <input class="btn btn-sm btn-primary" type="submit" value="Registrar">
                <a class="btn btn-sm btn-default" href="<?=BASE_URL?>">Cancelar</a>
            </div>
        </div>
    </form> 
</div>