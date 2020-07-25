
<?php
    $dados = [];
    
    foreach($lista as $item ){
        $dados = $item;
    }

    $dados_animal = [];
    
    foreach($animal as $item_animal)
    {
        $dados_animal = $item_animal;
    }
?>  

<div class="container text-center bg-white">
    <img src="<?=BASE_URL?>assets/img/galeria/<?=$dados_animal['url'];?>" width="85" height="85" class="rounded-circle mt-3 mb-2 border border-light">
    <p><?=$dados_animal['nome_animal'];?></p>
    <a class="btn btn-sm btn-primary mb-3" href="<?=BASE_URL?>vacina/registrar/<?=$dados_animal['id_animal'];?>">Vacinar</a>
    <?php foreach($lista as $item) { ?>
        
    <div class="row justify-content-md-center mb-2">
        
        <div class="col-6 text-center border rounded p-3 ml-1">

            <?=$item['titulo_vacina']?> ------
            <?=$item['data_aplicacao']?> ------
            <?=$item['data_revacinacao'] == null ? 'Sem renovação' : $item['data_revacinacao']?>
            <?=$item['nome_veterinario'] == null ? 'Veterinário Indefinido' : $item['nome_veterinario']?>
            <?=$item['registro_crmv'] == null ? 'CRMV Indefinido' : $item['registro_crmv']?>
        </div>
    
    </div>
   
    <?php } ?>
</div>
