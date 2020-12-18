<div class="container bg-white rounded h-75">
    <div class="d-sm-flex align-items-center justify-content-between mb-1 pt-2">
        <h4 class="ml-2 gray-color">Registrar Métrica do Animal</h4>
    </div>

    <?php
        $url = explode('/', $_GET['url']);
    ?>

    <form method="POST" class="p-2" action="<?=BASE_URL?>metrica/registrar_save/<?=$url[2];?>">
        <div class="row">
        
            <div class="col-md-3 col-sm-12">
                <label for="altura">Altura do Animal *</labe>
                <input id="altura" type="text" class="form-control form-control-sm quantidade" placeholder="0.000,00" name="altura_animal" required >
            </div>

            <div class="col-sm-12 col-md-2">
                <div class="form-group">
                    <span>Und Altura *</span>
                    <select class="form-control form-control-sm" name="id_metrica_unidade_altura" required >
                        <?php
                        foreach($unMetrica as $item){
                        ?>
                            <option value="<?= $item['id_metrica_unidade'] ?>"> <?= $item['metrica_unidade']?> </option>
                        <?php }?>
                    </select>
                </div>  
            </div>

            <div class="col-md-3 col-sm-12">
                <label for="comprimento">Comprimento do Animal *</labe>
                <input id="comprimento" type="text" class="form-control form-control-sm quantidade" placeholder="0.000,00" name="comprimento_animal" required >
            </div>

            <div class="col-sm-12 col-md-2">
                <div class="form-group">
                    <span title="Unidade de Comprimento">Comprimento *</span>
                    <select class="form-control form-control-sm" name="id_metrica_unidade_comprimento" required >
                        <?php
                        foreach($unMetrica as $item){
                        ?>
                            <option value="<?= $item['id_metrica_unidade'] ?>"> <?= $item['metrica_unidade']?> </option>
                        <?php }?>
                    </select>
                </div>  
            </div>

            <div class="col-md-3 col-sm-12">
                <label for="medicao">Data Medição *</labe>
                <input id="medicao" type="text"  date-input="d/m/y" class="form-control form-control-sm" name="data_medicao" value="<?=date("d/m/Y")?>" required>
            </div>

            <div class="col-md-3 col-sm-12">
                <label for="data_remedicao">Data Remedição</labe>
                <input id="data_remedicao" type="text"  date-input="d/m/y" class="form-control form-control-sm" name="data_remedicao">
            </div>
        </div>
     

        <input class="btn btn-sm btn-primary" type="submit" value="Registrar">
        <a class="btn btn-sm btn-default" href="<?=BASE_URL?>">Cancelar</a>
    </form> 

</div>