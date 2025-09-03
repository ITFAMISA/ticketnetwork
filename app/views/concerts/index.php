<?php 
$title = 'Conciertos Disponibles - TicketSound';
$activePage = 'concerts';
include '../layouts/header.php'; 
?>

<!-- ***** Main Banner Area Start ***** -->
<section id="section-1">
    <div class="content-slider">
        <input type="radio" id="banner1" class="sec-1-input" name="banner" checked>
        <input type="radio" id="banner2" class="sec-1-input" name="banner">
        <input type="radio" id="banner3" class="sec-1-input" name="banner">
        <input type="radio" id="banner4" class="sec-1-input" name="banner">
        <div class="slider">
            <?php foreach (array_slice($concerts, 0, 4) as $index => $concert): ?>
            <div id="top-banner-<?= $index + 1 ?>" class="banner">
                <div class="banner-inner-wrapper header-text">
                    <div class="main-caption">
                        <h2>Disfruta los Mejores Conciertos del Año:</h2>
                        <h1><?= htmlspecialchars($concert['title']) ?></h1>
                        <div class="border-button">
                            <a href="/conciertos/<?= $concert['id'] ?>">Ver Boletos</a>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="more-info">
                                    <div class="row">
                                        <div class="col-lg-3 col-sm-6 col-6">
                                            <i class="fa fa-calendar"></i>
                                            <h4><span>Fecha:</span><br><?= date('d M Y', strtotime($concert['date'])) ?></h4>
                                        </div>
                                        <div class="col-lg-3 col-sm-6 col-6">
                                            <i class="fa fa-map-marker"></i>
                                            <h4><span>Ubicación:</span><br><?= htmlspecialchars($concert['venue']) ?></h4>
                                        </div>
                                        <div class="col-lg-3 col-sm-6 col-6">
                                            <i class="fa fa-ticket"></i>
                                            <h4><span>Desde:</span><br>$<?= number_format($concert['min_price']) ?></h4>
                                        </div>
                                        <div class="col-lg-3 col-sm-6 col-6">
                                            <div class="main-button">
                                                <a href="/conciertos/<?= $concert['id'] ?>">Comprar Boletos</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <nav>
            <div class="controls">
                <label for="banner1"><span class="progressbar"><span class="progressbar-fill"></span></span><span class="text">1</span></label>
                <label for="banner2"><span class="progressbar"><span class="progressbar-fill"></span></span><span class="text">2</span></label>
                <label for="banner3"><span class="progressbar"><span class="progressbar-fill"></span></span><span class="text">3</span></label>
                <label for="banner4"><span class="progressbar"><span class="progressbar-fill"></span></span><span class="text">4</span></label>
            </div>
        </nav>
    </div>
</section>
<!-- ***** Main Banner Area End ***** -->

<div class="visit-country">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="section-heading">
                    <h2>Próximos Conciertos Disponibles</h2>
                    <p>Descubre los mejores eventos musicales y compra tus boletos de manera segura y rápida.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="items">
                    <div class="row">
                        <?php foreach ($concerts as $concert): ?>
                        <div class="col-lg-12">
                            <div class="item">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-5">
                                        <div class="image">
                                            <img src="<?= $concert['image'] ?>" alt="<?= htmlspecialchars($concert['title']) ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-sm-7">
                                        <div class="right-content">
                                            <h4><?= strtoupper(htmlspecialchars($concert['title'])) ?></h4>
                                            <span><?= date('d F Y', strtotime($concert['date'])) ?></span>
                                            <div class="main-button">
                                                <a href="/conciertos/<?= $concert['id'] ?>">Comprar Boletos</a>
                                            </div>
                                            <p><?= htmlspecialchars($concert['description']) ?></p>
                                            <ul class="info">
                                                <li><i class="fa fa-calendar"></i> <?= date('d M Y', strtotime($concert['date'])) ?></li>
                                                <li><i class="fa fa-map-marker"></i> <?= htmlspecialchars($concert['venue']) ?></li>
                                                <li><i class="fa fa-ticket"></i> Desde $<?= number_format($concert['min_price']) ?></li>
                                            </ul>
                                            <div class="text-button">
                                                <a href="/conciertos/<?= $concert['id'] ?>">Ver Detalles <i class="fa fa-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="call-to-action">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h2>¿Buscas Tu Próximo Concierto?</h2>
                <h4>Reserva Tus Boletos Haciendo Click en el Botón</h4>
            </div>
            <div class="col-lg-4">
                <div class="border-button">
                    <a href="/comprar">Comprar Ahora</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
$additionalJs = '
<script>
    function bannerSwitcher() {
        next = $(".sec-1-input").filter(":checked").next(".sec-1-input");
        if (next.length) next.prop("checked", true);
        else $(".sec-1-input").first().prop("checked", true);
    }

    var bannerTimer = setInterval(bannerSwitcher, 5000);

    $("nav .controls label").click(function() {
        clearInterval(bannerTimer);
        bannerTimer = setInterval(bannerSwitcher, 5000)
    });
</script>';
include '../layouts/footer.php'; 
?>