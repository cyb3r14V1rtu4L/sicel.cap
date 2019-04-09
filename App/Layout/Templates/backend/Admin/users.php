<div class="grid simple">
    <div class="grid-title no-border">

        <h3 class="text-rose border-b">INGRESAR INE
            <span class="pull-right ">
                    <i class="fa fa-group text-green pull-right  m-r-10"></i>
                </span>
        </h3>

        <div class="row" id="content-users">
            <div class="col-lg-3">
                <div class="input-group">
                    <input class="form-control" type="text" id="search-by-id"
                           placeholder="# INE" value="<?php if(isset($this->search)) { echo $this->search; }?>"
                           onkeyup="getUser();">
                   <span class="input-group-addon bck-green danger">
                   <span class="arrow"></span>
                    <i class="fa fa-align-justify"></i>
                   </span>
                </div>
            </div>
            
            <div class="col-lg-2 pull-right">
                <a href="/admin/index/export_xls">
                    <button type="button"
                            class="deactivate btn btn-icon-toggle" data-toggle="tooltip"
                            data-placement="top"
                            >GENERAR XLS
                    </button>
                </a>
            </div>
            <div class="col-lg-2 pull-right">
                    <button type="button"
                            class="deactivate btn btn-icon-toggle" data-toggle="tooltip"
                            data-placement="top"
                            onclick="mostrarXLS()"
                            >MOSTRAR XLS
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