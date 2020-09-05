<?php
    $dados = [];
    
    foreach($info as $item ){
        $dados = $item;
    }
?>

<div class="container bg-white rounded h-75">
    <div class="d-sm-flex align-items-center justify-content-between mb-1 pt-2">
        <h4 class="ml-2 gray-color">Editar Métrica do Animal</h4>
    </div>

    <?php
        $url = explode('/', $_GET['url']);
    ?>

    <form method="POST" class="p-2" action="<?=BASE_URL?>metrica/editar/<?=$url[2];?>">
        <div class="row">
            
            <input type="hidden" class="form-control form-control-sm" value="<?= $url[2]; ?>" name="id_metrica_animal">
        
            <div class="col-md-3 col-sm-12">
                <label for="altura">Altura do Animal *</labe>
                <input id="altura" type="text" class="form-control form-control-sm quantidade" placeholder="0.000,00" name="altura_animal" value="<?=$dados['altura']?>">
            </div>

            <div class="col-sm-12 col-md-2">
                <div class="form-group">
                    <span>Un Altura *</span>
                    <select class="form-control form-control-sm" name="id_metrica_unidade_altura" required>
                        <?php
                        foreach($unMetrica as $itemun){
             
                        if ($itemun['id_metrica_unidade'] == $dados['id_metrica_unidade_altura']) {
                                $selected = 'selected';
                            } else {
                                $selected = '';
                            }   
                            echo '<option value="' . $itemun['id_metrica_unidade'] . '" '.$selected.'>' .$itemun['metrica_unidade'] . '</option>';
                        ?>
                        <?php
                        }
                        ?>
                    </select>
                </div>  
            </div>

            <div class="col-md-3 col-sm-12">
                <label for="comprimento">Comprimento do Animal *</labe>
                <input id="comprimento" type="text" class="form-control form-control-sm quantidade" placeholder="0.000,00" name="comprimento_animal" value="<?=$dados['comprimento']?>">
            </div>

            <div class="col-sm-12 col-md-2">
                <div class="form-group">
                    <span>Und Comprimento *</span>
                    <select class="form-control form-control-sm" name="id_metrica_unidade_comprimento" required>
                        <?php
                        foreach($unMetrica as $item){
             
                        if ($item['id_metrica_unidade'] == $dados['id_metrica_unidade_comprimento']) {
                                $selected = 'selected';
                            } else {
                                $selected = '';
                            }   
                            echo '<option value="' . $item['id_metrica_unidade'] . '" '.$selected.'>' .$item['metrica_unidade'] . '</option>';
                        ?>
                        <?php
                        }
                        ?>
                    </select>
                </div>  
            </div>

            <div class="col-md-3 col-sm-12">
                <label for="medicao">Data Medição *</labe>
                <input id="medicao" type="text"  date-input="d/m/y" class="form-control form-control-sm" name="data_medicao" value="<?= date("d/m/Y", strtotime($dados['data_medida'])) ?>">
            </div>

            <div class="col-md-3 col-sm-12">
                <label for="data_remedicao">Data Remedição</labe>
                <input id="data_remedicao" type="text"  date-input="d/m/y" class="form-control form-control-sm" name="data_remedicao" value="<?= date("d/m/Y", strtotime($dados['data_remedida'])) ?>">
            </div>
        </div>
     

        <input class="btn btn-sm btn-primary" type="submit" value="Salvar">
        <a class="btn btn-sm btn-default" href="<?=BASE_URL?>">Voltar</a>
    </form> 

</div>