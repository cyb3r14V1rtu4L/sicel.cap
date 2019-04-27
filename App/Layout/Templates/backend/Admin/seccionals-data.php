<?php
$allSeccionals = \Core\Session::get('allSeccionals');
?>
<div class="col-lg-4">
    <select class="form-control "  id="seccional_id" name="seccional_id">
        <option value="0" selected>Seleccionar [LíDER SECCIONAL]</option>
        <?php
        foreach($allSeccionals as $seccional)
        {
            ?>
            <option value="<?php echo $seccional['consecutivo'];?>"><?php echo $seccional['clave_de_elector'].' - '.$seccional['nombre_completo'];?></option>
            <?php
        }
        ?>
    </select>
</div>