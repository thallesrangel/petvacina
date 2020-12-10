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
                <label for="produto">Produto *</labe>
                <input id="produto" type="text" class="form-control form-control-sm" value="<?= $dados['nome_produto']?>" name="nome_produto">
            </div>

            <div class="col-md-3">
                <label for="dose">Dose aplicada (ml) *</labe>
                <input id="dose" type="text" class="form-control form-control-sm quantidade" value="<?= $dados['dose'] ?>" name="dose">
            </div>

            <div class="col-md-3">
                <label for="peso">Peso do Animal *</labe>
                <input id="peso" type="text" class="form-control form-control-sm quantidade" value="<?= $dados['peso'] ?>" name="peso_animal">
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <span>Unidade Peso *</span>
                    <select class="form-control form-control-sm" name="id_peso_unidade" required>
                        <?php
                        foreach($unPeso as $item){
             
                        if ($idFornecedorBD == $idFornecedor) {
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
        </div>

        <div class="row">

            <div class="col-md-3">
                <label for="aplicacao">Data Aplicação *</labe>
                <input id="aplicacao" type="text"  date-input="d/m/y" class="form-control form-control-sm" value="<?= date("d/m/Y", strtotime($dados['data_aplicacao'])) ?>" name="data_aplicacao">
            </div>

            <div class="col-md-3">
                <label for="data_prox_dose">Próxima Dose</labe>
                <input id="data_prox_dose" type="text"  date-input="d/m/y" class="form-control form-control-sm" value="<?= date("d/m/Y", strtotime($dados['data_prox_dose'])) ?>" name="data_prox_dose">
            </div>

            <div class="col-md-3">
                <label for="veterinario">Médico Veterinário</labe>
                <input id="veterinario" type="text" class="form-control form-control-sm" value="<?= $dados['nome_veterinario'] ?>" name="nome_veterinario">
            </div>

            <div class="col-md-2">
                <label for="registro_crmv">Registro CRMV</labe>
                <input id="registro_crmv" type="text" class="form-control form-control-sm" value="<?= $dados['registro_crmv'] ?>" name="registro_crmv">
            </div>

        </div>

        <input class="btn btn-primary" type="submit" value="Salvar">
        <a class="btn btn-default" href="<?=BASE_URL?>">Cancelar</a>
    </form> 

</div>