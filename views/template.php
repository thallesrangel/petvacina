<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="PetVacina">
        <meta name="author" content="Thalles Rangel Lopes">
        <title>Pet Vacina</title>
        <link rel="stylesheet" type="text/css" href="<?=BASE_URL?>assets/css/style.css"/>
        <link rel="stylesheet" type="text/css" href="<?=BASE_URL?>assets/css/bootstrap.min.css"/>
        <script
			  src="https://code.jquery.com/jquery-3.5.1.js"
			  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
			  crossorigin="anonymous"></script>
        <script type="text/javascript" src="<?=BASE_URL?>/assets/js/script.js"></script>
        <script type="text/javascript" src="<?=BASE_URL?>/assets/js/bootstrap.min.js"></script>
        <script src="https://unpkg.com/feather-icons"></script>
        
        <link href="<?=BASE_URL?>assets/css/select2.min.css" rel="stylesheet" />
        <script src="<?=BASE_URL?>assets/js/select2.min.js"></script>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <script src="<?=BASE_URL?>assets/js/jquery.mask.min.js"></script>
    </head>
    <body>

    <div class="wrapper">
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion">
            <a class="sidebar-brand d-flex align-items-center justify-content-center">
                <div class="sidebar-brand-text mx-5 shadow-sm">
                    <img width="170px" src="<?=BASE_URL?>/assets/img/logo.png"/> 
                </div>
            
                    <li class="nav-item">
                        <a class="nav-link" href="<?=BASE_URL?>animal">
                        <span> <i class="icon-red" data-feather="heart"></i> Animais</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?=BASE_URL?>vacina">
                        <span><i class="icon-yellow" data-feather="award"></i> Vacinas</span>
                        </a>
                    </li>  

                    <li class="nav-item">
                        <a class="nav-link" href="<?=BASE_URL?>vermifugacao">
                        <span><i class="icon-green" data-feather="shield"></i> Vermifugação</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?=BASE_URL?>parasita">
                        <span><i class="icon-orange" data-feather="alert-triangle"></i> Pulgas e Carrapatos</span>
                        </a>
                    </li> 

                    <li class="nav-item">
                        <a class="nav-link" href="<?=BASE_URL?>anticio">
                        <span><i class="icon-blue" data-feather="pocket"></i> Anti-cio</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?=BASE_URL?>higiene">
                        <span><i class="icon-high-blue" data-feather="scissors"></i> Higiene</span>
                        </a>
                    </li> 
                    
                    <li class="nav-item">
                        <a class="nav-link" href="<?=BASE_URL?>relatorio">
                        <span><i class="icon-green" data-feather="file-text"></i> Relatórios</span>
                        </a>
                    </li> 
                    
                    <li class="nav-item">
                        <a class="nav-link" href="<?=BASE_URL?>proprietario">
                        <span><i class="icon-yellow" data-feather="users"></i> Proprietários</span>
                        </a>
                    </li>
            </a>
        </ul>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">

                <nav class="navbar navbar-expand-lg shadow-sm bg-white mb-4 static-top">
                
                    <ul class="navbar-nav ml-auto">

                        <a class="nav-link" href="<?=BASE_URL?>">
                            <i class="icon-gray" width="22" data-feather="home"></i>
                        </a>

                        <a class="nav-link mr-3" href="#">
                            <i class="icon-gray" width="22" data-feather="bell"></i>
                        </a>

                        <div class="nav-link btn-group">
                        <a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span><?=$_SESSION['nome_usuario']?></span>
                        </a>
                        
                        <div class="dropdown-menu dropdown-menu-right mt-4">
                            <a href="<?=BASE_URL?>usuario/perfil" class="dropdown-item font-14" type="button"><i class="icon-gray-submenu" width="22" data-feather="user"></i> Perfil</a>
                            <a href="<?=BASE_URL?>configuracao" class="dropdown-item font-14" type="button"><i class="icon-gray-submenu" width="22" data-feather="settings"></i> Configurações</a>
                            <a href="<?=BASE_URL?>login/logout" class="dropdown-item font-14" type="button"><i class="icon-gray-submenu" width="22" data-feather="log-out"></i> Sair</a>
                        </div>
                        </div>
                    </ul>
                </nav>
                
                
                    <div class="container">
                        <ul class="nav p-2 pl-3 breadcrumb">
                            <li class='nav-item'>
                                <?php $this->addBreadCrumb(); ?>
                            </li> 
                        </ul>
                    </div>
                
                    <div class="container">
                        <?php $this->loadViewInTemplate($viewName, $dados);?>
                    </div>
            </div>
        </div>
    </div>

    <script>
        feather.replace()
    </script>
    </body>
</html>