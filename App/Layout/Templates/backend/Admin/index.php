<div class="grid simple">
    <div class="grid-title no-border">

        <h3 class="text-rose border-b">&nbsp;
            <span class="pull-right ">
                    <i class="fa fa-group text-green pull-right  m-r-10"></i>
                </span>
        </h3>

        <div class="row">
            <div class="col-lg-4">
                <select class="form-control "  id="coordinador_id" name="coordinador_id"
                        onchange="changeCoordinador();"
                >
                    <option selected value="0">Seleccionar [COORDINADOR]</option>
                    <?php
                    foreach($allCoordinadores as $coordinador)
                    {
                        ?>
                        <option value="<?php echo $coordinador['consecutivo'];?>" ><?php echo $coordinador['clave_de_elector'].' - '.$coordinador['nombre_completo'];?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="row" id="content-users">
            <div class="col-lg-2 pull-right generaXLS" style="display: none;">
                <a href="/admin/index/export_xls">
                    <button type="button"
                            class=" btn  btn-danger" data-toggle="tooltip"
                            data-placement="top"
                            id=""
                            >Generar XLS
                    </button>
                </a>
            </div>
            <div class="col-lg-2 pull-right generaXLS"  style="display: none;">
                    <button type="button"
                            class=" btn btn-primary" data-toggle="tooltip"
                            data-placement="top"
                            onclick="mostrarXLS()"
                            >Mostrar XLS
                    </button>
            </div>

            <!--<div class="col-lg-9">
                <button class="btn btn-green pull-right  " data-toggle="modal" data-target="#upgrade-modal"><span class="fa fa-cog"></span> Memberships</button>

            </div>-->

            <div class="col-lg-12 text-center paginacion">
                <?php if(isset($this->paginacion)){ echo $this->paginacion;} ?>
            </div>

            <div class="col-lg-12" id="main_users_list">
                <?php
                include_once('users-data.php');
                ?>
            </div>


        </div>

        <div class="row text-center paginacion"  >
            <?php if(isset($this->paginacion)){ echo $this->paginacion;} ?>
        </div>
    </div>
</div>
<script>
    $("#search-by-id").focus();
</script>