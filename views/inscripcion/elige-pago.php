<div class="container mt-5">
    <div class="row pb-5 pt-3">
        <h2 class="mt-5 mx-auto">Por favor, Selecciona Que vas a Pagar:</h2>
        <?php if (isset($_SESSION['student'])) : ?>
            <?php $estudiante = Utils::notPayInscrip($_SESSION['student']->id);
            if ($estudiante) : ?>
                <div class="col-md-5 mx-auto">
                    <div class="portfolio-container">
                        <div class="portfolio-details">
                            <a href="<?= base_url ?>pago/elige_tipo_pago&nombre_pago=matricula">
                                <h2>Matricula</h2>

                        </div>
                        <img src="<?= base_url ?>assets/images/portfolio-11.jpg" class="img-fluid" alt="Portfolio 04">
                        </a>
                    </div>
                </div>
                <div class="col-md-5 mx-auto">
                    <div class="portfolio-container">
                        <div class="portfolio-details">
                            <a href="<?= base_url ?>pago/elige_tipo_pago&nombre_pago=grado">
                                <h2>Derecho a Grado</h2>

                        </div>
                        <img src="<?= base_url ?>assets/images/portfolio-12.jpg" class="img-fluid" alt="Portfolio 04">
                        </a>
                    </div>
                </div>
            <?php else : ?>
                <div class="col-md-4">
                    <div class="portfolio-container">
                        <div class="portfolio-details">
                            <a href="<?= base_url ?>pago/elige_tipo_pago&nombre_pago=inscripcion">
                                <h2 class="text-black">Inscripcion</h2>

                        </div>
                        <img src="<?= base_url ?>assets/images/portfolio-10.jpg" class="img-fluid" alt="Portfolio 03">
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="portfolio-container">
                        <div class="portfolio-details">
                            <a href="<?= base_url ?>pago/elige_tipo_pago&nombre_pago=matricula">
                                <h2>Matricula</h2>

                        </div>
                        <img width="100%" src="<?= base_url ?>assets/images/portfolio-11.jpg" class="img-fluid" alt="Portfolio 04">
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="portfolio-container">
                        <div class="portfolio-details">
                            <a href="<?= base_url ?>pago/elige_tipo_pago&nombre_pago=grado">
                                <h2>Derecho a Grado</h2>

                        </div>
                        <img width="100%" src="<?= base_url ?>assets/images/portfolio-12.jpg" class="img-fluid" alt="Portfolio 04">
                        </a>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</div>