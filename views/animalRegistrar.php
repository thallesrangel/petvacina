<div class="container bg-white rounded h-75">
    <div class="d-sm-flex align-items-center justify-content-between mb-1 pt-2">
        <h4 class="ml-2 gray-color">Registrar Animal</h4>
    </div>
    <form enctype="multipart/form-data" method="POST" class="p-2" action="<?=BASE_URL?>animal/registrar_save">
        <div class="row">
            <div class="col-sm-12 col-md-3 form-group">
                <label for="nome">Nome Animal *</labe>
                <input id="nome" type="text" class="form-control form-control-sm" name="nome_animal" required>
            </div>

            <div class="col-sm-12 col-md-3 form-group">
                <span>Proprietário *</span><br>
                <select class="form-control form-control-sm js-select" name="proprietario" required>
                    <?php
                    foreach($proprietario as $item){
                    ?>
                    <option value="<?= $item['id_proprietario'] ?>"> <?= $item['nome_proprietario'] ." ". $item['sobrenome_proprietario']?> </option>
                    <?php }?>
                </select>
                <a href="<?=BASE_URL?>proprietario">Registrar novo proprietário</a>
            </div>
            
            <div class="col-sm-12 col-md-2 form-group">
                <label for="identificacao">Identificação</labe>
                <input id="identificacao" type="text" class="form-control form-control-sm" name="identificacao">
            </div>

            <div class="col-md-3">
                <label for="identificacao">Data Nascimento</labe>
                <input  id="identificacao" type="text" date-input="d/m/y" name="data_nascimento" class="form-control form-control-sm" required>
            </div>

        </div>
        
        <div class="row">
            <div class="col-sm-12 col-md-3 form-group">
                <span>Espécie *</span><br>
                
                <select class="form-control form-control-sm js-select" name="id_especie" onchange="pegarRacasPorEspecie(this)" required>
                    <?php
                    foreach($especies as $item){
                    ?>
                    <option value="<?= $item['id_especie'] ?>"> <?= $item['nome_especie']?> </option>
                    <?php }?>
                </select>
                <a href="<?=BASE_URL?>animalespecie">Registrar nova espécie</a>
            </div>
        

            <div class="col-sm-12 col-md-3 form-group">
                <label for="raca">Raça *</label>
                <select id="racaAnimal" class="form-control form-control-sm js-select" name="id_raca" required>
                </select>
                <a href="<?=BASE_URL?>animalraca">Registrar nova raça</a>
            </div>

            <div class="col-sm-12 col-md-3 form-group">
                    <label for="pelagem">Pelagem / Escama *</label>
                    <input id="pelagem" type="text" name="pelagem" class="form-control form-control-sm" required>
            </div>

        </div>

        <div class="row">
        
            <div class="col-sm-12 col-md-3 form-group">
                <p>Sexo *</p>
                <div class="custom-control custom-radio float-left mr-1">
                    <input type="radio" id="sexoM" name="sexo" class="custom-control-input" value="1" checked>
                    <label class="custom-control-label" for="sexoM">Macho</label>
                </div>

                <div class="custom-control custom-radio float-left ml-1">
                    <input type="radio" id="sexoF" name="sexo" class="custom-control-input" value="2">
                    <label class="custom-control-label" for="sexoF">Fêmea</label>
                </div>
            </div>


            <div class="col-sm-12 col-md-3 form-group">
                <p>Castrado?</p>
                <div class="custom-control custom-radio float-left mr-1">
                    <input type="radio" id="castradoS" name="castrado" class="custom-control-input" value="1">
                    <label class="custom-control-label" for="castradoS">Sim</label>
                </div>

                <div class="custom-control custom-radio float-left ml-1">
                    <input type="radio" id="castradoN" name="castrado" class="custom-control-input" value="2" checked>
                    <label class="custom-control-label" for="castradoN" checked>Não</label>
                </div>
            </div>


            <div class="col-sm-12 col-md-3 form-group">
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

            <div class="col-sm-12 col-md-3 form-group">
                <label id="img">Imagem</labe>
                <input for="img" type="file" name="arquivo">
            </div>

        </div>

        <div class="row">
            <div class="col-sm-12 col-md-3 form-group">
                <label for="microchip">Microchip</label>
                <input id="microchip" type="text" name="numero_microchip" class="form-control form-control-sm">
            </div>

            <div class="col-sm-12 col-md-3 form-group">
                <label for="data_microchip">Data de implantação</labe>
                <input  id="data_microchip" type="text" date-input="d/m/y" name="data_microchip" class="form-control form-control-sm">
            </div>

            <div class="col-sm-12 col-md-3 form-group">
                <label for="local_implatacao">Local de implantação</label>
                <input id="local_implatacao" type="text" name="local_implatacao" class="form-control form-control-sm">
            </div>

        </div>
        <input class="btn btn-sm btn-primary" type="submit" value="Registrar">
        <a class="btn btn-sm btn-default" href="<?=BASE_URL?>">Cancelar</a>
    </form> 

    <script type="text/javascript">var BASE_URL = '<?php echo BASE_URL.'animal'; ?>';</script>
</div>