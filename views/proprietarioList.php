<div class="container">
    <div class="row justify-content-md-center">
        
        <div class="col-md-6 border rounded bg-white p-2">
            <h5 class="p-1 float-left">Proprietários</h5>
            <a href="<?=BASE_URL?>proprietario/registrar" class="btn btn-sm btn-primary float-right mr-4">Registrar</a>
            <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Contato</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($proprietario as $item) { ?>
                <tr>
                <td><?=$item['nome_proprietario'] . " " .$item['sobrenome_proprietario']?></td>
                <td><?=$item['contato']?></td>
                    <td>
                        <a href="<?=BASE_URL?>proprietario/editar/<?=$item['id_proprietario']?>"><i class="icon" data-feather="edit"></i><a> 
                        <a href="<?=BASE_URL?>proprietario/deletar/<?=$item['id_proprietario']?>"><i class="icon-red" data-feather="trash"></i></a>
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