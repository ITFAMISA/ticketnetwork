<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <title><?= $title ?? 'TicketSound - Venta de Boletos para Conciertos' ?></title>
    
    <!-- Bootstrap core CSS -->
    <link href="/public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="/public/css/fontawesome.css">
    <link rel="stylesheet" href="/public/css/templatemo-woox-travel.css">
    <link rel="stylesheet" href="/public/css/owl.css">
    <link rel="stylesheet" href="/public/css/animate.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
</head>

<body>
    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
            <span class="dot"></span>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="/" class="logo">
                            <img src="/public/images/logo.png" alt="TicketSound">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="/" class="<?= $activePage === 'home' ? 'active' : '' ?>">Inicio</a></li>
                            <li><a href="/nosotros" class="<?= $activePage === 'about' ? 'active' : '' ?>">Nosotros</a></li>
                            <li><a href="/conciertos" class="<?= $activePage === 'concerts' ? 'active' : '' ?>">Conciertos</a></li>
                            <li><a href="/mis-boletos" class="<?= $activePage === 'tickets' ? 'active' : '' ?>">Mis Boletos</a></li>
                            <li><a href="/comprar" class="<?= $activePage === 'purchase' ? 'active' : '' ?>">Comprar</a></li>
                        </ul>   
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->