
<?php
$allUsers = (!empty($_SESSION['allUsers'])) ? $_SESSION['allUsers'] : $allUsers;
$allPromotores = (!empty($_SESSION['allPromotores'])) ? $_SESSION['allPromotores'] : $allPromotores;
if($allUsers !== 'INE NO ENCONTRADA') {
    foreach ($allUsers as $rs) {
        $since = false;
        if (!empty($rs['signed_on'])) {
            $since = explode(' ', $rs['signed_on']);
        }

        ?>

            <div class="row">
                <div class="col-lg-4">
                    <label class="form-label">Promotor</label>
                    <select class="form-control "  id="promotor_id_<?php echo $rs['consecutivo']; ?>" name="promotor_id_<?php echo $rs['consecutivo']; ?>"
                    >
                        <option selected value="0">Seleccionar Promotor</option>
                        <?php
                        foreach($allPromotores as $promotor)
                        {
                            ?>
                            <option value="<?php echo $promotor['consecutivo'];?>" <?php echo ($rs['promotor_id'] == $promotor['consecutivo'])?'selected':''?>><?php echo $promotor['clave_de_elector'].' - '.$promotor['nombre_completo'];?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
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
                    <?php
                    switch ($rs['status']) {
                        case 'Comprometido':
                            $active_1 = 'active';$active_2 = '';$active_2 = '';
                            break;

                        case 'Militante':
                            $active_1 = '';$active_2 = 'active';$active_3 = '';
                            break;

                        case 'Indeciso':
                            $active_1 = '';$active_2 = '';$active_3 = 'active';
                            break;
                        default:
                            $active_1 = '';$active_2 = '';$active_3 = '';
                            break;
                    }
                    ?>
                    <label class="form-label">Postura Promovido</label>
                    <input type="hidden" id="status_<?=$rs['consecutivo'];?>" name="status_<?=$rs['consecutivo'];?>" class="form-control input-md" value="<?php echo $rs['status']; ?>" >

                    <div class="btn-group btn-group-sm" role="group" aria-label="...">
                        <button type="button" class="btn btn-default <?=$active_1;?>" c="<?=$rs['consecutivo']?>" id="status_1_<?=$rs['consecutivo']?>"  onclick="estatusPromovido(this)" value="Comprometido">Comprometido</button>
                        <button type="button" class="btn btn-default <?=$active_2;?>" c="<?=$rs['consecutivo']?>" id="status_2_<?=$rs['consecutivo']?>"  onclick="estatusPromovido(this)" value="Militante">Militante</button>
                        <button type="button" class="btn btn-default <?=$active_3;?>" c="<?=$rs['consecutivo']?>" id="status_3_<?=$rs['consecutivo']?>"  onclick="estatusPromovido(this)" value="Indeciso">Indeciso</button>
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
                    <?php
                    switch ($rs['tiene_wsp']) {
                        case '1':
                            $active_1 = 'active';
                            $active_2 = '';
                            break;
                        default:
                            $active_1 = '';
                            $active_2 = '';
                            break;
                    }
                    ?>
                    <label class="form-label">Tiene WhatsApp</label>
                    <input type="hidden" id="tiene_wsp_<?=$rs['consecutivo'];?>" name="tiene_wsp_<?=$rs['consecutivo'];?>" class="form-control input-md" value="<?php echo $rs['tiene_wsp']; ?>" >

                    <div class="btn-group btn-group-sm" role="group" aria-label="...">
                        <button type="button" class="btn btn-default <?=$active_1;?>" c="<?=$rs['consecutivo'];?>" id="tiene_wsp_1_<?=$rs['consecutivo'];?>"  onclick="tieneWsp(this)" value="1">Sí</button>
                        <button type="button" class="btn btn-default <?=$active_2;?>" c="<?=$rs['consecutivo'];?>" id="tiene_wsp_2_<?=$rs['consecutivo'];?>"  onclick="tieneWsp(this)" value="0">No</button>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="direccion_actual">Dirección Actual</label>

                        <textarea class="form-control" id="direccion_actual_<?=$rs['consecutivo'];?>" rows="4"><?php echo $rs['direccion']; ?></textarea>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 pull-right">
                    <?php
                    if ($rs['es_promovido'] == 0) {
                        $class = 'btn-green';
                        $color = 'white';
                        $value = 1;
                        $es_promovido = 1;
                        $title = ' Agregar al Grupo de Promovidos';
                        $title_b = '<i class="fa fa-user" ></i>';
                    } else if ($rs['es_promovido'] == 1) {
                        $class = 'btn-danger';
                        $color = 'white';
                        $value = 0;
                        $es_promovido = 0;
                        $title = ' Eliminar del Grupo de Promovidos';
                        $title_b = '<i class="fa fa-lock" ></i>';
                    }
                    ?>

                    <button type="button" id="deactivate_<?=$rs['consecutivo'];?>"
                            class="deactivate btn btn-icon-toggle <?=$class ?>" data-toggle="tooltip"
                            data-placement="top"
                            title="<?=$title;?>"
                            uid="<?=$rs['consecutivo'];?>"
                            active="<?=$value;?>"
                            onclick="ineExtract(this)"
                            es_seccional = "<?=($rs['es_seccional']==1) ? 1:0;?>"
                            es_promotor = "<?=($rs['es_promotor']==1) ? 1:0;?>"
                            es_promovido = "<?=$es_promovido;?>"
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
    include_once('promovidos-new-data.php');
}
?>


