<div class="container bg-white rounded h-75">
    <div class="d-sm-flex align-items-center justify-content-between mb-1 pt-2">
        <h4 class="ml-2 gray-color">Registrar Raça</h4>
    </div>

    <form method="POST" class="p-2" action="<?=BASE_URL?>animalraca/registrar_save">
        <div class="row">

            <div class="col-sm-12 col-md-3 form-group">
                <span>Espécie *</span><br>
                
                <select class="form-control form-control-sm js-select" name="id_especie" required>
                    <?php
                    foreach($especies as $item){
                    ?>
                    <option value="<?= $item['id_especie'] ?>"> <?= $item['nome_especie']?> </option>
                    <?php }?>
                </select>
                <a href="<?=BASE_URL?>animalespecie/registrar">Registrar nova espécie</a>
            </div>

            <div class="col-md-4 col-sm-12">
                <label for="especie">Nome da Raça *</labe>
                <input id="especie" type="text" class="form-control form-control-sm" name="nome_raca" required>
            </div>

        </div>

        <input class="btn btn-sm btn-primary" type="submit" value="Registrar">
        <a class="btn btn-sm btn-default" href="<?=BASE_URL?>">Cancelar</a>
    </form> 
</div>