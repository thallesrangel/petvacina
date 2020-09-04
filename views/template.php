<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="PetGestor">
        <meta name="author" content="Thalles Rangel Lopes">
        <title>Pet Gestor</title>
        <link rel="stylesheet" type="text/css" href="<?=BASE_URL?>assets/css/style.css"/>
        <link rel="stylesheet" type="text/css" href="<?=BASE_URL?>assets/css/bootstrap.min.css"/>
        <script
			  src="https://code.jquery.com/jquery-3.5.1.js"
			  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
			  crossorigin="anonymous"></script>
        <script type="text/javascript" src="<?=BASE_URL?>assets/js/script.js"></script>
        <script type="text/javascript" src="<?=BASE_URL?>assets/js/responsive.js"></script>

        <script type="text/javascript" src="<?=BASE_URL?>assets/js/bootstrap.min.js"></script>
        <script src="https://unpkg.com/feather-icons"></script>
        
        <link href="<?=BASE_URL?>assets/css/select2.min.css" rel="stylesheet" />
        <script src="<?=BASE_URL?>assets/js/select2.min.js"></script>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
       
        <script src="<?=BASE_URL?>assets/js/jquery.mask.min.js"></script>
        <link href="<?=BASE_URL?>assets/css/multiselect.css" rel="stylesheet" />
        <script src="<?=BASE_URL?>assets/js/multiselect.min.js"></script>
       
        <!-- SweetAlert2 -->
        <script src="<?=BASE_URL?>assets/js/sweetalert2.all.min.js"></script>
        <link rel="stylesheet" href="<?=BASE_URL?>assets/css/sweetalert2.min.css">

        <link rel='icon' href="<?=BASE_URL?>assets/img/favicon.png" type='image/x-icon' sizes="16x16" />
    </head>
    <body>

    <div class="wrapper">
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion offcanvas-collapse">
            <a class="sidebar-brand d-flex align-items-center justify-content-center">
                <div class="sidebar-brand-text mx-5 m-2">
                    <img width="170px" src="<?=BASE_URL?>/assets/img/logo.png"/> 
                </div>
            
                    <li class="nav-item">
                        <a class="nav-link" href="<?=BASE_URL?>animal">
                        <span><img src="<?= BASE_URL?>assets/img/icon/heart.svg"> Animais</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?=BASE_URL?>vacina">
                        <span><img src="<?= BASE_URL?>assets/img/icon/award.svg"> Vacinas</span>
                        </a>
                    </li>  

                    <li class="nav-item">
                        <a class="nav-link" href="<?=BASE_URL?>vermifugacao">
                        <span><img src="<?= BASE_URL?>assets/img/icon/shield.svg"> Vermifugação</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?=BASE_URL?>parasita">
                        <span><img src="<?= BASE_URL?>assets/img/icon/alert-triangle.svg"> Pulgas e Carrapatos</span>
                        </a>
                    </li> 

                    <li class="nav-item">
                        <a class="nav-link" href="<?=BASE_URL?>anticio">
                        <span><img src="<?= BASE_URL?>assets/img/icon/pocket.svg"> Anti-cio</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?=BASE_URL?>higiene">
                        <span><img src="<?= BASE_URL?>assets/img/icon/scissors.svg"> Higiene</span>
                        </a>
                    </li> 
                    
                    <li class="nav-item">
                        <a class="nav-link" href="<?=BASE_URL?>relatorio">
                        <span><img src="<?= BASE_URL?>assets/img/icon/file-text.svg"> Relatórios</span>
                        </a>
                    </li> 
                    
                    <li class="nav-item">
                        <a class="nav-link" href="<?=BASE_URL?>proprietario">
                        <span><img src="<?= BASE_URL?>assets/img/icon/users.svg"> Proprietários</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?=BASE_URL?>proprietario">
                        <span><img src="<?= BASE_URL?>assets/img/icon/peso.svg"> Peso</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?=BASE_URL?>proprietario">
                        <span><img src="<?= BASE_URL?>assets/img/icon/altura.svg"> Altura</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?=BASE_URL?>proprietario">
                        <span><img src="<?= BASE_URL?>assets/img/icon/fornecedor.svg"> Fornecedor</span>
                        </a>
                    </li>
            </a>
        </ul>


        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                
                <nav class="navbar navbar-expand-lg shadow-sm bg-white mb-4 static-top w-100 ">
             
                    <ul class="list-inline ml-auto">
                        <a class="list-inline-item" href="<?=BASE_URL?>">
                            <i class="icon-gray" width="22" data-feather="home"></i>
                        </a>

                        <a class="list-inline-item mr-3" href="#">
                            <i class="icon-gray" width="22" data-feather="bell"></i>
                        </a>

                       
                        <a class="list-inline-item dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span><?=$_SESSION['nome_usuario']?></span>
                        </a>
                        
                        <div class="list-inline-item dropdown-menu dropdown-menu-right mt-4">
                            <a href="<?=BASE_URL?>usuario/perfil" class="dropdown-item font-14" type="button"><i class="icon-gray-submenu" width="22" data-feather="user"></i> Perfil</a>
                            <a href="<?=BASE_URL?>login/logout" class="dropdown-item font-14" type="button"><i class="icon-gray-submenu" width="22" data-feather="log-out"></i> Sair</a>
                        </div>
                        
            
                    </ul>

                    <!-- BUTTON RESPONSIVO-->
                    <button class="list-inline-item btn btn-sm btn-dark" type="button" id="navToggle" data-toggle="offcanvas">
                            <span>=</span>
                    </button>
                </nav>
                
                
                    <div class="container">
                        <ul class="nav p-2 pl-3 breadcrumb">
                            <li class='nav-item'>
                                <?php $this->addBreadCrumb(); ?>
                            </li> 
                        </ul>
                    </div>
                
                    <div id="body" class="container">
                        <?php
                        require('views/mensagem.php');
                        unset($_SESSION["msg"]);
                        $this->loadViewInTemplate($viewName, $dados);?>
                    </div>
            </div>
        </div>
    </div>

    <script>
        feather.replace()
    </script>
    </body>
</html>