<div class="d-sm-flex align-items-center justify-content-between mb-1 pl-2">
    <h1 class="h3 ml-3 gray-color">Registrar Animal</h1>
</div>
<form enctype="multipart/form-data" method="POST" class="p-4" action="<?=BASE_URL?>animal/registrar_save">
    <div class="row">
        <div class="col-md-3">
            <label for="nome">Nome Animal *</labe>
            <input id="nome" type="text" class="form-control form-control-sm" name="nome_animal" required>
        </div>

        <div class="col-md-3">
            <span>Proprietário</span>
            <select class="form-control form-control-sm js-select" name="proprietario" required>
                <option value="1">Thalles</option>
            </select>
        </div>
        
        <div class="col-md-3">
            <label for="identificacao">Identificação</labe>
            <input id="identificacao" type="text" class="form-control form-control-sm" name="identificacao">
        </div>

        <div class="col-md-3">
            <label for="identificacao">Data Nascimento</labe>
            <input  id="identificacao" type="text" date-input="d/m/y" name="data_nascimento" class="form-control form-control-sm" required>
        </div>

    </div>
    
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <span>Espécie *</span>
                <select class="form-control form-control-sm js-select" name="id_especie" required>
                    <?php
                    foreach($especies as $item){
                    ?>
                    <option value="<?= $item['id_especie'] ?>"> <?= $item['nome_especie']?> </option>
                    <?php }?>
                </select>
            </div>  
        </div>
        

        <div class="form-group col-3">
            <label for="raca">Raça</label>
            <input id="raca" type="text" class="form-control form-control-sm" name="raca">
        </div>

        <div class="form-group col-3">
            <label for="pelagem">Pelagem / Escama *</label>
            <input id="pelagem" type="text" name="pelagem" class="form-control form-control-sm" required>
        </div>

    </div>

    <div class="row">
        <div class="form-group col-3">
            <p>Sexo *</p>
            <div class="custom-control custom-radio float-left mr-1">
                <input type="radio" id="sexoM" name="sexo" class="custom-control-input" value="1" checked>
                <label class="custom-control-label" for="sexoM">Masculino</label>
            </div>

            <div class="custom-control custom-radio float-left ml-1">
                <input type="radio" id="sexoF" name="sexo" class="custom-control-input" value="2">
                <label class="custom-control-label" for="sexoF">Feminino</label>
            </div>
        </div>


        <div class="form-group col-3">
            <p>Possui Filhotes? *</p>
            <div class="custom-control custom-radio float-left mr-1">
                <input type="radio" id="filhotes1" name="filhotes" class="custom-control-input" value="1">
                <label class="custom-control-label" for="filhotes1">Sim</label>
            </div>

            <div class="custom-control custom-radio float-left ml-1">
                <input type="radio" id="filhotes2" name="filhotes" class="custom-control-input" value="2" checked>
                <label class="custom-control-label" for="filhotes2">Não</label>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="form-group col-2">
            <label for="microchip">Microchip</label>
            <input id="microchip" type="text" name="numero_microchip" class="form-control form-control-sm">
        </div>

        <div class="form-group col-3">
            <label for="data_microchip">Data de implantação</labe>
            <input  id="data_microchip" type="text" date-input="d/m/y" name="data_microchip" class="form-control form-control-sm">
        </div>

        <div class="form-group col-2">
            <label for="local_implatacao">Local de implantação</label>
            <input id="local_implatacao" type="text" name="local_implatacao" class="form-control form-control-sm">
        </div>

        <div class="form-group col-2">
            <label id="img">Imagem</labe>
            <input for="img" type="file" name="arquivo">
        </div>
    </div>
    <input class="btn btn-primary" type="submit" value="Registrar">
    <a class="btn btn-default" href="<?=BASE_URL?>">Cancelar</a>
</form> 

</div>