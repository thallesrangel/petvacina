<div class="container">

    <div class="row">
        <div class="col-sm-12 col-md-3">
            <img src="<?=BASE_URL?>assets/img/galeria/b2073bc37190e79dc48e61640af2a479.jpg" width="130" height="130" class="rounded-circle border border-default">
        </div>

        <div class="col-sm-12 col-md-6">
            <span><?=$usuario['nome_usuario'] . " ".$usuario['sobrenome_usuario']?></span>
            <a href="#" class="btn btn-sm btn-secondary">Editar perfil</a>
            
        </div>
           
        <div class="col-sm-12 col-md-12 text-center">
            <label for="files" class="btn btn-default">Imagem de Perfil</label>
            <input id="files" type="file"  style="visibility:hidden;" onchange="readURL(this)" class="btn btn-sm btn-default"/>
            <img id="blah" src="<?=BASE_URL?>assets/img/galeria/b2073bc37190e79dc48e61640af2a479.jpg" width="80" height="80" class="rounded-circle border border-default">
        </div>
    </div>
</div>

<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>