<div class="container bg-white rounded h-75">
    <div class="d-sm-flex align-items-center justify-content-between mb-1 pt-2">
        <h4 class="ml-2 gray-color">Registrar Espécie</h4>
    </div>

    <form method="POST" class="p-2" action="<?=BASE_URL?>animalespecie/registrar_save">
        <div class="row">
        
            <div class="col-md-4 col-sm-12">
                <label for="especie">Nome da Espécie *</labe>
                <input id="especie" type="text" class="form-control form-control-sm" name="nome_especie" required>
            </div>

        </div>

        <input class="btn btn-sm btn-primary" type="submit" value="Registrar">
        <a class="btn btn-sm btn-default" href="<?=BASE_URL?>">Cancelar</a>
    </form> 
</div>