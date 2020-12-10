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
                        <select class="form-control form-control-sm" name="id_especie" required>
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


        </div>

        <input class="btn btn-primary" type="submit" value="Salvar">
        <a class="btn btn-default" href="<?=BASE_URL?>">Cancelar</a>
    </form> 

</div>