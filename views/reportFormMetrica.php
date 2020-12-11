<form action="<?=BASE_URL?>metricareport/render" method="POST">
    <div class="col-3">
        <div class="form-group">
            <span>Proprietário</span> 
            <select class="form-control form-control-sm" name="proprietario[]" multiple required>
            <?php

            foreach ($proprietarios as $proprietario) {
                $id_proprietario =  $proprietario['id_proprietario'];
                $nome_proprietario =  ucwords($proprietario['nome_proprietario']);
            ?>

            <option value="<?=$id_proprietario?>"> <?=$nome_proprietario?> </option>
            <?php }?>
            </select>
        </div>  
            <input class="btn btn-primary" type="submit" value="Processar">
    </div>
    
</form>

<script>
  $('select[multiple]').multiselect()
</script>