<div class="container">

    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-3">
            <img src="<?=BASE_URL?>assets/img/perfil/padrao.png" width="130" height="130" class="rounded-circle border border-default">
        </div>

        <div class="col-sm-12 col-md-6">
            <h4><?=ucwords($usuario['nome_usuario']) . " ".$usuario['sobrenome_usuario']?></h4>
            <p><a href="#" class="btn btn-sm btn-secondary">Editar perfil</a></p>
            <p>E-mail: <?= $usuario['email_usuario'] ?></p>
            <p>Registrado desde: <?= $usuario['data_registro'] ?></p>
        </div>
    </div>
</div>
