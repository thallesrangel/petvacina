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
        <script src="https://unpkg.com/feather-icons"></script>
        
        <link href="<?=BASE_URL?>assets/css/select2.min.css" rel="stylesheet" />
        <script src="<?=BASE_URL?>assets/js/select2.min.js"></script>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
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
                        <a class="nav-link" href="<?=BASE_URL?>proprietario">
                        <span><i class="icon-orange" data-feather="alert-triangle"></i> Pulgas e Carrapatos</span>
                        </a>
                    </li> 

                    <li class="nav-item">
                        <a class="nav-link" href="<?=BASE_URL?>proprietario">
                        <span><i class="icon-blue" data-feather="pocket"></i> Anti-cio</span>
                        </a>
                    </li> 

                    <li class="nav-item">
                        <a class="nav-link" href="<?=BASE_URL?>proprietario">
                        <span><i class="icon-purple" data-feather="users"></i> Proprietários</span>
                        </a>
                    </li> 
            </a>
        </ul>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">

                <nav class="navbar navbar-expand-lg shadow-sm bg-white mb-4 static-top">
                    <a class="nav-link " href="<?=BASE_URL?>">Início</a>
                </nav>
                
                <div>
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