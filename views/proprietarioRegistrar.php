<div class="d-sm-flex align-items-center justify-content-between mb-1 pl-2">
    <h1 class="h3 ml-3 gray-color">Registrar Proprietário</h1>
</div>
<form enctype="multipart/form-data" method="POST" class="p-4" action="<?=BASE_URL?>proprietario/registrar_save">
    <div class="row">
       
        <div class="col-md-3">
            <label for="nome">Nome *</labe>
            <input id="nome" type="text" class="form-control form-control-sm" name="nome_proprietario" required>
        </div>

        <div class="col-md-3">
            <label for="sobrenome">Sobrenome *</labe>
            <input id="sobrenome" type="text" class="form-control form-control-sm" name="sobrenome_proprietario" required>
        </div>

        <div class="col-md-3">
            <label for="identificacao">Data Nascimento *</labe>
            <input  id="identificacao" type="text" date-input="d/m/y" name="data_nascimento" class="form-control form-control-sm" required>
        </div>

        <div class="col-md-3">
            <label for="contato">Contato *</labe>
            <input id="contato" type="text" class="form-control form-control-sm" name="contato" required>
        </div>

    </div>
    
    <div class="row">
        <div class="form-group col-3">
            <label for="email">E-mail *</label>
            <input id="email" type="email" class="form-control form-control-sm" name="email" required>
        </div>
   
        <div class="form-group col-2">
            <label for="uf">Estado UF *</label>
            <input id="uf" type="number" class="form-control form-control-sm" name="endereco_estado" required>
        </div>

        <div class="form-group col-3">
            <label for="cidade">Cidade *</label>
            <input id="cidade" type="number" class="form-control form-control-sm" name="endereco_cidade" required>
        </div>

        <div class="form-group col-3">
            <label for="bairro">Bairro *</label>
            <input id="bairro" type="text" class="form-control form-control-sm" name="endereco_bairro" required>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-3">
            <label for="logradouro">Logradouro *</label>
            <input id="logradouro" type="text" class="form-control form-control-sm" name="endereco_rua" required>
        </div>

        <div class="form-group col-2">
            <label for="numero">Número - Quadra *</label>
            <input id="numero" type="text" class="form-control form-control-sm" name="endereco_numero" required>
        </div>

        <div class="form-group col-3">
            <label for="complemento">Complemento</label>
            <input id="complemento" type="text" class="form-control form-control-sm" name="endereco_complemento">
        </div>

        <div class="form-group col-3">
            <label for="referencia">Ponto de Referência </label>
            <input id="referencia" type="text" class="form-control form-control-sm" name="endereco_referencia">
        </div>
    </div>


   
    <input class="btn btn-primary" type="submit" value="Registrar">
    <a class="btn btn-default" href="<?=BASE_URL?>">Cancelar</a>
</form> 

</div>