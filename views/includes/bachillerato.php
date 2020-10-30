<div class="card">
                    <div class="card-header" id="headingOne1">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne1" aria-expanded="true" aria-controls="collapseOne1">
                                1 Año Seccion A
                            </button>
                        </h2>
                    </div>

                    <div id="collapseOne1" class="collapse show" aria-labelledby="headingOne1" data-parent="#accordionExample1">
                    <?php
                                if (isset($primern_a) && !empty($primern_a)) :
                                ?>   
                    <div class="card-body">
                        
                            <table class="table table-striped text-center container">

                                <tr class="thead-dark">
                                    <th scope="col">Cedula</th>
                                    <th scope="col">Nombres</th>
                                    <th scope="col">Apellidos</th>
                                </tr>

                                    <?php while ($primernr_a = $primern_a->fetch_object()) :
                                    ?>
                                        <tr>
                                            <td><?= $primernr_a->cedula ?></td>
                                            <td><?= $primernr_a->nombres ?></td>
                                            <td><?= $primernr_a->apellidos ?></td>
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
                    <div class="card-header" id="headingTwo1">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo1" aria-expanded="false" aria-controls="collapseTwo1">
                                1 Año Seccion B
                            </button>
                        </h2>
                    </div>
                    <div id="collapseTwo1" class="collapse" aria-labelledby="headingTwo1" data-parent="#accordionExample1">
                    <?php
                                if (isset($primern_b) && !empty($primern_b)):
                                ?>
                        <div class="card-body">
                                
                            <table class="table table-striped text-center container">

                                <tr class="thead-dark">
                                    <th scope="col">Cedula</th>
                                    <th scope="col">Nombres</th>
                                    <th scope="col">Apellidos</th>
                                </tr>

                                    <?php while ($primerns_b = $primern_b->fetch_object()) :
                                    ?>
                                        <tr>
                                            <td><?= $primerns_b->cedula ?></td>
                                            <td><?= $primerns_b->nombres ?></td>
                                            <td><?= $primerns_b->apellidos ?></td>
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
                    <div class="card-header" id="headingThree1">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree1" aria-expanded="false" aria-controls="collapseThree1">
                                2 Año Seccion A
                            </button>
                        </h2>
                    </div>
                    <div id="collapseThree1" class="collapse" aria-labelledby="headingThree1" data-parent="#accordionExample1">
                    <?php
                                if (isset($segundon_a) && !empty($segundon_a)) :
                                ?>    
                    <div class="card-body">
                        
                            <table class="table table-striped text-center container">

                                <tr class="thead-dark">
                                    <th scope="col">Cedula</th>
                                    <th scope="col">Nombres</th>
                                    <th scope="col">Apellidos</th>
                                </tr>

                                    <?php while ($segundonr_a = $segundon_a->fetch_object()) :
                                    ?>
                                        <tr>
                                            <td><?= $segundonr_a->cedula ?></td>
                                            <td><?= $segundonr_a->nombres ?></td>
                                            <td><?= $segundonr_a->apellidos ?></td>
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
                    <div class="card-header" id="headingThree1">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapsefour1" aria-expanded="false" aria-controls="collapseThree1">
                                2 Año Seccion B
                            </button>
                        </h2>
                    </div>
                    <div id="collapsefour1" class="collapse" aria-labelledby="headingThree1" data-parent="#accordionExample1">
                    <?php
                                if (isset($segundon_b) && !empty($segundon_b)) :
                                ?>    
                    <div class="card-body">
                       
                            <table class="table table-striped text-center container">

                                <tr class="thead-dark">
                                    <th scope="col">Cedula</th>
                                    <th scope="col">Nombres</th>
                                    <th scope="col">Apellidos</th>
                                </tr>

                                    <?php while ($segundonr_b = $segundon_b->fetch_object()) :
                                    ?>
                                        <tr>
                                            <td><?= $segundonr_b->cedula ?></td>
                                            <td><?= $segundonr_b->nombres ?></td>
                                            <td><?= $segundonr_b->apellidos ?></td>
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
                    <div class="card-header" id="headingThree1">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapsefive1" aria-expanded="false" aria-controls="collapseThree1">
                                3 Año Seccion A
                            </button>
                        </h2>
                    </div>
                    <div id="collapsefive1" class="collapse" aria-labelledby="headingThree1" data-parent="#accordionExample1">
                    <?php
                                if (isset($tercern_a) && !empty($tercern_a)) :
                                ?>    
                    <div class="card-body">
                    
                            <table class="table table-striped text-center container">

                                <tr class="thead-dark">
                                    <th scope="col">Cedula</th>
                                    <th scope="col">Nombres</th>
                                    <th scope="col">Apellidos</th>
                                </tr>

                                    <?php while ($tercernr_a = $tercern_a->fetch_object()) :
                                    ?>
                                        <tr>
                                            <td><?= $tercernr_a->cedula ?></td>
                                            <td><?= $tercernr_a->nombres ?></td>
                                            <td><?= $tercernr_a->apellidos ?></td>
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
                    <div class="card-header" id="headingThree1">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapsecero" aria-expanded="false" aria-controls="collapseThree1">
                                3 Año Seccion B
                            </button>
                        </h2>
                    </div>
                    <div id="collapsecero" class="collapse" aria-labelledby="headingsix1" data-parent="#accordionExample1">
                    <?php
                                if (isset($tercern_b) && !empty($tercern_b)) :
                                ?>
                        <div class="card-body">

                            <table class="table table-striped text-center container">

                                <tr class="thead-dark">
                                    <th scope="col">Cedula</th>
                                    <th scope="col">Nombres</th>
                                    <th scope="col">Apellidos</th>
                                </tr>

                                    <?php while ($tercernr_b = $tercern_b->fetch_object()) :
                                    ?>
                                        <tr>
                                            <td><?= $tercernr_b->cedula ?></td>
                                            <td><?= $tercernr_b->nombres ?></td>
                                            <td><?= $tercernr_b->apellidos ?></td>
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
                    <div class="card-header" id="headingThree1">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseseven1" aria-expanded="false" aria-controls="collapseThree1">
                                4 Año Seccion A
                            </button>
                        </h2>
                    </div>
                    <div id="collapseseven1" class="collapse" aria-labelledby="headingThree1" data-parent="#accordionExample1">
                    <?php
                                if (isset($cuarton_a) && !empty($cuarton_a)) :
                                ?>    
                    <div class="card-body">

                            <table class="table table-striped text-center container">

                                <tr class="thead-dark">
                                    <th scope="col">Cedula</th>
                                    <th scope="col">Nombres</th>
                                    <th scope="col">Apellidos</th>
                                </tr>

                                    <?php while ($cuartonr_a = $cuarton_a->fetch_object()) :
                                    ?>
                                        <tr>
                                            <td><?= $cuartonr_a->cedula ?></td>
                                            <td><?= $cuartonr_a->nombres ?></td>
                                            <td><?= $cuartonr_a->apellidos ?></td>
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
                    <div class="card-header" id="headingThree1">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseeight1" aria-expanded="false" aria-controls="collapseThree1">
                                4 Año Seccion B
                            </button>
                        </h2>
                    </div>
                    <div id="collapseeight1" class="collapse" aria-labelledby="headingThree1" data-parent="#accordionExample1">
                    <?php
                                if (isset($cuarton_b) && !empty($cuarton_b)) :
                                ?>    
                    <div class="card-body">
                       
                            <table class="table table-striped text-center container">

                                <tr class="thead-dark">
                                    <th scope="col">Cedula</th>
                                    <th scope="col">Nombres</th>
                                    <th scope="col">Apellidos</th>
                                </tr>

                                    <?php while ($cuartonr_b = $cuarton_b->fetch_object()) :
                                    ?>
                                        <tr>
                                            <td><?= $cuartonr_b->cedula ?></td>
                                            <td><?= $cuartonr_b->nombres ?></td>
                                            <td><?= $cuartonr_b->apellidos ?></td>
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
                    <div class="card-header" id="headingThree1">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapsenine1" aria-expanded="false" aria-controls="collapseThree1">
                                5 Año Seccion A
                            </button>
                        </h2>
                    </div>
                    <div id="collapsenine1" class="collapse" aria-labelledby="headingThree1" data-parent="#accordionExample1">
                    <?php
                                if (isset($quinton_a) && !empty($quinton_a)) :
                                ?>    
                    <div class="card-body">
                     
                            <table class="table table-striped text-center container">

                                <tr class="thead-dark">
                                    <th scope="col">Cedula</th>
                                    <th scope="col">Nombres</th>
                                    <th scope="col">Apellidos</th>
                                </tr>

                                    <?php while ($quintonr_a = $quinton_a->fetch_object()) :
                                    ?>
                                        <tr>
                                            <td><?= $quintonr_a->cedula ?></td>
                                            <td><?= $quintonr_a->nombres ?></td>
                                            <td><?= $quintonr_a->apellidos ?></td>
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
                    <div class="card-header" id="headingThree1">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseten1" aria-expanded="false" aria-controls="collapseThree1">
                                5 Año Seccion B
                            </button>
                        </h2>
                    </div>
                    <div id="collapseten1" class="collapse" aria-labelledby="headingThree1" data-parent="#accordionExample1">
                    <?php
                                if (isset($quinton_b) && !empty($quinton_b)) :
                                ?>    
                    <div class="card-body">
                      
                            <table class="table table-striped text-center container">

                                <tr class="thead-dark">
                                    <th scope="col">Cedula</th>
                                    <th scope="col">Nombres</th>
                                    <th scope="col">Apellidos</th>
                                </tr>

                                    <?php while ($quintonr_b = $quinton_b->fetch_object()) :
                                    ?>
                                        <tr>
                                            <td><?= $quintonr_b->cedula ?></td>
                                            <td><?= $quintonr_b->nombres ?></td>
                                            <td><?= $quintonr_b->apellidos ?></td>
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
        </div>