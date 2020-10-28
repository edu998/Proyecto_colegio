<div class="container mt-5">
<div class="row">
    <h2 class="mt-5 mx-auto">Por favor, Selecciona El Tipo de Pago Que vas a Realizar:</h2>
                <div class="col-md-6">
                    <div class="pricing-container">
                        <div class="plans plan-light">
                            <h4>Efectivo</h4>
                            <h2>75 mil pesos</h2>
                            <h4>Con el Pago en Efectivo tendras que rellenar un formulario y luego dirigirte al Institute Academy Para Completar el Pago</h4>
                            <?php if(!empty($nombre_pago) && $nombre_pago == 'inscripcion'): ?>                           
                            <a href="<?=base_url?>pago/pago_efectivo&tipo_pago=efectivo&nombre_pago=<?=$nombre_pago?>" class="btn btn-primary full-width mt-4">Pagar Aqui</a>
                            <?php elseif(!empty($nombre_pago) && $nombre_pago == 'matricula'):?>
                            <a href="<?=base_url?>pago/pago_efectivo&tipo_pago=efectivo&nombre_pago=<?=$nombre_pago?>" class="btn btn-primary full-width mt-4">Pagar Aqui</a>
                            <?php elseif(!empty($nombre_pago) && $nombre_pago == 'grado'):?>
                            <a href="<?=base_url?>pago/pago_efectivo&tipo_pago=efectivo&nombre_pago=<?=$nombre_pago?>" class="btn btn-primary full-width mt-4">Pagar Aqui</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="pricing-container">
                    <div class="plans plan-dark">
                            <h4>Transferencia</h4>
                            <h2>75 mil pesos</h2>
                            <h4>Con el Pago en Transferencia Deberas rellenar un formulario y subir tu comprobante de trasnferencia para Completar el Pago</h4>                           
                            <?php if(!empty($nombre_pago) && $nombre_pago == 'inscripcion'): ?>                           
                            <a href="<?=base_url?>pago/pago_transferencia&tipo_pago=transferencia&nombre_pago=<?=$nombre_pago?>"  class="btn btn-alternate full-width mt-4">Pagar Aqui</a>
                            <?php elseif(!empty($nombre_pago) && $nombre_pago == 'matricula'):?>
                            <a href="<?=base_url?>pago/pago_transferencia&tipo_pago=transferencia&nombre_pago=<?=$nombre_pago?>"  class="btn btn-alternate full-width mt-4">Pagar Aqui</a>
                            <?php elseif(!empty($nombre_pago) && $nombre_pago == 'grado'):?>
                            <a href="<?=base_url?>pago/pago_transferencia&tipo_pago=transferencia&nombre_pago=<?=$nombre_pago?>"  class="btn btn-alternate full-width mt-4">Pagar Aqui</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
</div>