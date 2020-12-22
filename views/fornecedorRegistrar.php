<div class="container bg-white rounded h-75">
    <div class="d-sm-flex align-items-center justify-content-between mb-1 pt-2">
        <h4 class="ml-2 gray-color">Registrar Fornecedor</h4>
    </div>

    <?php
        $url = explode('/', $_GET['url']);
    ?>

    <form method="POST" class="p-2" action="<?=BASE_URL?>fornecedor/registrar_save/<?=$url[2];?>">
        <div class="row">
        
            <div class="col-md-3 col-sm-12">
                <label for="fornecedor">Fornecedor *</label>
                <input id="fornecedor" type="text" class="form-control form-control-sm" name="nome_fornecedor" required>
            </div>

            <div class="col-sm-12 col-md-3">
                <div class="form-group">
                    <label for="id_fornecedor_tipo">Fornecedor Tipo *</label>
                    <select class="form-control form-control-sm" name="id_fornecedor_tipo" required>
                        <?php
                        foreach($fornecedor_tipo as $item){
                        ?>
                            <option value="<?= $item['id_fornecedor_tipo'] ?>"> <?= $item['fornecedor_tipo']?> </option>
                        <?php }?>
                    </select>
                </div>  
            </div>

        </div>

        <input class="btn btn-sm btn-primary" type="submit" value="Registrar">
        <a class="btn btn-sm btn-default" href="<?=BASE_URL?>">Cancelar</a>
    </form> 

</div>