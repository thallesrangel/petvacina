<?php
    $dados = [];
    
    foreach($info as $item ){
        $dados = $item;
    }
?>

<div class="container bg-white rounded h-75">
    <div class="d-sm-flex align-items-center justify-content-between mb-1 pt-2">
        <h4 class="ml-2 gray-color">Editar Fornecedor</h4>
    </div>

    <?php
        $url = explode('/', $_GET['url']);
    ?>

    <form method="POST" class="p-2" action="<?=BASE_URL?>fornecedor/editar_salvar/<?=$url[2];?>">

        <input type="hidden" class="form-control form-control-sm" value="<?= $url[2]; ?>" name="id_fornecedor">

        <div class="row">
        
            <div class="col-md-3 col-sm-12">
                <label for="fornecedor">Fornecedor *</labe>
                <input id="fornecedor" type="text" class="form-control form-control-sm" name="nome_fornecedor" value="<?= $dados['nome_fornecedor'];?>" required>
            </div>

            <div class="col-sm-12 col-md-2">
                <div class="form-group">
                    <span>Fornecedor Tipo *</span>
                    <select class="form-control form-control-sm" name="id_fornecedor_tipo" required>
            
                        <?php
                        foreach($fornecedorTipo as $item){
             
                        if ($item['id_fornecedor_tipo'] == $dados['id_fornecedor_tipo']) {
                                $selected = 'selected';
                            } else {
                                $selected = '';
                            }   
                            echo '<option value="' . $item['id_fornecedor_tipo'] . '" '.$selected.'>' .$item['fornecedor_tipo'] . '</option>';
                        ?>
                        <?php
                        }
                        ?>
                        
                    </select>
                </div>  
            </div>

        </div>

        <input class="btn btn-sm btn-primary" type="submit" value="Salvar">
        <a class="btn btn-sm btn-default" href="<?=BASE_URL?>">Cancelar</a>
    </form> 

</div>