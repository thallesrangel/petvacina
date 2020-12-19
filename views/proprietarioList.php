<div class="container">
    <div class="row justify-content-md-center">
        
        <div class="col-sm-6 col-md-8 border rounded bg-white p-2">
            <h5 class="p-1 float-left">Proprietários</h5>
            <a href="<?=BASE_URL?>proprietario/registrar" class="btn btn-sm btn-primary float-right mr-4"><span><i data-feather="plus"></i> Registrar </span></a>
            <a target="_blank" class="btn btn-sm btn-primary float-right mr-2" href="<?=BASE_URL?>proprietarioreport/render"><span><i data-feather="printer"></i> Imprimir </span></a>
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
                        <a target="_blank" href="<?=BASE_URL?>proprietario/detalhes/<?=$item['id_proprietario']?>"><i data-feather="external-link"></i><a> 
                        <a href="<?=BASE_URL?>proprietario/editar/<?=$item['id_proprietario']?>"><i data-feather="edit"></i><a> 
                        <a href="<?=BASE_URL?>proprietario/deletar/<?=$item['id_proprietario']?>"><i data-feather="trash"></i></a>
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