
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
            <a class="btn btn-sm btn-primary mb-3" href="<?=BASE_URL?>vacina/registrar/<?=$dados_animal['id_animal'];?>"><i class="icon-white" data-feather="plus"></i> Vacinar</a>
            <a class="btn btn-sm btn-primary mb-3" href="#"><i class="icon-white" data-feather="printer"></i> Imprimir</a>
        </div>
    
    </div>
    
    <h4>Cartão de Vacinação</h4>

    <div class="row justify-content-md-center">
        
        <div class="col-md-10 border rounded bg-white p-2">
            <table class="table table-bordered table-striped  table-sm">
            <thead>
                <tr>
                    <th scope="col">Vacina</th>
                    <th scope="col">Data Aplicação</th>
                    <th scope="col">Data Revacinação</th>
                    <th scope="col">Médico Veterinário</th>
                    <th scope="col">CRMV</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($lista as $item) { ?>
                <tr>
                    <td><?=$item['titulo_vacina']?></td>
                    <td><?=date("d/m/Y", strtotime($item['data_aplicacao']))?></td>
                    <td><?=$item['data_revacinacao'] == null ? 'Sem renovação' : date("d/m/Y", strtotime($item['data_revacinacao']))?></td>
                    <td><?=$item['nome_veterinario'] == null ? 'Veterinário Indefinido' : $item['nome_veterinario']?></td>
                    <td><?=$item['registro_crmv'] == null ? 'Indefinido' : $item['registro_crmv']?></td>

                    <td>
                        <a href="<?=BASE_URL?>vacina/editar/<?=$item['id_vacina']?>"><i class="icon" data-feather="edit"></i><a> 
                        <a href="<?=BASE_URL?>vacina/deletar/<?=$item['id_vacina']?>"><i class="icon-red" data-feather="trash"></i></a>
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