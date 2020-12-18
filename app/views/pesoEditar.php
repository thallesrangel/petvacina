<?php
    $dados = [];
    
    foreach($info as $item ){
        $dados = $item;
    }
?>

<div class="container bg-white rounded h-75">
    <div class="d-sm-flex align-items-center justify-content-between mb-1 pt-2">
        <h4 class="ml-2 gray-color">Editar Peso do Animal</h4>
    </div>

    <?php
        $url = explode('/', $_GET['url']);
    ?>

    <form method="POST" class="p-2" action="<?=BASE_URL?>peso/editar/<?=$url[2];?>">
        <div class="row">

            <input type="hidden" class="form-control form-control-sm" value="<?= $url[2]; ?>" name="id_peso_animal">

            <div class="col-md-3 col-sm-12">
                <label for="peso">Peso do Animal *</labe>
                <input id="peso" type="text" class="form-control form-control-sm quantidade" name="peso_animal" value="<?=$item['peso']?>">
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <span>Unidade Peso *</span>
                    <select class="form-control form-control-sm" name="id_peso_unidade" required>
                        <?php
                        foreach($unPeso as $item){
             
                        if ($item['id_peso_unidade'] == $dados['id_peso_unidade']) {
                                $selected = 'selected';
                            } else {
                                $selected = '';
                            }   
                            echo '<option value="' . $item['id_peso_unidade'] . '" '.$selected.'>' .$item['peso_unidade'] . '</option>';
                        ?>
                        <?php
                        }
                        ?>
                    </select>
                </div>  
            </div>


            <div class="col-md-3 col-sm-12">
                <label for="aplicacao">Pesagem *</labe>
                <input id="aplicacao" type="text"  date-input="d/m/y" class="form-control form-control-sm" name="data_pesagem" value="<?= date("d/m/Y", strtotime($dados['data_pesagem'])) ?>">
            </div>

            <div class="col-md-3 col-sm-12">
                <label for="data_prox_dose">Repesagem</labe>
                <input id="data_prox_dose" type="text"  date-input="d/m/y" class="form-control form-control-sm" name="data_repesagem" value="<?= $dados['data_repesagem'] == "" ? "" : date("d/m/Y", strtotime($dados['data_repesagem'])) ?>">
            </div>
        </div>
     

        <input class="btn btn-primary" type="submit" value="Registrar">
        <a class="btn btn-default" href="<?=BASE_URL?>">Cancelar</a>
    </form> 

</div>