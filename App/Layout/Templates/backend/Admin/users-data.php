
<?php
$allUsers = (!empty($_SESSION['allUsers'])) ? $_SESSION['allUsers'] : $allUsers;
if($allUsers !== 'INE NO ENCONTRADA') {
    foreach ($allUsers as $rs) {
        $since = false;
        if (!empty($rs['signed_on'])) {
            $since = explode(' ', $rs['signed_on']);
        }

        ?>


            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-label">Apellido Paterno</label>
                        <div class="input-with-icon  right">
                            <i class="fa fa-user"></i>

                            <input id="paterno_<?=$rs['consecutivo'];?>" name="paterno_<?=$rs['consecutivo'];?>" type="text" class="form-control input-md" value="<?php echo $rs['paterno']; ?>" required="">
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-label">Apellido Materno</label>
                        <div class="input-with-icon  right">
                            <i class="fa fa-user"></i>

                            <input id="materno_<?=$rs['consecutivo'];?>" name="materno_<?=$rs['consecutivo'];?>" type="text" class="form-control input-md" value="<?php echo $rs['materno']; ?>">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-label">Nombre(s)</label>
                        <div class="input-with-icon  right">
                            <i class="fa fa-user"></i>

                            <input id="nombres_<?=$rs['consecutivo'];?>" name="nombres_<?=$rs['consecutivo'];?>" type="text" class="form-control input-md" value="<?php echo $rs['nombres']; ?>" required="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-label">Sección</label>
                        <div class="input-with-icon  right">
                            <i class="fa fa-book"></i>
                            <input id="seccion_<?=$rs['consecutivo'];?>" name="seccion_<?=$rs['consecutivo'];?>" type="text" class="form-control input-md" value="<?php echo $rs['seccion']; ?>" required="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-label">Clave de Elector</label>
                        <div class="input-with-icon  right">
                            <i class="fa fa-credit-card"></i>
                            <input id="clave_de_elector_<?=$rs['consecutivo'];?>" name="clave_de_elector_<?=$rs['consecutivo'];?>" type="text" class="form-control input-md" value="<?php echo $rs['clave_de_elector']; ?>" required="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <label class="form-label">Postura Promovido</label>

                    <div class="btn-group btn-group-sm" role="group" aria-label="...">
                        <button type="button" class="btn btn-default " id="status_1"  onclick="changeButtonGroupR(this,'reservation')" f="reservation_banked" t="s" value="Comprometido">Comprometido</button>
                        <button type="button" class="btn btn-default " id="status_2"  onclick="changeButtonGroupR(this,'reservation')" f="reservation_banked" t="s" value="Militante">Militante</button>
                        <button type="button" class="btn btn-default " id="status_3"  onclick="changeButtonGroupR(this,'reservation')" f="reservation_banked" t="s" value="Indeciso">Indeciso</button>
                    </div>
                </div>


            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-label">Teléfono Celular</label>
                        <div class="input-with-icon  ">
                            <i class="fa fa-phone"></i>
                            <input id="telefono_<?=$rs['consecutivo'];?>" name="telefono_<?=$rs['consecutivo'];?>" type="text" class="form-control input-md" value="<?php echo $rs['telefono']; ?>" required="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <label class="form-label">Tiene WhatsApp</label>

                    <div class="btn-group btn-group-sm" role="group" aria-label="...">
                        <button type="button" class="btn btn-default " id="tiene_wsp_1_<?=$rs['consecutivo'];?>"  onclick="changeButtonGroupR(this,'reservation')" f="reservation_banked" t="s" value="Comprometido">Sí</button>
                        <button type="button" class="btn btn-default " id="tiene_wsp_2_<?=$rs['consecutivo'];?>"  onclick="changeButtonGroupR(this,'reservation')" f="reservation_banked" t="s" value="Militante">No</button>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="direccion_actual_<?=$rs['consecutivo'];?>">Dirección Actual</label>

                        <textarea class="form-control" id="direccion_actual_<?=$rs['consecutivo'];?>" rows="4"><?php echo $rs['direccion']; ?></textarea>
                    </div>
                </div>




            </div>

        <hr>

        <?php

    }
}
?>


