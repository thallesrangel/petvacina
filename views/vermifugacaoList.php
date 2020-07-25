<div class="container-fluid">
    <span class="pt-1">Vermifugação</span>
    
    <br><br>
  
    <?php
    foreach($lista as $item){
    ?>  
    <a href="<?=BASE_URL?>vermifugacao/detalhes/<?=$item['id_animal']?>">
        <div class="card col-2 align-items-center float-left ml-3 mt-3 card-animal">
            <img src="<?=BASE_URL?>assets/img/galeria/<?=$item['url'] == null ? 'padrao.png': $item['url'];?>" width="85" height="85" class="rounded-circle mt-3 mb-2 border border-default">
            <p><?=$item['nome_animal'];?></p>
        </div>
    </a>
    <?php
    }
?>

</div>