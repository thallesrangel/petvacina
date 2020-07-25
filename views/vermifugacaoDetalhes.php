
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
    
    <div class="row justify-content-md-center mb-2">
        <div class="col-sm-12 col-md-2">
            <img src="<?=BASE_URL?>assets/img/galeria/<?=$dados_animal['url'];?>" width="85" height="85" class="rounded-circle mt-3 mb-2 border border-light">
        </div>

        <div class="col-sm-12 col-md-2 text-sm-center text-md-left">
            <h4 class="m-1 pt-4"><?=$dados_animal['nome_animal'];?></h4>
            <a class="btn btn-sm btn-primary mb-3" href="<?=BASE_URL?>vermifugacao/registrar/<?=$dados_animal['id_animal'];?>">Vermifugar</a>
        </div>
    
    </div>
    
    <h4>Cartão de Vermifugação</h4>

    <?php foreach($lista as $item) { ?>
        
    <div class="row justify-content-md-center mb-2">
        <div class="col-8 border rounded p-3 ml-1">
            <ul class="list-inline">
                <li class="list-inline-item"><p><b>Produto</b></p><?=$item['nome_produto']?></li>
                <li class="list-inline-item"><p><b>Dose</b></p><?=$item['dose']?></li>
                <li class="list-inline-item"><p><b>Peso</b></p><?=$item['peso']?></li>
                <li class="list-inline-item"><p><b>Aplicação</b></p><?=$item['data_aplicacao']?></li>
                <li class="list-inline-item"><p><b>Próxima Dose</b></p><?=$item['data_prox_dose'] == null ? 'Sem renovação' : $item['data_prox_dose']?></li>
                <li class="list-inline-item"><p><b>Médico Veterinário</b></p><?=$item['nome_veterinario'] == null ? 'Indefinido' : $item['nome_veterinario']?></li>
                <li class="list-inline-item"><p><b>CRMV</b></p><?=$item['registro_crmv'] == null ? 'Indefinido' : $item['registro_crmv']?></li>
            </ul>   
        </div>
     
    </div>
   
    <?php } ?>
</div>