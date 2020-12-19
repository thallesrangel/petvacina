<div class="container">
    <div class="row justify-content-md-center">
        
        <div class="col-md-6 border rounded bg-white p-2">
            <h5 class="p-1 float-left">Raça</h5>
            <a href="<?=BASE_URL?>animalraca/registrar" class="btn btn-sm btn-primary float-right mr-4"><span><img src="<?= BASE_URL?>assets/img/icon/plus.svg"> Registrar </span></a>
            <table class="table">
            <thead>
                <tr>
                    <th scope="col">Espécie</th>
                    <th scope="col">Raça</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($lista as $item) { ?>
                <tr>
                <td><?=$item['nome_especie']?></td>
                <td><?=$item['nome_raca']?></td>
                    <td>
                        <?php
                        if ($item['flag_padrao'] == 1 ) { ?>

                            <img style="opacity: 0.3" class="img-fluid" src="<?=BASE_URL?>assets/img/icon/edit.svg">
                            <img style="opacity: 0.3" class="img-fluid" src="<?=BASE_URL?>assets/img/icon/trash.svg">

                        <?php } else {?>

                            <a href="<?=BASE_URL?>animalraca/editar/<?=$item['id_raca']?>"><img class="img-fluid" src="<?=BASE_URL?>assets/img/icon/edit.svg"><a> 
                            <a href="<?=BASE_URL?>animalraca/deletar/<?=$item['id_raca']?>"><img class="img-fluid" src="<?=BASE_URL?>assets/img/icon/trash.svg"></a>
                        <?php } ?>
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