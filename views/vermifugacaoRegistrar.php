<div class="container bg-white rounded h-75">
    <div class="d-sm-flex align-items-center justify-content-between mb-1 pt-2">
        <h4 class="ml-2 gray-color">Registrar Vermifugação</h4>
    </div>

    <?php
        $url = explode('/', $_GET['url']);
    ?>

    <form method="POST" class="p-2" action="<?=BASE_URL?>vermifugacao/registrar_save/<?=$url[2];?>">
        <div class="row">
            <div class="col-md-3">
                <label for="produto">Produto *</labe>
                <input id="produto" type="text" class="form-control form-control-sm" name="nome_produto" required />
            </div>

            <div class="col-md-3">
                <label for="dose">Dose aplicada (ml) *</labe>
                <input id="dose" type="text" class="form-control form-control-sm quantidade" name="dose" required />
            </div>

            <div class="col-md-3">
                <label for="peso">Peso do Animal *</labe>
                <input id="peso" type="text" class="form-control form-control-sm quantidade" name="peso_animal" required />
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <span>Espécie *</span>
                    <select class="form-control form-control-sm" name="id_peso_unidade" required>
                        <?php
                        foreach($unPeso as $item){
                        ?>
                        <option value="<?= $item['id_peso_unidade'] ?>"> <?= $item['peso_unidade']?> </option>
                        <?php }?>
                    </select>
                </div>  
            </div>

        </div>

        <div class="row">

            <div class="col-md-3">
                <label for="aplicacao">Data Aplicação *</labe>
                <input id="aplicacao" type="text"  date-input="d/m/y" class="form-control form-control-sm" name="data_aplicacao" value="<?=date("d/m/Y")?>">
            </div>

            <div class="col-md-3">
                <label for="data_prox_dose">Próxima Dose</labe>
                <input id="data_prox_dose" type="text"  date-input="d/m/y" class="form-control form-control-sm" name="data_prox_dose">
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

        <input class="btn btn-sm btn-primary" type="submit" value="Registrar">
        <a class="btn btn-sm btn-default" href="<?=BASE_URL?>">Cancelar</a>
    </form> 

</div>