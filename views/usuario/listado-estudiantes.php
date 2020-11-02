<?php if (isset($_SESSION['user'])) : ?>
    <div class="container mt-5">
        
    <?php if (isset($_SESSION['nota']) && $_SESSION['nota'] == 'success') : ?>
            <div class="alert alert-success w-50 mx-auto" style="margin-top: 150px;" role="alert">
                <strong>La Nota Se ha Cargado Exitosamente Si Quieres ver Los Resultados <a href="<?=base_url?>nota/gestion_notas"> Presiona Aqui</a></strong>
            </div>
        <?php endif; ?>
        <?php Utils::delete_session('nota') ?>

        <?php $nivel_profesor = Utils::showNivelByProfesor($_SESSION['user']->id) ?>
        <?php if (isset($nivel_profesor) && !empty($nivel_profesor)) : ?>
            <h2 class="py-5 text-center" style="margin-top: 80px;"> # Listado de mis Estudiantes</h2>
            <div class="row">
                <?php while ($nivel_profesorr = $nivel_profesor->fetch_object()) : ?>
                    <div class="col-md-5 mb-4">
                        <div class="card">
                            <div class="card-header text-center" style="font-size: 18px;">
                                <?= $nivel_profesorr->numero_tipo ?> <?= $nivel_profesorr->tipo ?> Seccion <?= $nivel_profesorr->seccion ?>: <strong><?= $nivel_profesorr->materia ?></strong>
                            </div>
                            <div class="card-body text-center">
                                <?php $estudiantes_pr = Utils::showEstudiantesByProfesor($_SESSION['user']->id);
                                while ($estudiante_pr = $estudiantes_pr->fetch_object()) :
                                    if ($estudiante_pr->seccion == $nivel_profesorr->seccion) :
                                ?>
                                <!-- Button trigger modal -->
                                        <li class="list-group-item"><?= $estudiante_pr->cedula ?> - <?= $estudiante_pr->nombres ?> - <?= $estudiante_pr->apellidos ?> <a href="<?=base_url?>usuario/LoadMateriaEstudiantes&materia=<?=$nivel_profesorr->materia_id?>&estudiante=<?=$estudiante_pr->estudiante_id?>&nivel=<?=$nivel_profesorr->tipo?>"><i class="ml-2 fa fa-sliders" aria-hidden="true"></i></a></li>
                                    <?php endif; ?>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else : ?>
            <div class="card text-center" style="margin-top: 150px;">
                <div class="card-header" style="font-size: 25px;">
                    No existen Estudiantes para <?= $_SESSION['user']->primer_nombre ?> <?= $_SESSION['user']->primer_apellido ?>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Estudiantes Por Nivel y Seccion Con Materias </h5>
                    <p class="card-text py-3">En esta Vista te mostramos los estudiantes por nivel y seccion con dicha materia que estes dando, si te aparece este error es porque no se te han asignado ninguna seccion o nivel.</p>
                </div>
                <div class="card-footer text-muted">
                    &copy; 2020 Institute Academy | INAC
                </div>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>