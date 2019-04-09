<div class="grid simple">
    <div class="grid-title no-border">

        <h3 class="text-rose border-b"><b>INGRESAR INE</b> [PROMOVIDOS]
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
            
            <div class="col-lg-12" id="main_users_list">
                <?php
                include_once('promovidos-users-data.php');
                ?>
            </div>

        </div>


    </div>
</div>
<script>
    $("#search-by-id").focus();
</script>