<form action="<?=BASE_URL?>cioreport/render" method="POST">
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
    </div>
            <div class="col-2">
                <div class="form-group">
                <span>Data Inicial *</span> 
                <input type="text" name="data_inicial" date-input="d/m/y" class="form-control form-control-sm" required>
                </div>  
            </div>
    
            <div class="col-2">
                <div class="form-group">
                <span>Data Final *</span> 
                <input type="text" name="data_final" date-input="d/m/y" class="form-control form-control-sm" required>
                </div>
            </div>

                <!--
            Ordenar por:
            data Aplicação/Proprietário/Animal
                -->

    <input class="btn btn-primary" type="submit" value="Processar">
</form>

<script>
  $('select[multiple]').multiselect()
</script>