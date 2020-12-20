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
    <link rel="stylesheet" type="text/css" href="<?=BASE_URL?>/assets/css/public.css"/>
    <link rel='icon' href="<?=BASE_URL?>/assets/img/public/favicon.png" type='image/x-icon' sizes="16x16" />
    <meta name="apple-mobile-web-app-status-bar-style" content="#f8b195">
    <meta name="theme-color" content="#f8b195">
</head>
    <body>
        
    <nav class="navbar navbar-expand-lg bg-white shadow p-3 mb-2 bg-white rounded">
    <a class="navbar-brand logo" href="#"><img class="img-fluid" src="<?=BASE_URL?>/assets/img/public/logo.png"></a>

    <header class="ml-auto">
        <!-- Responsive -->
        <div class="toggleMenu" onclick="menuToggle()"></div>
        
        <ul class="navbar-nav navigation">
            <li class="nav-item">
                <a class="nav-link" href="<?=BASE_URL?>adocao">Adoção</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">Saiba Mais</a>
            </li>

            <li class="nav-item">
                <a class="nav-link btn btn-sm btn-primary" href="<?=BASE_URL?>login">Acessar</a>
            </li>

        </ul>
    </header>
    
</nav>

    <?php $this->loadViewInTemplate($viewName, $dados); ?>
        
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
