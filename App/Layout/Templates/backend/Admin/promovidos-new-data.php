<div class="row">
    <div class="col-lg-4">
        <div class="form-group">
            <label class="form-label">Apellido Paterno</label>
            <div class="input-with-icon  right">
                <i class="fa fa-user"></i>

                <input id="paterno_0" name="paterno_0" type="text" class="form-control input-md" value="" required="">
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="form-group">
            <label class="form-label">Apellido Materno</label>
            <div class="input-with-icon  right">
                <i class="fa fa-user"></i>

                <input id="materno_0" name="materno_0" type="text" class="form-control input-md" value="">
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            <label class="form-label">Nombre(s)</label>
            <div class="input-with-icon  right">
                <i class="fa fa-user"></i>

                <input id="nombres_0" name="nombres_0" type="text" class="form-control input-md" value="" >
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            <label class="form-label">Sección</label>
            <div class="input-with-icon  right">
                <i class="fa fa-book"></i>
                <input id="seccion_0" name="seccion_0" type="text" class="form-control input-md" value="" >
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            <label class="form-label">Clave de Elector</label>
            <div class="input-with-icon  right">
                <i class="fa fa-credit-card"></i>
                <input id="clave_de_elector_0" name="clave_de_elector_0" type="text" class="form-control input-md" value="<?php if(isset($_SESSION['ine'])) { echo $_SESSION['ine']; }?>">

            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <label class="form-label">Postura Promovido</label>
        <input type="hidden" id="status_0" name="status_0" type="text" class="form-control input-md" value="" >

        <div class="btn-group btn-group-sm" role="group" aria-label="...">
            <button type="button" class="btn btn-default " c="0" id="status_1_0"  onclick="estatusPromovido(this)" value="Comprometido">Comprometido</button>
            <button type="button" class="btn btn-default " c="0" id="status_2_0"  onclick="estatusPromovido(this)" value="Militante">Militante</button>
            <button type="button" class="btn btn-default " c="0" id="status_3_0"  onclick="estatusPromovido(this)" value="Indeciso">Indeciso</button>
        </div>
    </div>


</div>
<div class="row">
    <div class="col-lg-4">
        <div class="form-group">
            <label class="form-label">Teléfono Celular</label>
            <div class="input-with-icon  ">
                <i class="fa fa-phone"></i>
                <input id="telefono_0" name="telefono_0" type="text" class="form-control input-md" value="" required="">
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <label class="form-label">Tiene WhatsApp</label>
        <input type="hidden" id="tiene_wsp_0" name="tiene_wsp_0" type="text" class="form-control input-md" value="" >

        <div class="btn-group btn-group-sm" role="group" aria-label="...">
            <button type="button" class="btn btn-default " c="0" id="tiene_wsp_1_0"  onclick="tieneWsp(this)" value="1">Sí</button>
            <button type="button" class="btn btn-default " c="0" id="tiene_wsp_2_0"  onclick="tieneWsp(this)" value="0">No</button>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="form-group">
            <label for="direccion_actual">Dirección Actual</label>

            <textarea class="form-control" id="direccion_actual_0" rows="4"></textarea>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label for="comentarios_0">Propuestas Ciudadanas</label>

            <textarea class="form-control" id="comentarios_0" rows="4"></textarea>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 pull-right">
        <?php
            $class = 'btn-green';
            $color = 'white';
            $value = 1;
            $es_promovido = 1;
            $title = ' Agregar al Grupo Promotores';
            $title_b = '<i class="fa fa-user" ></i>';

        ?>

        <button type="button" id="deactivate_0"
                class="deactivate btn btn-icon-toggle <?=$class ?>" data-toggle="tooltip"
                data-placement="top"
                title="<?=$title;?>"
                uid="0"
                active="<?=$value;?>"
                onclick="ineExtract(this)"
                es_seccional = "0"
                es_promotor = "0"
                es_promovido = "<?=$es_promovido;?>"
        >
            <?=$title_b;?>
            <?=$title;?>
        </button>
    </div>
</div>
<hr>



