<div class="container">
    <div class="row justify-content-md-center">
        
        <div class="col-md-6 border rounded bg-white p-2">
            <h5 class="p-1 float-left">Proprietários</h5>
            <a href="<?=BASE_URL?>proprietario/registrar" class="btn btn-sm btn-primary float-right mr-4"><span><img src="<?= BASE_URL?>assets/img/icon/plus.svg"> Registrar </span></a>
            <a target="_blank" class="btn btn-sm btn-primary float-right mr-2" href="<?=BASE_URL?>proprietarioreport/render"><span><img src="<?= BASE_URL?>assets/img/icon/printer.svg"> Imprimir </span></a>
            <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($proprietario as $item) { ?>
                <tr>
                <td><?=$item['nome_proprietario'] . " " .$item['sobrenome_proprietario']?></td>
                <td><?=$item['email']?></td>
                    <td>
                        <a target="_blank" href="<?=BASE_URL?>proprietario/detalhes/<?=$item['id_proprietario']?>"><img class="img-fluid" src="<?=BASE_URL?>assets/img/icon/external-link.svg"><a> 
                        <a href="<?=BASE_URL?>proprietario/editar/<?=$item['id_proprietario']?>"><img class="img-fluid" src="<?=BASE_URL?>assets/img/icon/edit.svg"><a> 
                        <a href="<?=BASE_URL?>proprietario/deletar/<?=$item['id_proprietario']?>"><img class="img-fluid" src="<?=BASE_URL?>assets/img/icon/trash.svg"></a>
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