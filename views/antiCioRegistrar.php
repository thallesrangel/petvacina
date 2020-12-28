<div class="container bg-white rounded h-75">
    <div class="d-sm-flex align-items-center justify-content-between mb-1 pt-2">
        <h4 class="ml-2 gray-color">Registrar Anti-cio</h4>
    </div>

    <?php
        $url = explode('/', $_GET['url']);
    ?>

    <form method="POST" class="p-2" action="<?=BASE_URL?>anticio/registrar_save/<?=$url[2];?>">
        <div class="row">
            <div class="col-md-3">
                <label for="produto">Produto *</label>
                <input id="produto" type="text" class="form-control form-control-sm" name="nome_produto" required />
            </div>

            <div class="col-md-2">
                <label for="dose">Dose (ml) *</label>
                <input id="dose" type="text" class="form-control form-control-sm quantidade" name="dose" required />
            </div>

            
            <div class="col-md-3">
                <label for="aplicacao">Data Aplicação *</label>
                <input id="aplicacao" type="text"  date-input="d/m/y" class="form-control form-control-sm" name="data_aplicacao" value="<?=date("d/m/Y")?>">
            </div>

            <div class="col-md-3">
                <label for="data_prox_dose">Data Reapliação</label>
                <input id="data_prox_dose" type="text"  date-input="d/m/y" class="form-control form-control-sm" name="data_prox_dose">
            </div>

        </div>

        <div class="row">
        
            <div class="col-md-3">
                <label for="veterinario">Médico Veterinário</label>
                <input id="veterinario" type="text" class="form-control form-control-sm" name="nome_veterinario">
            </div>

            <div class="col-md-2">
                <label for="registro_crmv">Registro CRMV</label>
                <input id="registro_crmv" type="text" class="form-control form-control-sm" name="registro_crmv">
            </div>
        </div>
        <br>
        <input class="btn btn-sm btn-primary" type="submit" value="Registrar">
        <a class="btn btn-sm btn-default" href="<?=BASE_URL?>">Cancelar</a>
    </form> 

</div>