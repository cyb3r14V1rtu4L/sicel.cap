
            <div class="row">
                <input class="form-control "
                       id="coordinador_id_0"
                       name="coordinador_id_0"
                       value="<?=$_SESSION['coordinador_id']?>"
                       type="text"
                />
                <div class="col-lg-4">
                    <input id="clave_de_elector_0" name="clave_de_elector_0" type="hidden" class="form-control input-md" value="<?php if(isset($_SESSION['ine'])) { echo $_SESSION['ine']; }?>">

                    <div class="form-group">
                        <label class="form-label">Municipio</label>
                        <div class="input-with-icon  right">
                            <i class="fa fa-globe"></i>

                            <input id="municipio_0" name="municipio_0" type="text" class="form-control input-md" value="" required="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-label">Fecha</label>
                        <div class="input-with-icon  right">
                            <i class="fa fa-calendar"></i>

                            <input id="fecha_grabo_0" name="fecha_grabo_0" type="text" class="form-control input-md" value="" required="">
                        </div>
                    </div>
                </div>


                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-label">Sección</label>
                        <div class="input-with-icon  right">
                            <i class="fa fa-book"></i>
                            <input id="seccion_0" name="seccion_0" type="text" class="form-control input-md" value="" required="">
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

                            <input id="paterno_0" name="paterno_0" type="text" class="form-control input-md" value="" required="">
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
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

                            <input id="nombres_0" name="nombres_0" type="text" class="form-control input-md" value="" required="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <label class="form-label">Edad</label>
                        <div class="input-with-icon  right">
                            <i class="fa fa-user"></i>

                            <input id="edad_0" name="edad_0" type="text" class="form-control input-md" value="" required="">
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="direccion_actual_0">Dirección Actual</label>

                        <textarea class="form-control" id="direccion_actual_0" rows="4"></textarea>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label class="form-label">Teléfono Celular</label>
                        <div class="input-with-icon  ">
                            <i class="fa fa-phone"></i>
                            <input id="telefono_0" name="telefono_0" type="text" class="form-control input-md" value="" required="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label class="form-label">Facebook</label>
                        <div class="input-with-icon  ">
                            <i class="fa fa-facebook-square"></i>
                            <input id="facebook_0" name="facebook_0" type="text" class="form-control input-md" value="" >
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label class="form-label">E-Mail</label>
                        <div class="input-with-icon  ">
                            <i class="fa fa-envelope-square"></i>
                            <input id="correo_0" name="correo_0" type="text" class="form-control input-md" value="" >
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
                            <input id="ocupacion_0" name="ocupacion_0" type="text" class="form-control input-md" value="" required="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-label">Lugar Laboral</label>
                        <div class="input-with-icon  ">
                            <i class="fa fa-building"></i>
                            <input id="lugar_trabajo_0" name="lugar_trabajo_0" type="text" class="form-control input-md" value="" >
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-label">Horario Disponibles</label>
                        <div class="input-with-icon  ">
                            <i class="fa fa-clock-o"></i>
                            <input id="horario_disponible_0" name="horario_disponible_0" type="text" class="form-control input-md" value="" >
                        </div>
                    </div>
                </div>


            </div>

            <div class="row">

                <div class="col-lg-4">



                    <label class="form-label">Líder Seccional</label>

                    <select class="form-control "  id="seccional_id_0" name="seccional_id_0"
                            >
                        <option value="" selected>Seleccionar</option>
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

                <div class="col-lg-4">
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
                    >
                        <?=$title_b;?>
                        <?=$title;?>
                    </button>
                </div>

            </div>
        <hr>



