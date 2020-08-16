
<div class="container">
 
    <ul class="pagination">

        <li class="page-item"><a class="page-link" href="<?= BASE_URL;?>animal/?p=1">Primeira</a></li>
            <?php
                for ($pag_ant = $paginaAtual - $max_links; $pag_ant <= $paginaAtual - 1; $pag_ant++){
                    if($pag_ant >= 1){
                        ?>
                    
                        <li class="page-item"><a class="page-link" href="<?= BASE_URL;?>animal/?p=<?= $pag_ant;?>"><?= $pag_ant;?> </a></li>
                        <?php
                    }
                }
            
                echo "<li class='page-item'><strong><span class='page-link'>".$paginaAtual."</span></strong></li>";
            
            for ($pag_dep = $paginaAtual + 1; $pag_dep <= $paginaAtual + $max_links; $pag_dep++){
                
                if($pag_dep <= $paginas){ ?>
                    <li class="page-item"><a class="page-link" href="<?= BASE_URL;?>animal/?p=<?= $pag_dep;?>"> <?= $pag_dep;?></a></li>
                <?php
                }
            }
        ?>

        <li class="page-item"><a class="page-link" href="<?= BASE_URL;?>animal/?p=<?= $paginas;?>"> Última </a></li>
    </ul>
</div>
