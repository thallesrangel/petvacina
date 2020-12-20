<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="PetVacina">
    <meta name="author" content="Thalles Rangel Lopes">
    <title>Petvac | Software para acompanhamento de animais domésticos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./public/css/style.css"/>
    <link rel='icon' href="./public/img/favicon.png" type='image/x-icon' sizes="16x16" />
    <meta name="apple-mobile-web-app-status-bar-style" content="#f8b195">
    <meta name="theme-color" content="#f8b195">
</head>
    <body>
        
    <nav class="navbar navbar-expand-lg bg-white shadow p-3 mb-2 bg-white rounded">
    <a class="navbar-brand logo" href="#"><img class="img-fluid" src="./public/img/logo.png"></a>

    <header class="ml-auto">
        <!-- Responsive -->
        <div class="toggleMenu" onclick="menuToggle()"></div>
        
        <ul class="navbar-nav navigation">
            <li class="nav-item">
                <a class="nav-link" href="http://localhost/petvac/app/adocao">Adoção</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">Saiba Mais</a>
            </li>

            <li class="nav-item">
                <a class="nav-link btn btn-sm btn-primary" href="app/login">Acessar</a>
            </li>

        </ul>
    </header>
    
</nav>

        <div class="container div-banner w-75">
            <div class="row align-items-center">
                <div class="col-md-5">
                    <h1>A principal ferramenta de gestão de animais domésticos</h1>
                    <a class="btn btn-sm btn-secondary" href="app/login">Registre-se Grátis</a>
                </div>

                <div class="col-md-7 d-flex justify-content-center">
                    <img class="img-fluid" src="./public/img/bg.png">
                </div>
            </div>
        </div>
        
        <div class="container text-center">
            <div class="row d-flex justify-content-center">
                <div class="col-sm-6 col-md-8">
                    <h2>Registrar e acompanhar com rapidez.</h2>
                    <p>O PetVac é pensando para que cada animal registrado seja devidamente acompanhando de forma ágil, eficaz e eficiente.</p>
                </div>
            </div>
        </div>

        <div class="container-fluid div-top">
            <div class="row align-items-center justify-content-center">
                <div class="col-sm-12 col-md-7">
                    <img class="img-fluid" src="./public/img/1.png"/>
                </div>

                <div class="col-sm-12 col-md-4">
                    <h3>Animais</h3>
                    <p>Registre e acompanhe vacinas, vermifugos, parasitas, anti-cio, higiene, métricas, peso e mais.</p>
 
                    
                    <h3 class="mt-5">Relatórios</h3>
                    <p>Trás a facilidade de acompanhar todo o histórico do animal.</p>
                </div>
            </div>
        </div>

        <div class="container-fluid div-top">
            <div class="row align-items-center justify-content-center">

                <div class="col-sm-12 col-md-4">
                    <h3>Proprietários</h3>
                    <p>Animais registrados por proprietário, permitindo maior acompnhamento do animal.</p>
                    
                    <h3 class="mt-5">Vacinas</h3>
                    <p>Vacine e tenha todo o histórico de vacinação de seus animais. Permite agendar vacinações sendo notificado na data definida.</p>
                    
                </div>

                <div class="col-sm-12 col-md-7">
                    <img class="img-fluid" src="./public/img/2.png"/>
                </div>
            </div>
        </div>
        
        
        <script type="text/javascript">
        /* Responsive - Define como ativo a classe toggleMenu */
            function menuToggle(){
                const toggleMenu = document.querySelector('.toggleMenu');
                const navigation = document.querySelector('.navigation');
                toggleMenu.classList.toggle('active')
                navigation.classList.toggle('active')
            }
        </script>
    </body>
</html>