
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
            <a class="btn btn-sm btn-primary mb-3" href="<?=BASE_URL?>peso/registrar/<?=$dados_animal['id_animal'];?>"><span><img src="<?= BASE_URL?>assets/img/icon/plus.svg"> Registrar </span></a>
            <a class="btn btn-sm btn-primary mb-3 disabled" href="#"><span><img src="<?= BASE_URL?>assets/img/icon/printer.svg"> Imprimir </span></a>
        </div>
    
    </div>
    
    <h4>Cartão Peso do Animal</h4>

    <div class="row justify-content-md-center">
        
        <div class="col-md-10 border rounded bg-white p-2">
            <table class="table table-bordered table-striped table-responsive-sm">
            <thead>
                <tr>
                    <th scope="col">Peso</th>
                    <th scope="col">Pesagem</th>
                    <th scope="col">Repesagem</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($lista as $item) { ?>
                <tr>
                    <td><span class="quantidade"><?=$item['peso']?></span> <?=$item['peso_unidade']?></td>
                    <td><?=date("d/m/Y", strtotime($item['data_pesagem']))?></td>
                    <td><?=$item['data_repesagem'] == null ? 'Sem repesagem' : date("d/m/Y", strtotime($item['data_repesagem']))?></td>
                    <td>
                        <a href="<?=BASE_URL?>peso/editar/<?=$item['id_peso_animal']?>"><img class="img-fluid" src="<?=BASE_URL?>assets/img/icon/edit.svg"><a> 
                        <a href="<?=BASE_URL?>peso/deletar/<?=$item['id_peso_animal']?>"><img class="img-fluid" src="<?=BASE_URL?>assets/img/icon/trash.svg"></a>
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