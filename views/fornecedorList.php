<div class="container">
    <div class="row justify-content-md-center">
        
        <div class="col-md-6 border rounded bg-white p-2">
            <h5 class="p-1 float-left">Fornecedores</h5>
            <a href="<?=BASE_URL?>fornecedor/registrar" class="btn btn-sm btn-primary float-right mr-4"><span><img src="<?= BASE_URL?>assets/img/icon/plus.svg"> Registrar </span></a>
            <a target="_blank" class="btn btn-sm btn-primary float-right mr-2" href="<?=BASE_URL?>fornecedorreport/render"><span><img src="<?= BASE_URL?>assets/img/icon/printer.svg"> Imprimir </span></a>
            <table class="table">
            <thead>
                <tr>
                    <th scope="col">Fornecedor</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($fornecedor as $item) { ?>
                <tr>
                <td><?=$item['nome_fornecedor']?></td>
                <td><?=$item['fornecedor_tipo']?></td>
                    <td>
                        <a href="<?=BASE_URL?>fornecedor/editar/<?=$item['id_fornecedor']?>"><img class="img-fluid" src="<?=BASE_URL?>assets/img/icon/edit.svg"><a> 
                        <a href="<?=BASE_URL?>fornecedor/deletar/<?=$item['id_fornecedor']?>"><img class="img-fluid" src="<?=BASE_URL?>assets/img/icon/trash.svg"></a>
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