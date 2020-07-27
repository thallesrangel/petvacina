<div class="container-fluid">
    <p class="pt-1">Animais</p>
    <a href="<?=BASE_URL?>animal/registrar" class="btn btn-sm btn-primary">Registrar</a>
    
    <br><br>
  
    <?php
    foreach($lista as $item){
    ?>  
    <a class="list-color-text" href="<?=BASE_URL?>animal/detalhes/<?=$item['id_animal']?>">
        <div class="card col-2 align-items-center float-left ml-3 mt-3 card-animal">
            <img src="<?=BASE_URL?>assets/img/galeria/<?=$item['url'] == null ? 'padrao.png': $item['url'];?>" width="85" height="85" class="rounded-circle mt-3 mb-2 border border-default">
            <p><?=$item['nome_animal'];?></p>
        </div>
    </a>
    <?php
    }
?>

</div>