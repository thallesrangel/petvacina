<?php
    $dados = [];
    
    foreach($lista as $item ){
        $dados = $item;
    }
?>

<div class="container">

    <div class="p-md-5 bg-white">
    <div class="p-md-2 border">
    <div class="row p-1">
        <div class="col-3 text-center">
            <img src="<?=BASE_URL?>assets/img/galeria/<?=$item['url'] == null ? 'padrao.png': $item['url'];?>" width="120" height="120" class="rounded-circle mt-3 mb-2 border border-light">
           <p><?=$dados['nome_animal']?></p>
        </div>
        
        <div class="col-5">



        <p class="m-0"><b>Identificação:</b></span> <?=$dados['identificacao_animal']?></p>  
        <p class="m-0"><b>Nascimento:</b></span> <?= implode('/', array_reverse(explode('-', $dados['data_nascimento'])));?></p>
        <p class="m-0"><b>Espécie:</b></span> <?=$dados['nome_especie']?></p>
        <p class="m-0"><b>Raça:</b></span> <?=$dados['raca']?></p>
        <p class="m-0"><b>Sexo:</b></span> <?=$dados['sexo'] == 1 ? 'Masculino' : 'Feminino'?></p>
        <p class="m-0"><b>Pelagem:</b></span> <?=$dados['pelagem']?></p>
        <p class="m-0"><b>Proprietário:</b></span> <?=$dados['nome_proprietario']?></p>
        <p class="m-0"><b>Data Registro:</b></span>  <?= implode('/', array_reverse(explode('-', $dados['data_registro'])));?></p>
        </div>

    </div>

    <div class="row">
        <div class="col-12">
            <p class="m-0"><b>Microchip:</b></span> <?=$dados['microchip']?></p>
            <p class="m-0"><b>Data Implantação:</b></span> <?= implode('/', array_reverse(explode('-', $dados['data_implementacao'])));?></p>
            <p class="m-0"><b>Local Implantação:</b></span> <?=$dados['local_implementacao']?></p>
        </div>

        <a class="btn btn-primary" href="<?=BASE_URL."vacina/detalhes/".$dados['id_animal']?>">Cartão de Vacinação</a>
        
        <a class="btn btn-primary" href="<?=BASE_URL."vermifugacao/detalhes/".$dados['id_animal']?>">Cartão de Vermifugação</a>
    </div>
    </div>
    </div>
</div>