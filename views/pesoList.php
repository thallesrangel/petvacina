<div class="container bg-white rounded h-75">
    <h5 class="pl-3 pt-3 mb-0 h5-title-list">Peso do Animal</h5>
  
    <?php
        if(empty($lista)) {
            echo '<h6 class="pl-3 pt-3 mb-0">Não há registros. <a href="'.BASE_URL.'animal/registrar">Clique aqui</a> para registrar um animal.</h6>';
        }
    foreach($lista as $item){
    ?>  
    <a href="<?=BASE_URL?>peso/detalhes/<?=$item['id_animal']?>">
        <div class="card col-sm-12 col-md-2 align-items-center float-left ml-3 mt-3 card-animal">
            <img src="<?=BASE_URL?>assets/img/galeria/<?=$item['url'] == null ? 'padrao.png': $item['url'];?>" width="85" height="85" class="rounded-circle mt-3 mb-2 border border-default">
            <p><?=$item['nome_animal'];?></p>
        </div>
    </a>
    <?php
    }
?>

</div>

<div class="container">
 
    <ul class="pagination">

        <li class="page-item"><a class="page-link" href="<?= BASE_URL;?>peso/?p=1">Primeira</a></li>
            <?php
                for ($pag_ant = $paginaAtual - $max_links; $pag_ant <= $paginaAtual - 1; $pag_ant++){
                    if($pag_ant >= 1){
                        ?>
                    
                        <li class="page-item"><a class="page-link" href="<?= BASE_URL;?>peso/?p=<?= $pag_ant;?>"><?= $pag_ant;?> </a></li>
                        <?php
                    }
                }
            
                echo "<li class='page-item'><strong><span class='page-link'>".$paginaAtual."</span></strong></li>";
            
            for ($pag_dep = $paginaAtual + 1; $pag_dep <= $paginaAtual + $max_links; $pag_dep++){
                
                if($pag_dep <= $paginas){ ?>
                    <li class="page-item"><a class="page-link" href="<?= BASE_URL;?>peso/?p=<?= $pag_dep;?>"> <?= $pag_dep;?></a></li>
                <?php
                }
            }
        ?>

        <li class="page-item"><a class="page-link" href="<?= BASE_URL;?>peso/?p=<?= $paginas;?>"> Última </a></li>
    </ul>
</div>