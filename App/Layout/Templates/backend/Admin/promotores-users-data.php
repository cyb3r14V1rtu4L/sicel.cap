<?php
$allUsers = (!empty($_SESSION['allUsers'])) ? $_SESSION['allUsers'] : $allUsers;
$allSeccionals = (!empty($_SESSION['allSeccionals'])) ? $_SESSION['allSeccionals'] : $allSeccionals;

if($allUsers !== 'INE NO ENCONTRADA') {
    foreach ($allUsers as $rs) {
        ?>
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-label">Municipio</label>
                        <div class="input-with-icon  right">
                            <i class="fa fa-globe"></i>

                            <input id="municipio_<?=$rs['consecutivo'];?>" name="municipio_<?=$rs['consecutivo'];?>" type="text" class="form-control input-md" value="<?php echo $rs['municipio']; ?>" required="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-label">Fecha</label>
                        <div class="input-with-icon  right">
                            <i class="fa fa-calendar"></i>

                            <input id="fecha_grabo_<?=$rs['consecutivo'];?>" name="fecha_grabo_<?=$rs['consecutivo'];?>" type="text" class="form-control input-md" value="<?php echo $rs['fecha_grabo']; ?>" required="">
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



            </div>

            <div class="row">
                <div class="col-lg-3">
                    <div class="form-group">
                        <label class="form-label">Apellido Paterno</label>
                        <div class="input-with-icon  right">
                            <i class="fa fa-user"></i>

                            <input id="paterno_<?=$rs['consecutivo'];?>" name="paterno_<?=$rs['consecutivo'];?>" type="text" class="form-control input-md" value="<?php echo $rs['paterno']; ?>" required="">
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
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
                <div class="col-lg-2">
                    <div class="form-group">
                        <label class="form-label">Edad</label>
                        <div class="input-with-icon  right">
                            <i class="fa fa-user"></i>

                            <input id="edad_<?=$rs['consecutivo'];?>" name="edad_<?=$rs['consecutivo'];?>" type="text" class="form-control input-md" value="<?php echo $rs['edad']; ?>" required="">
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="direccion_actual">Dirección Actual</label>

                        <textarea class="form-control" id="direccion_actual_<?=$rs['consecutivo'];?>" rows="4"><?php echo $rs['direccion']; ?></textarea>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label class="form-label">Teléfono Celular</label>
                        <div class="input-with-icon  ">
                            <i class="fa fa-phone"></i>
                            <input id="telefono_<?=$rs['consecutivo'];?>" name="telefono_<?=$rs['consecutivo'];?>" type="text" class="form-control input-md" value="<?php echo $rs['telefono']; ?>" required="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label class="form-label">Facebook</label>
                        <div class="input-with-icon  ">
                            <i class="fa fa-facebook-square"></i>
                            <input id="facebook_<?=$rs['consecutivo'];?>" name="facebook_<?=$rs['consecutivo'];?>" type="text" class="form-control input-md" value="<?php echo $rs['facebook']; ?>" >
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label class="form-label">E-Mail</label>
                        <div class="input-with-icon  ">
                            <i class="fa fa-envelope-square"></i>
                            <input id="correo_<?=$rs['consecutivo'];?>" name="correo_<?=$rs['consecutivo'];?>" type="text" class="form-control input-md" value="<?php echo $rs['correo']; ?>" >
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-label">Ocupación</label>
                        <div class="input-with-icon  ">
                            <i class="fa fa-user"></i>
                            <input id="ocupacion_<?=$rs['consecutivo'];?>" name="ocupacion_<?=$rs['consecutivo'];?>" type="text" class="form-control input-md" value="<?php echo $rs['ocupacion']; ?>" required="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-label">Lugar Laboral</label>
                        <div class="input-with-icon  ">
                            <i class="fa fa-building"></i>
                            <input id="lugar_trabajo_<?=$rs['consecutivo'];?>" name="lugar_trabajo_<?=$rs['consecutivo'];?>" type="text" class="form-control input-md" value="<?php echo $rs['lugar_trabajo']; ?>" >
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-label">Horario Disponible</label>
                        <div class="input-with-icon  ">
                            <i class="fa fa-clock-o"></i>
                            <input id="horario_disponible_<?=$rs['consecutivo'];?>" name="horario_disponible_<?=$rs['consecutivo'];?>" type="text" class="form-control input-md" value="<?php echo $rs['horario_disponible']; ?>" >
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <label class="form-label">Vínculo o Enlace</label>
                    <select class="form-control "  id="seccional_id_<?php echo $rs['consecutivo']; ?>" name="seccional_id_<?php echo $rs['consecutivo']; ?>"
                            >
                        <option value="" selected>Seleccionar</option>
                        <?php
                        foreach($allSeccionals as $seccional)
                        {
                            ?>
                            <option value="<?php echo $seccional['consecutivo'];?>" <?php echo ($rs['seccional_id'] == $seccional['consecutivo'])?'selected':''?>><?php echo $seccional['clave_de_elector'].' - '.$seccional['nombre_completo'];?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="direccion_actual">Comentarios</label>

                        <textarea class="form-control" id="comentarios_<?=$rs['consecutivo'];?>" rows="4"><?php echo $rs['comentarios']; ?></textarea>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-6 pull-right">
                    <?php
                    if ($rs['es_promotor'] == 0) {
                        $class = 'btn-green';
                        $color = 'white';
                        $value = 1;
                        $es_promotor = 1;
                        $title = ' Agregar al Grupo de Promotores';
                        $title_b = '<i class="fa fa-user" ></i>';
                    } else if ($rs['es_promotor'] == 1) {
                        $class = 'btn-danger';
                        $color = 'white';
                        $value = 0;
                        $es_promotor = 0;
                        $title = ' Eliminar del Grupo de Promotores';
                        $title_b = '<i class="fa fa-lock" ></i>';
                    }
                    ?>

                    <button type="button" id="deactivate_<?=$rs['consecutivo'];?>"
                            class="deactivate btn btn-icon-toggle <?=$class ?>" data-toggle="tooltip"
                            data-placement="top"
                            title="<?=$title;?>"
                            uid="<?=$rs['consecutivo'];?>"
                            active="<?=$value;?>"
                            es_seccional = "<?=($rs['es_seccional']==1) ? 1:0;?>"
                            es_promovido = "<?=($rs['es_promovido']==1) ? 1:0;?>"
                            es_promotor = "<?=$es_promotor;?>"

                            onclick="ineExtract(this)"
                    >
                        <?=$title_b;?>
                        <?=$title;?>
                    </button>
                </div>

                <div class="col-md-6">
                    <button type="button"
                            class="deactivate btn btn-icon-toggle btn-danger" data-toggle="tooltip"
                            data-placement="top"
                            title="Actualizar Registro"
                            uid="<?=$rs['consecutivo'];?>"

                            onclick="ineUpdate(this)"
                    >
                        Actualizar Registro
                        <i class="fa fa-user" ></i>
                    </button>
                </div>

            </div>
        <hr>

    <?php

    }
}else{

    include_once('seccionales-new-data.php');

}
?>


