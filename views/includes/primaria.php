<div class="col-md-6">
            <h3 class="text-center">Primaria</h3>
            <div class="accordion" id="accordionExample2">
                <div class="card">
                    <div class="card-header" id="headingOne2">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne2" aria-expanded="true" aria-controls="collapseOne2">
                                1 Grado Seccion A
                            </button>
                        </h2>
                    </div>

                    <div id="collapseOne2" class="collapse show" aria-labelledby="headingOne2" data-parent="#accordionExample2">
                    <?php
                                if (isset($primerg_a) && !empty($primerg_a)) :
                                ?>    
                    <div class="card-body">
                        
                            <table class="table table-striped text-center container">

                                <tr class="thead-dark">
                                    <th scope="col">Cedula</th>
                                    <th scope="col">Nombres</th>
                                    <th scope="col">Apellidos</th>
                                </tr>

                                    <?php while ($primergr_a = $primerg_a->fetch_object()) :
                                    ?>
                                        <tr>
                                            <td><?= $primergr_a->cedula ?></td>
                                            <td><?= $primergr_a->nombres ?></td>
                                            <td><?= $primergr_a->apellidos ?></td>
                                        </tr>
                                    <?php endwhile; ?>
                                
                                    </table>
                                
                        </div>
                        <?php else : ?>
                            <p class="text-capitalize text-upper text-center py-3">no hay estudiantes registrados en esta seccion.</p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo2">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo2" aria-expanded="false" aria-controls="collapseTwo2">
                                1 Grado Seccion B
                            </button>
                        </h2>
                    </div>
                    <div id="collapseTwo2" class="collapse" aria-labelledby="headingTwo2" data-parent="#accordionExample2">
                    <?php
                                if (isset($primerg_b) && !empty($primerg_b)) :
                                ?>    
                    <div class="card-body">
                       
                            <table class="table table-striped text-center container">

                                <tr class="thead-dark">
                                    <th scope="col">Cedula</th>
                                    <th scope="col">Nombres</th>
                                    <th scope="col">Apellidos</th>
                                </tr>

                                    <?php while ($primergr_b = $primerg_b->fetch_object()) :
                                    ?>
                                        <tr>
                                            <td><?= $primergr_b->cedula ?></td>
                                            <td><?= $primergr_b->nombres ?></td>
                                            <td><?= $primergr_b->apellidos ?></td>
                                        </tr>
                                    <?php endwhile; ?>
                                
                                    </table>
                               
                        </div>
                        <?php else : ?>
                            <p class="text-capitalize text-upper text-center py-3">no hay estudiantes registrados en esta seccion.</p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree2">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree2" aria-expanded="false" aria-controls="collapseThree2">
                                2 Grado Seccion A
                            </button>
                        </h2>
                    </div>
                    <div id="collapseThree2" class="collapse" aria-labelledby="headingThree2" data-parent="#accordionExample2">
                    <?php
                                if (isset($segundog_a) && !empty($segundog_a)) :
                                ?>    
                    <div class="card-body">
                       
                            <table class="table table-striped text-center container">

                                <tr class="thead-dark">
                                    <th scope="col">Cedula</th>
                                    <th scope="col">Nombres</th>
                                    <th scope="col">Apellidos</th>
                                </tr>

                                    <?php while ($segundogr_a = $segundog_a->fetch_object()) :
                                    ?>
                                        <tr>
                                            <td><?= $segundogr_a->cedula ?></td>
                                            <td><?= $segundogr_a->nombres ?></td>
                                            <td><?= $segundogr_a->apellidos ?></td>
                                        </tr>
                                    <?php endwhile; ?>
                                
                                    </table>
                                
                        </div>
                        <?php else : ?>
                            <p class="text-capitalize text-upper text-center py-3">no hay estudiantes registrados en esta seccion.</p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree2">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapsefour2" aria-expanded="false" aria-controls="collapseThree2">
                                2 Grado Seccion B
                            </button>
                        </h2>
                    </div>
                    <div id="collapsefour2" class="collapse" aria-labelledby="headingThree2" data-parent="#accordionExample2">
                    <?php
                                if (isset($segundog_b) && !empty($segundog_b)) :
                                ?>    
                    <div class="card-body">
                     
                            <table class="table table-striped text-center container">

                                <tr class="thead-dark">
                                    <th scope="col">Cedula</th>
                                    <th scope="col">Nombres</th>
                                    <th scope="col">Apellidos</th>
                                </tr>

                                    <?php while ($segundogr_b = $segundog_b->fetch_object()) :
                                    ?>
                                        <tr>
                                            <td><?= $segundogr_b->cedula ?></td>
                                            <td><?= $segundogr_b->nombres ?></td>
                                            <td><?= $segundogr_b->apellidos ?></td>
                                        </tr>
                                    <?php endwhile; ?>
                                
                                    </table>
                               
                        </div>
                        <?php else : ?>
                            <p class="text-capitalize text-upper text-center py-3">no hay estudiantes registrados en esta seccion.</p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree2">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapsefive2" aria-expanded="false" aria-controls="collapseThree2">
                                3 Grado Seccion A
                            </button>
                        </h2>
                    </div>
                    <div id="collapsefive2" class="collapse" aria-labelledby="headingThree2" data-parent="#accordionExample2">
                    <?php
                                if (isset($tercerg_a) && !empty($tercerg_a)) :
                                ?>    
                    <div class="card-body">
                        
                            <table class="table table-striped text-center container">

                                <tr class="thead-dark">
                                    <th scope="col">Cedula</th>
                                    <th scope="col">Nombres</th>
                                    <th scope="col">Apellidos</th>
                                </tr>

                                    <?php while ($tercergr_a = $tercerg_a->fetch_object()) :
                                    ?>
                                        <tr>
                                            <td><?= $tercergr_a->cedula ?></td>
                                            <td><?= $tercergr_a->nombres ?></td>
                                            <td><?= $tercergr_a->apellidos ?></td>
                                        </tr>
                                    <?php endwhile; ?>
                                
                                    </table>
                                
                        </div>
                        <?php else : ?>
                            <p class="text-capitalize text-upper text-center py-3">no hay estudiantes registrados en esta seccion.</p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree2">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapsesix2" aria-expanded="false" aria-controls="collapseThree2">
                                3 Grado Seccion B
                            </button>
                        </h2>
                    </div>
                    <div id="collapsesix2" class="collapse" aria-labelledby="headingThree2" data-parent="#accordionExample2">
                    <?php
                                if (isset($tercerg_b) && !empty($tercerg_b)) :
                                ?>    
                    <div class="card-body">
                       
                            <table class="table table-striped text-center container">

                                <tr class="thead-dark">
                                    <th scope="col">Cedula</th>
                                    <th scope="col">Nombres</th>
                                    <th scope="col">Apellidos</th>
                                </tr>

                                    <?php while ($tercergr_b = $tercerg_b->fetch_object()) :
                                    ?>
                                        <tr>
                                            <td><?= $tercergr_b->cedula ?></td>
                                            <td><?= $tercergr_b->nombres ?></td>
                                            <td><?= $tercergr_b->apellidos ?></td>
                                        </tr>
                                    <?php endwhile; ?>
                                
                                    </table>
                                    
                        </div>
                        <?php else : ?>
                            <p class="text-capitalize text-upper text-center py-3">no hay estudiantes registrados en esta seccion.</p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree2">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseseven2" aria-expanded="false" aria-controls="collapseThree2">
                                4 Grado Seccion A
                            </button>
                        </h2>
                    </div>
                    <div id="collapseseven2" class="collapse" aria-labelledby="headingThree2" data-parent="#accordionExample2">
                    <?php
                                if (isset($cuartog_a) && !empty($cuartog_a)) :
                                ?>    
                    <div class="card-body">
                        
                            <table class="table table-striped text-center container">

                                <tr class="thead-dark">
                                    <th scope="col">Cedula</th>
                                    <th scope="col">Nombres</th>
                                    <th scope="col">Apellidos</th>
                                </tr>

                                    <?php while ($cuartogr_a = $cuartog_a->fetch_object()) :
                                    ?>
                                        <tr>
                                            <td><?= $cuartogr_a->cedula ?></td>
                                            <td><?= $cuartogr_a->nombres ?></td>
                                            <td><?= $cuartogr_a->apellidos ?></td>
                                        </tr>
                                    <?php endwhile; ?>
                                
                                    </table>
                               
                        </div>
                        <?php else : ?>
                            <p class="text-capitalize text-upper text-center py-3">no hay estudiantes registrados en esta seccion.</p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree2">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseeight2" aria-expanded="false" aria-controls="collapseThree2">
                                4 Grado Seccion B
                            </button>
                        </h2>
                    </div>
                    <div id="collapseeight2" class="collapse" aria-labelledby="headingThree2" data-parent="#accordionExample2">
                    <?php
                                if (isset($cuartog_b) && !empty($cuartog_b)) :
                                ?>    
                    <div class="card-body">
                        
                            <table class="table table-striped text-center container">

                                <tr class="thead-dark">
                                    <th scope="col">Cedula</th>
                                    <th scope="col">Nombres</th>
                                    <th scope="col">Apellidos</th>
                                </tr>

                                    <?php while ($cuartogr_b = $cuartog_b->fetch_object()) :
                                    ?>
                                        <tr>
                                            <td><?= $cuartogr_b->cedula ?></td>
                                            <td><?= $cuartogr_b->nombres ?></td>
                                            <td><?= $cuartogr_b->apellidos ?></td>
                                        </tr>
                                    <?php endwhile; ?>
                                
                                    </table>
                                
                        </div>
                        <?php else : ?>
                            <p class="text-capitalize text-upper text-center py-3">no hay estudiantes registrados en esta seccion.</p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree2">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapsenine2" aria-expanded="false" aria-controls="collapseThree2">
                                5 Grado Seccion A
                            </button>
                        </h2>
                    </div>
                    <div id="collapsenine2" class="collapse" aria-labelledby="headingThree2" data-parent="#accordionExample2">
                    <?php
                                if (isset($quintog_a) && !empty($quintog_a)) :
                                ?>    
                    <div class="card-body">
                       
                            <table class="table table-striped text-center container">

                                <tr class="thead-dark">
                                    <th scope="col">Cedula</th>
                                    <th scope="col">Nombres</th>
                                    <th scope="col">Apellidos</th>
                                </tr>

                                    <?php while ($quintogr_a = $quintog_a->fetch_object()) :
                                    ?>
                                        <tr>
                                            <td><?= $quintogr_a->cedula ?></td>
                                            <td><?= $quintogr_a->nombres ?></td>
                                            <td><?= $quintogr_a->apellidos ?></td>
                                        </tr>
                                    <?php endwhile; ?>
                               
                                    </table>
                                
                        </div>
                        <?php else : ?>
                            <p class="text-capitalize text-upper text-center py-3">no hay estudiantes registrados en esta seccion.</p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree2">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseten2" aria-expanded="false" aria-controls="collapseThree2">
                                5 Grado Seccion B
                            </button>
                        </h2>
                    </div>
                    <div id="collapseten2" class="collapse" aria-labelledby="headingThree2" data-parent="#accordionExample2">
                    <?php
                                if (isset($quintog_b) && !empty($quintog_b)) :
                                ?>   
                    <div class="card-body">
                        
                            <table class="table table-striped text-center container">

                                <tr class="thead-dark">
                                    <th scope="col">Cedula</th>
                                    <th scope="col">Nombres</th>
                                    <th scope="col">Apellidos</th>
                                </tr>

                                    <?php while ($quintogr_b = $quintog_b->fetch_object()) :
                                    ?>
                                        <tr>
                                            <td><?= $quintogr_b->cedula ?></td>
                                            <td><?= $quintogr_b->nombres ?></td>
                                            <td><?= $quintogr_b->apellidos ?></td>
                                        </tr>
                                    <?php endwhile; ?>
                                
                                    </table>
                               
                        </div>
                        <?php else : ?>
                            <p class="text-capitalize text-upper text-center py-3">no hay estudiantes registrados en esta seccion.</p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree2">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseeleven2" aria-expanded="false" aria-controls="collapseThree2">
                                6 Grado Seccion A
                            </button>
                        </h2>
                    </div>
                    <div id="collapseeleven2" class="collapse" aria-labelledby="headingThree2" data-parent="#accordionExample2">
                    <?php
                                if (isset($sestog_a) && !empty($sestog_a)) :
                                ?>    
                    <div class="card-body">
                       
                            <table class="table table-striped text-center container">

                                <tr class="thead-dark">
                                    <th scope="col">Cedula</th>
                                    <th scope="col">Nombres</th>
                                    <th scope="col">Apellidos</th>
                                </tr>

                                    <?php while ($sestogs_a = $sestog_a->fetch_object()) :
                                    ?>
                                        <tr>
                                            <td><?= $sestogs_a->cedula ?></td>
                                            <td><?= $sestogs_a->nombres ?></td>
                                            <td><?= $sestogs_a->apellidos ?></td>
                                        </tr>
                                    <?php endwhile; ?>
                                
                                    </table>
                               
                        </div>
                        <?php else : ?>
                            <p class="text-capitalize text-upper text-center py-3">no hay estudiantes registrados en esta seccion.</p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree2">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapsetwelve2" aria-expanded="false" aria-controls="collapseThree2">
                                6 Grado Seccion B
                            </button>
                        </h2>
                    </div>
                    <div id="collapsetwelve2" class="collapse" aria-labelledby="headingThree2" data-parent="#accordionExample2">
                    <?php
                                if (isset($sestog_b) && !empty($sestog_b)) :
                                ?>    
                    <div class="card-body">
                           
                            <table class="table table-striped text-center container">

                                <tr class="thead-dark">
                                    <th scope="col">Cedula</th>
                                    <th scope="col">Nombres</th>
                                    <th scope="col">Apellidos</th>
                                </tr>

                                    <?php while ($sestogr_b = $sestog_b->fetch_object()) :
                                    ?>
                                        <tr>
                                            <td><?= $sestogr_b->cedula ?></td>
                                            <td><?= $sestogr_b->nombres ?></td>
                                            <td><?= $sestogr_b->apellidos ?></td>
                                        </tr>
                                    <?php endwhile; ?>
                                
                                    </table>
                                
                        </div>
                        <?php else : ?>
                            <p class="text-capitalize text-upper text-center py-3">no hay estudiantes registrados en esta seccion.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>