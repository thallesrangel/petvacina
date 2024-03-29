<div class="container bg-white rounded h-75">
    <div class="d-sm-flex align-items-center justify-content-between mb-1 pt-2">
        <h4 class="ml-2 gray-color">Registrar Higienização</h4>
    </div>

    <?php
        $url = explode('/', $_GET['url']);
    ?>

    <form method="POST" class="p-2" action="<?=BASE_URL?>higiene/registrar_save/<?=$url[2];?>">
        <div class="row">
            <div class="col-sm-12 col-md-3">
                <div class="form-group">
                    <label for="id_fornecedor">Fornecedor *</label>
                    <select class="form-control form-control-sm js-select" name="id_fornecedor" required >
                        <?php
                        foreach($fornecedor as $item){
                        ?>
                        <option value="<?= $item['id_fornecedor'] ?>"> <?= $item['nome_fornecedor']?></option>
                        <?php }?>
                    </select>
                    <a href="<?= BASE_URL . "fornecedor"?>">Registrar</a>
                </div>  
            </div>

            <div class="col-sm-12 col-md-2">
                <div class="form-group">
                    <label for="id_higiene_tipo">Tipo Serviço *</label>
                    <select class="form-control form-control-sm js-select" name="id_higiene_tipo" required >
                        <?php
                        foreach($higiene_tipo as $item){
                        ?>
                        <option value="<?= $item['id_higiene_tipo'] ?>"> <?= $item['higiene_tipo']?></option>
                        <?php }?>
                        
                    </select>
                </div>  
            </div>
            
        
        </div>

        <div class="row">
            <div class="col-sm-12 col-md-3">
                <label for="data_servico">Data Serviço *</labe>
                <input id="data_servico" type="text"  date-input="d/m/y" class="form-control form-control-sm" name="data_servico" value="<?=date("d/m/Y")?>">
            </div>

            <div class="col-sm-12 col-md-3">
                <label for="data_prox_servico">Próximo Serviço</labe>
                <input id="data_prox_servico" type="text"  date-input="d/m/y" class="form-control form-control-sm" name="data_prox_servico">
            </div>

        </div>
        <br>
        <input class="btn btn-sm btn-primary" type="submit" value="Registrar">
        <a class="btn btn-sm btn-default" href="<?=BASE_URL?>">Cancelar</a>
    </form> 
</div>