<?php
    $dados = [];
    
    foreach($info as $item ){
        $dados = $item;
    }
?>

<div class="container bg-white rounded h-75">
    <div class="d-sm-flex align-items-center justify-content-between mb-1 pt-2">
        <h4 class="ml-2 gray-color">Editar Proprietário</h4>
    </div>

    <?php
        $url = explode('/', $_GET['url']);
    ?>

    <form enctype="multipart/form-data" method="POST" class="p-2" action="<?=BASE_URL?>proprietario/editar/<?=$url[2];?>">
        <div class="row">
            <input type="hidden" class="form-control form-control-sm" value="<?= $url[2] ?>" name="id_proprietario">
            <div class="col-md-3">
                <label for="nome">Nome *</labe>
                <input id="nome" type="text" class="form-control form-control-sm" value="<?= $dados['nome_proprietario']?>" name="nome_proprietario" required>
            </div>

            <div class="col-md-3">
                <label for="sobrenome">Sobrenome *</labe>
                <input id="sobrenome" type="text" class="form-control form-control-sm" value="<?= $dados['sobrenome_proprietario']?>" name="sobrenome_proprietario" required>
            </div>

            <div class="col-md-3">
                <label for="identificacao">Data Nascimento</labe>
                <input  id="identificacao" type="text" date-input="d/m/y" value="<?= $dados['data_nascimento'] ? date("d/m/Y", strtotime($dados['data_nascimento'])) : "" ?>" name="data_nascimento" class="form-control form-control-sm">
            </div>

            <div class="col-md-3">
                <label for="contato">Contato</labe>
                <input id="contato" type="text" class="form-control form-control-sm" value="<?= $dados['contato']?>" name="contato">
            </div>

        </div>
        
        <div class="row">
            <div class="form-group col-3">
                <label for="email">E-mail *</label>
                <input id="email" type="email" class="form-control form-control-sm" value="<?= $dados['email']?>" name="email" required>
            </div>
    
    
            <div class="col-sm-12 col-md-3">
                <label for="estado">Estado *</label>
                
                <select class="form-control form-control-sm js-select" name="endereco_estado" onchange="pegarCidades(this)" required >
                    <?php
                    foreach($estado as $item){

                        if ($item['id_estado'] == $dados['id_estado']) {
                                $selected = 'selected';
                            } else {
                                $selected = '';
                            }   
                            echo '<option value="' . $item['id_estado'] . '" '.$selected.'>' .$item['nome_estado'] . '</option>';
                        }?>
                </select>
            </div>
    
            <div class="col-sm-12 col-md-3">
                        <label for="cidade">Cidade *</label>
                        <select id="cidade" class="form-control form-control-sm js-select" name="endereco_cidade" required >
                        </select>
                    </div>

            <div class="form-group col-3">
                <label for="bairro">Bairro </label>
                <input id="bairro" type="text" class="form-control form-control-sm" value="<?= $dados['endereco_bairro']?>" name="endereco_bairro">
            </div>
        </div>

        <div class="row">
            <div class="form-group col-3">
                <label for="logradouro">Logradouro </label>
                <input id="logradouro" type="text" class="form-control form-control-sm" value="<?= $dados['endereco_rua']?>" name="endereco_rua">
            </div>

            <div class="form-group col-2">
                <label for="numero">Número - Quadra</label>
                <input id="numero" type="text" class="form-control form-control-sm" value="<?= $dados['endereco_numero']?>" name="endereco_numero">
            </div>

            <div class="form-group col-3">
                <label for="complemento">Complemento</label>
                <input id="complemento" type="text" class="form-control form-control-sm" value="<?= $dados['endereco_complemento']?>" name="endereco_complemento">
            </div>

            <div class="form-group col-3">
                <label for="referencia">Ponto de Referência </label>
                <input id="referencia" type="text" class="form-control form-control-sm" value="<?= $dados['endereco_referencia']?>" name="endereco_referencia">
            </div>
        </div>


    
        <input class="btn btn-sm btn-primary" type="submit" value="Registrar">
        <a class="btn btn-sm  btn-default" href="<?=BASE_URL?>">Cancelar</a>
    </form> 
    <script type="text/javascript">var BASE_URL = '<?php echo BASE_URL.'proprietario'; ?>';</script>
</div>