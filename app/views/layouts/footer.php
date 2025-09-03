    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright © 2025 <a href="#">TicketSound</a> Company. All rights reserved. 
                    <br>Sistema de Venta de Boletos para Conciertos</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <!-- Bootstrap core JavaScript -->
    <script src="/public/vendor/jquery/jquery.min.js"></script>
    <script src="/public/vendor/bootstrap/js/bootstrap.min.js"></script>

    <script src="/public/js/isotope.min.js"></script>
    <script src="/public/js/owl-carousel.js"></script>
    <script src="/public/js/wow.js"></script>
    <script src="/public/js/tabs.js"></script>
    <script src="/public/js/popup.js"></script>
    <script src="/public/js/custom.js"></script>

    <?php if (isset($additionalJs)): ?>
        <?= $additionalJs ?>
    <?php endif; ?>

</body>
</html>