<div class="container bg-white rounded h-75">
    <h5 class="pl-3 pt-3 mb-0 h5-title-list">Higiene</h5>

    <?php
        if(empty($lista)) {
            echo '<h6 class="pl-3 pt-3 mb-0">Não há registros.</h6>';
        }
    foreach($lista as $item){
    ?>  
    <a class="list-color-text" href="<?=BASE_URL?>higiene/detalhes/<?=$item['id_animal']?>">
        <div class="card col-2 align-items-center float-left ml-3 mt-3 card-animal">
            <img src="<?=BASE_URL?>assets/img/galeria/<?=$item['url'] == null ? 'padrao.png': $item['url'];?>" width="85" height="85" class="rounded-circle mt-3 mb-2 border border-default">
            <p><?=$item['nome_animal'];?></p>
        </div>
    </a>
    <?php
    }
?>

</div>