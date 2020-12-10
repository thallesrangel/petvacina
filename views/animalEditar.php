<?php
    $dados = [];
    
    foreach($info as $item ){
        $dados = $item;
    }
?>

<div class="container bg-white rounded h-75">
    <div class="d-sm-flex align-items-center justify-content-between mb-1 pt-2">
        <h4 class="ml-2 gray-color">Editar Animal</h4>
    </div>

    <?php
        $url = explode('/', $_GET['url']);
    ?>

    <form method="POST" class="p-2" action="<?=BASE_URL?>animal/editar/<?=$url[2];?>">
        <div class="row">
            <input type="hidden" class="form-control form-control-sm" value="<?= $url[2] ?>" name="id_animal">
            <div class="col-md-3">
                <label for="produto">Nome Animal *</labe>
                <input id="produto" type="text" class="form-control form-control-sm" value="<?= $dados['nome_animal']?>" name="nome_produto">
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <span>Proprietário *</span>
                    <select class="form-control form-control-sm" name="id_proprietario" required>
                        <?php
                        foreach($proprietarios as $item){
             
                        if ($dados['id_proprietario'] == $item['id_proprietario']) {
                                $selected = 'selected';
                            } else {
                                $selected = '';
                            }   
                            echo '<option value="' . $item['id_proprietario'] . '" '.$selected.'>' .$item['nome_proprietario'] . '</option>';
                        ?>
                        <?php
                        }
                        ?>
                    </select>
                </div>  
            </div>

            <div class="col-md-2">
                <label for="identificacao_animal">Identificação *</labe>
                <input id="identificacao_animal" type="text" class="form-control form-control-sm" value="<?= $dados['identificacao_animal']?>" name="identificacao_animal">
            </div>

            <div class="col-md-3">
                <label for="nascimento">Data Nascimento *</labe>
                <input id="nascimento" type="text"  date-input="d/m/y" class="form-control form-control-sm" value="<?= date("d/m/Y", strtotime($dados['data_nascimento'])) ?>" name="data_nascimento">
            </div>


        </div>

        <div class="row">

            <div class="col-md-3">
                    <div class="form-group">
                        <span>Espécie *</span>
                        <select class="form-control form-control-sm js-select" name="id_especie" required>
                            <?php
                            foreach ($especies as $item){
                
                            if ($dados['id_especie'] == $item['id_especie']) {
                                    $selected = 'selected';
                                } else {
                                    $selected = '';
                                }   
                                echo '<option value="' . $item['id_especie'] . '" '.$selected.'>' .$item['nome_especie'] . '</option>';
                            ?>
                            <?php
                            }
                            ?>
                        </select>
                    </div>  
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <span>Raça *</span>
                        <select class="form-control form-control-sm js-select" name="id_raca" required>
                            <?php
                            foreach ($racas as $item){
                
                            if ($dados['id_raca'] == $item['id_raca']) {
                                    $selected = 'selected';
                                } else {
                                    $selected = '';
                                }   
                                echo '<option value="' . $item['id_raca'] . '" '.$selected.'>' .$item['nome_raca'] . '</option>';
                            ?>
                            <?php
                            }
                            ?>
                        </select>
                    </div>  
                </div>
                
                <div class="col-md-3">
                    <label for="pelagem">Pelagem / Escama *</labe>
                    <input id="pelagem" type="text" class="form-control form-control-sm" value="<?= $dados['pelagem']?>" name="pelagem">
                </div>
        </div>
            
        <div class="row">
            
            <div class="col-sm-12 col-md-3 form-group">
                <p>Sexo *</p>
                <div class="custom-control custom-radio float-left mr-1">
                    <input type="radio" id="sexoM" name="sexo" class="custom-control-input" value="1" <?= $dados['sexo'] == 1 ? "checked" : ''?>>
                    <label class="custom-control-label" for="sexoM">Macho</label>
                </div>

                <div class="custom-control custom-radio float-left ml-1">
                    <input type="radio" id="sexoF" name="sexo" class="custom-control-input" value="2" <?= $dados['sexo'] == 2 ? 'checked' : ''?>>
                    <label class="custom-control-label" for="sexoF">Fêmea</label>
                </div>
            </div>

            <div class="col-sm-12 col-md-3 form-group">
                <p>Castrado?</p>
                <div class="custom-control custom-radio float-left mr-1">
                    <input type="radio" id="castradoS" name="castrado" class="custom-control-input" value="1" <?= $dados['flag_castrado'] == 1 ? 'checked' : ''?>>
                    <label class="custom-control-label" for="castradoS">Sim</label>
                </div>

                <div class="custom-control custom-radio float-left ml-1">
                    <input type="radio" id="castradoN" name="castrado" class="custom-control-input" value="2" <?= $dados['flag_castrado'] == 2 ? 'checked' : ''?>>
                    <label class="custom-control-label" for="castradoN" checked>Não</label>
                </div>
            </div>


            <div class="col-sm-12 col-md-3 form-group">
                <p>Possui Filhotes? *</p>
                <div class="custom-control custom-radio float-left mr-1">
                    <input type="radio" id="filhotes1" name="filhotes" class="custom-control-input" value="1" <?= $dados['flag_filhotes'] == 1 ? 'checked' : ''?>>
                    <label class="custom-control-label" for="filhotes1">Sim</label>
                </div>

                <div class="custom-control custom-radio float-left ml-1">
                    <input type="radio" id="filhotes2" name="filhotes" class="custom-control-input" value="2" <?= $dados['flag_filhotes'] == 2 ? 'checked' : ''?>>
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
                <input id="microchip" type="text" name="numero_microchip" value="<?= $dados['microchip']?>" class="form-control form-control-sm">
            </div>

            <div class="col-sm-12 col-md-3 form-group">
                <label for="data_microchip">Data de implantação</label>
                <input  id="data_microchip" type="text" date-input="d/m/y" name="data_microchip" value="<?= $dados['data_implantacao'] ? date("d/m/Y", strtotime($dados['data_implantacao'])) : "" ?>" class="form-control form-control-sm">
            </div>

            <div class="col-sm-12 col-md-3 form-group">
                <label for="local_implatacao">Local de implantação</label>
                <input id="local_implatacao" type="text" name="local_implatacao" value="<?= $dados['local_implantacao']?>" class="form-control form-control-sm">
            </div>

        </div>

        <input class="btn btn-primary" type="submit" value="Salvar">
        <a class="btn btn-default" href="<?=BASE_URL?>">Cancelar</a>
    </form> 

</div>