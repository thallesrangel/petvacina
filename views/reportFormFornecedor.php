<form action="<?=BASE_URL?>fornecedorreport/render" method="POST">
    <div class="col-3">
        <div class="form-group">
            <span>Tipo de Fornecedor</span> 
            <select class="form-control form-control-sm" name="fornecedor_tipo[]" multiple required>
            <?php

            foreach ($fornecedor_tipo as $item) {
                $id_fornecedor_tipo =  $item['id_fornecedor_tipo'];
                $nome_fornecedor_tipo =  ucwords($item['fornecedor_tipo']);
            ?>

            <option value="<?=$id_fornecedor_tipo?>"> <?=$nome_fornecedor_tipo?> </option>
            <?php }?>
            </select>
        </div>  
            <input class="btn btn-primary" type="submit" value="Processar">
    </div>

</form>

<script>
  $('select[multiple]').multiselect()
</script>