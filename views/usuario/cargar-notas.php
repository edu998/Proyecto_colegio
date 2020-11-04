<form action="<?=base_url?>nota/save&nivel=<?=isset($nivel) ? $nivel : false?>" method="POST" class="form-signin">

<?php if (isset($_SESSION['nota']) && $_SESSION['nota'] == 'failed') : ?>
            <div class="alert alert-danger mx-auto" role="alert">
                <strong>Error en el Sistema!, No se han Podido Cargar Las Notas o el Estudiante Ya tiene Nota, para Actualizar las notas del Estudiante Debes irte a Gestion de tus notas y presionar el boton que esta al lado de cada materia</strong>
            </div>
        <?php endif; ?>
        <?php Utils::delete_session('nota') ?>

        <?php if (isset($nivel) && !empty($nivel) && $nivel == 'Grado') : ?>
    <div class="text-center mb-4">
        <h1 class="h3 mb-3 font-weight-normal">Cargar Notas de los Estudiantes</h1>
        <div class="alert alert-warning" role="alert">
            <strong class="text-center py-2" style="font-size: 17px;"> Por favor, debes Insertar las Notas de los Estudiantes, Despues de haberlas insertado se te mostrara una lista donde se vera la nota final de cada estudiante que seleccionaste..</strong>
            <p>Nota:</p>
            <ul>
                <li>Las letras B tienen un valor de 15 pnts</li>
                <li>Las letras C tienen un valor de 10 pnts</li>
                <li>Las letras A tienen un valor de 20 pnts</li>
                <li>Las letras D tienen un valor de 05 pnts</li>
            </ul>
        </div>
    </div>

    <div class="form-label-group">
        <input type="hidden" name="materia_id" value="<?= isset($materia_id) ? $materia_id : '' ?>" class="form-control">
    </div>

    <div class="form-label-group">
        <input type="hidden" name="estudiante_id" value="<?= isset($estudiante_id) ? $estudiante_id : '' ?>" class="form-control">
    </div>

    
        <div class="form-group">
            <label for="primera_nota">Seleccione la Primera Nota:</label>
            <select name="primera_nota" class="form-control p-0">
                <option value="20">A</option>
                <option value="15">B</option>
                <option value="10">C</option>
                <option value="05">D</option>
            </select>
        </div>

        <div class="form-group">
            <label for="segunda_nota">Seleccione la Segunda Nota:</label>
            <select name="segunda_nota" class="form-control p-0">
                <option value="20">A</option>
                <option value="15">B</option>
                <option value="10">C</option>
                <option value="05">D</option>
            </select>
        </div>

        <div class="form-group">
            <label for="tercera_nota">Seleccione la Tercera Nota:</label>
            <select name="tercera_nota" class="form-control p-0">
                <option value="20">A</option>
                <option value="15">B</option>
                <option value="10">C</option>
                <option value="05">D</option>
            </select>
        </div>

        <div class="form-group">
            <label for="cuarta_nota">Seleccione la Cuarta Nota:</label>
            <select name="cuarta_nota" class="form-control p-0">
                <option value="20">A</option>
                <option value="15">B</option>
                <option value="10">C</option>
                <option value="05">D</option>
            </select>
        </div>

    <?php elseif ($nivel == 'Año') : ?>
        <div class="text-center mb-4">
        <h1 class="h3 mb-3 font-weight-normal">Cargar Notas de los Estudiantes</h1>
        <div class="alert alert-warning" role="alert">
            <strong class="text-center py-2" style="font-size: 17px;"> Por favor, debes Insertar las Notas de los Estudiantes, Despues de haberlas insertado se te mostrara una lista donde se vera la nota final de cada estudiante que seleccionaste..</strong>
        </div>
    </div>
        <div class="form-group">
            <label for="primera_nota">Seleccione la Primera Nota:</label>
            <select name="primera_nota" class="form-control p-0">
                <option value="01">01</option>
                <option value="02">02</option>
                <option value="03">03</option>
                <option value="04">04</option>
                <option value="05">05</option>
                <option value="06">06</option>
                <option value="07">07</option>
                <option value="08">08</option>
                <option value="09">09</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
            </select>
        </div>

        <div class="form-group">
            <label for="segunda_nota">Seleccione la Segunda Nota:</label>
            <select name="segunda_nota" class="form-control p-0">
                <option value="01">01</option>
                <option value="02">02</option>
                <option value="03">03</option>
                <option value="04">04</option>
                <option value="05">05</option>
                <option value="06">06</option>
                <option value="07">07</option>
                <option value="08">08</option>
                <option value="09">09</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
            </select>
        </div>

        <div class="form-group">
            <label for="tercera_nota">Seleccione la Tercera Nota:</label>
            <select name="tercera_nota" class="form-control p-0">
                <option value="01">01</option>
                <option value="02">02</option>
                <option value="03">03</option>
                <option value="04">04</option>
                <option value="05">05</option>
                <option value="06">06</option>
                <option value="07">07</option>
                <option value="08">08</option>
                <option value="09">09</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
            </select>
        </div>

        <div class="form-group">
            <label for="cuarta_nota">Seleccione la Cuarta Nota:</label>
            <select name="cuarta_nota" class="form-control p-0">
                <option value="01">01</option>
                <option value="02">02</option>
                <option value="03">03</option>
                <option value="04">04</option>
                <option value="05">05</option>
                <option value="06">06</option>
                <option value="07">07</option>
                <option value="08">08</option>
                <option value="09">09</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
            </select>
        </div>

    <?php endif; ?>
    <button class="btn btn-lg btn-primary btn-block" style="font-size: 20px;" type="submit">Cargar Notas</button>
    <p class="mt-5 mb-3 text-muted text-center">&copy; 2020 Institute Academy | INAC</p>
    <?php Utils::delete_session('errors') ?>
</form>