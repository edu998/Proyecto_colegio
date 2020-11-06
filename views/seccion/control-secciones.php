<div class="container mt-5">
    <h2 class="py-4 d-inline-block mt-5"># Control de Secciones del Institute Academy</h2>
    
    <form class="form-inline pb-3 my-lg-0" action="<?=base_url?>seccion/buscador_nivel" method="POST">
    <h4>Ordenar por:</h4>
    <div class="form-group ml-3">
            <label for="exampleFormControlSelect2">Niveles:</label>
            <select class="form-control p-0 ml-1" name="nivel_id" id="exampleFormControlSelect2">
                <?php $niveles = Utils::showNiveles();
                if (!empty($niveles)) :
                    while ($nivel = $niveles->fetch_object()) :
                ?>
                        <option value="<?= $nivel->id ?>"><?= $nivel->numero_tipo ?> <?= $nivel->tipo ?></option>
                    <?php endwhile; ?>
                <?php endif; ?>
            </select>
        </div>
        
        <div class="form-group ml-3">
            <label for="exampleFormControlSelect4">Secciones:</label>
            <select class="form-control p-0  ml-1" name="seccion" id="exampleFormControlSelect4">
                <option value="A">A</option>
                <option value="B">B</option>
            </select>
        </div>

      <button class="btn btn-primary my-2 my-sm-0 p-2 ml-2" style="min-width: 50px; border-radius: 5px; font-size: 16px;" type="submit"><i class="fa fa-sort-amount-desc" aria-hidden="true"></i></button>
    </form>
    

    <?php if(isset($_SESSION['search_m']) && $_SESSION['search_m'] == 'failed'): ?>
        <div class="alert alert-danger w-50 mx-auto" role="alert">
            <strong>Error!, No se encuentran resultados con lo que deseas Buscar..</strong>
        </div>
        <?php endif;?>
    <?php Utils::delete_session('search_m') ?>

    <div class="row">
        <div class="col-md-6">
            <h3 class="text-center"> Bachillerato</h3>
            <div class="accordion" id="accordionExample1">
                
            <?php require_once 'views/includes/bachillerato.php'; ?>

            <?php require_once 'views/includes/primaria.php'; ?>
        </div>
    </div>
</div>