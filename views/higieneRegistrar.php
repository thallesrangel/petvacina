<div class="container bg-white rounded h-75">
    <div class="d-sm-flex align-items-center justify-content-between mb-1 pt-2">
        <h4 class="ml-2 gray-color">Registrar Banho e Tosa</h4>
    </div>

    <?php
        $url = explode('/', $_GET['url']);
    ?>

    <form method="POST" class="p-2" action="<?=BASE_URL?>higiene/registrar_save/<?=$url[2];?>">
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <span>Prestador *</span>
                    <select class="form-control form-control-sm js-select" name="id_prestador" required>
                        <?php
                        foreach($prestador as $item){
                        ?>
                        <option value="<?= $item['id_prestador'] ?>"> <?= $item['nome_prestador']?></option>
                        <?php }?>
                    </select>
                </div>  
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <span>Tipo Serviço *</span>
                    <select class="form-control form-control-sm js-select" name="id_higiene_tipo" required>
                        <?php
                        foreach($higiene_tipo as $item){
                        ?>
                        <option value="<?= $item['id_higiene_tipo'] ?>"> <?= $item['higiene_tipo']?></option>
                        <?php }?>
                    </select>
                </div>  
            </div>
            

            <div class="col-md-2">
                <label for="valor_total">Valor Total</labe>
                <input id="valor_total" type="text" class="form-control form-control-sm valor-limite" name="valor_total">
            </div>
        
        </div>

        <div class="row">
            <div class="col-md-3">
                <label for="data_servico">Data Serviço *</labe>
                <input id="data_servico" type="text"  date-input="d/m/y" class="form-control form-control-sm" name="data_servico">
            </div>

            <div class="col-md-3">
                <label for="data_prox_servico">Próximo Serviço</labe>
                <input id="data_prox_servico" type="text"  date-input="d/m/y" class="form-control form-control-sm" name="data_prox_servico">
            </div>

        </div>

        <input class="btn btn-primary" type="submit" value="Registrar">
        <a class="btn btn-default" href="<?=BASE_URL?>">Cancelar</a>
    </form> 
</div>