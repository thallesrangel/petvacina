<?php
    $dados = [];
    
    foreach($info as $item ){
        $dados = $item;
    }
?>

<div class="container bg-white rounded h-75">
    <div class="d-sm-flex align-items-center justify-content-between mb-1 pt-2">
        <h4 class="ml-2 gray-color">Editar Espécie</h4>
    </div>

    <?php
        $url = explode('/', $_GET['url']);
    ?>

    <form method="POST" class="p-2" action="<?=BASE_URL?>animalespecie/editar_salvar/<?=$url[2];?>">

        <input type="hidden" class="form-control form-control-sm" value="<?= $url[2]; ?>" name="id_especie">

        <div class="row">
        
            <div class="col-md-3 col-sm-12">
                <label for="especie">Espécie de Animal *</labe>
                <input id="especie" type="text" class="form-control form-control-sm" name="nome_especie" value="<?= $dados['nome_especie'];?>" required>
            </div>
        </div>

        <input class="btn btn-sm btn-primary" type="submit" value="Salvar">
        <a class="btn btn-sm btn-default" href="<?=BASE_URL?>">Cancelar</a>
    </form> 

</div>