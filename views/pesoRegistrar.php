<div class="container bg-white rounded h-75">
    <div class="d-sm-flex align-items-center justify-content-between mb-1 pt-2">
        <h4 class="ml-2 gray-color">Registrar Peso do Animal</h4>
    </div>

    <?php
        $url = explode('/', $_GET['url']);
    ?>

    <form method="POST" class="p-2" action="<?=BASE_URL?>peso/registrar_save/<?=$url[2];?>">
        <div class="row">
        
            <div class="col-sm-12 col-md-3">
                <label for="peso">Peso do Animal *</label>
                <input id="peso" type="text" class="form-control form-control-sm quantidade" name="peso_animal" required >
            </div>

            <div class="col-sm-12 col-md-2">
                <div class="form-group">
                    <label>Unidade Peso *</label>
                    <select class="form-control form-control-sm" name="id_peso_unidade" required >
                        <?php
                        foreach($unPeso as $item){
                        ?>
                            <option value="<?= $item['id_peso_unidade'] ?>"> <?= $item['peso_unidade']?> </option>
                        <?php }?>
                    </select>
                </div>  
            </div>

            <div class="col-md-2 col-sm-12">
                <label for="aplicacao">Pesagem *</label>
                <input id="aplicacao" type="text" date-input="d/m/y" class="form-control form-control-sm" name="data_pesagem" value="<?=date("d/m/Y")?>">
            </div>

            <div class="col-md-2 col-sm-12">
                <label for="data_prox_dose">Repesagem</label>
                <input id="data_prox_dose" type="text"  date-input="d/m/y" class="form-control form-control-sm" name="data_repesagem">
            </div>
        </div>
        <br>
        <input class="btn btn-sm btn-primary" type="submit" value="Registrar">
        <a class="btn btn-sm btn-default" href="<?=BASE_URL?>">Cancelar</a>
    </form> 

</div>