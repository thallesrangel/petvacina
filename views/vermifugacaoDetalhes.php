
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
            <img src="<?=BASE_URL?>assets/img/galeria/<?=$dados_animal['url'] == null ? 'padrao.png': $dados_animal['url'];?>" width="100" height="100" class="rounded-circle mt-3 mb-2 border border-light">
        </div>

        <div class="col-sm-12 col-md-3 text-sm-center text-md-left">
            <h4 class="m-1 pt-4"><?=$dados_animal['nome_animal'];?></h4>
            <a class="btn btn-sm btn-primary mb-3" href="<?=BASE_URL?>vermifugacao/registrar/<?=$dados_animal['id_animal'];?>"><img class="img-fluid" src="<?=BASE_URL?>assets/img/icon/plus.svg"> Vermifugar</a>
            <a class="btn btn-sm btn-primary mb-3" href="#"><img class="img-fluid" src="<?=BASE_URL?>assets/img/icon/printer.svg">Imprimir</a>
        </div>
    
    </div>
    
    <h4>Cartão de Vermifugação</h4>

    <div class="row justify-content-md-center">
        
        <div class="col-md-10 border rounded bg-white p-2">
            <table class="table table-bordered table-striped table-responsive-sm">
            <thead>
                <tr>
                    <th scope="col">Produto</th>
                    <th scope="col">Dose (ml)</th>
                    <th scope="col">Peso</th>
                    <th scope="col">Aplicação</th>
                    <th scope="col">Reaplicação</th>
                    <th scope="col">Veterinário</th>
                    <th title="Conselho Regional de Medicina Veterinária" scope="col">CRMV</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($lista as $item) { ?>
                <tr>
                    <td><?=$item['nome_produto']?></td>
                    <td class="quantidade"><?=$item['dose']?></td>
                    <td><span class="quantidade"><?=$item['peso']?></span> <?=$item['peso_unidade']?></td>
                    <td><?=date("d/m/Y", strtotime($item['data_aplicacao']))?></td>
                    <td><?=$item['data_prox_dose'] == null ? 'Não' : date("d/m/Y", strtotime($item['data_prox_dose']))?></td>
                    <td><?=$item['nome_veterinario'] == null ? 'Indefinido' : $item['nome_veterinario']?></td>
                    <td><?=$item['registro_crmv'] == null ? 'Indefinido' : $item['registro_crmv']?></td>
                    <td>
                        <a href="<?=BASE_URL?>vermifugacao/editar/<?=$item['id_vermifugacao']?>"><img class="img-fluid" src="<?=BASE_URL?>assets/img/icon/edit.svg"><a> 
                        <a href="<?=BASE_URL?>vermifugacao/deletar/<?=$item['id_vermifugacao']?>"><img class="img-fluid" src="<?=BASE_URL?>assets/img/icon/trash.svg"></a>
                    </td>
                </tr>
            <?php
                }
            ?>
            </tbody>
            </table>
        </div>
    </div>
</div>