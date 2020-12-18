<?php
    $dados = [];
    
    foreach($lista as $item ){
        $dados = $item;
    }
?>

<div class="container">

    <div class="p-md-5 bg-white">
    <div class="p-md-2 border border-radius">
    <div class="row p-3">
        <div class="col-sm-12 col-md-3 text-center">
            <img src="<?=BASE_URL?>assets/img/galeria/<?=$item['url'] == null ? 'padrao.png': $item['url'];?>" width="120" height="120" class="rounded-circle mt-3 mb-2 border border-light">
           <p><?=$dados['nome_animal']?></p>

           <a href="<?=BASE_URL?>animal/editar/<?=$dados['id_animal']?>"><img class="img-fluid" src="<?=BASE_URL?>assets/img/icon/edit.svg"><a> 
            <a href="<?=BASE_URL?>animal/deletar/<?=$dados['id_animal']?>"><img class="img-fluid" src="<?=BASE_URL?>assets/img/icon/trash.svg"></a>
        </div>

        <div class="col-sm-12 col-md-3 pt-4">
            <p class="m-1"><b>Identificação:</b></span> <?=$dados['identificacao_animal'] ? $dados['identificacao_animal'] : "N/D" ?></p>  
            <p class="m-1"><b>Nascimento:</b></span> <?= $dados['nascimento_animal'] == "" ? "N/D" : implode('/', array_reverse(explode('-', $dados['nascimento_animal'])));?></p>
            <p class="m-1"><b>Espécie:</b></span> <?=$dados['nome_especie']?></p>
            <p class="m-1"><b>Raça:</b></span> <?=$dados['nome_raca']?></p>
            <p class="m-1"><b>Filhotes:</b></span> <?=$dados['flag_filhotes'] == 1 ? 'Sim' : 'Não'?></p>
        </div>

        <div class="col-sm-12 col-md-3 pt-4">
           
            <p class="m-1"><b>Proprietário:</b></span> <?=$dados['nome_proprietario']?></p>
            <p class="m-1"><b>Sexo:</b></span> <?=$dados['sexo'] == 1 ? 'Macho' : 'Fêmea'?></p>
            <p class="m-1"><b>Castrado:</b></span> <?=$dados['flag_castrado'] == 1 ? 'Sim' : 'Não'?></p>
            <p class="m-1"><b>Pelagem:</b></span> <?=$dados['pelagem']?></p>
            <p class="m-1"><b>Data Registro:</b></span>  <?= implode('/', array_reverse(explode('-', $dados['data_registro'])));?></p>
            
        </div>

        <?php if(isset($dados['microchip'])) { ?>
        <div class="col-sm-12 col-md-3 pt-4">
            <p class="m-0"><b>Microchip:</b></span> <?=$dados['microchip']?></p>
            <p class="m-0"><b>Data Implantação:</b></span> <?= $dados['data_implantacao'] ? implode('/', array_reverse(explode('-', $dados['data_implantacao']))) : "";?></p>
            <p class="m-0"><b>Local Implantação:</b></span> <?=$dados['local_implantacao']?></p>
        </div>
        <?php } ?>

    
    </div>

    <div class="col-sm-12 row justify-content-center">
        <a class="btn btn-sm btn-primary ml-2" href="<?=BASE_URL."vacina/detalhes/".$dados['id_animal']?>">Cartão de Vacinação</a>
        <a class="btn btn-sm btn-primary ml-2" href="<?=BASE_URL."vermifugacao/detalhes/".$dados['id_animal']?>">Cartão de Vermifugação</a>
    </div>
    </div>
    </div>
</div>