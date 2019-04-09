<div class="row">
    <div class="col-lg-6 col-lg-offset-3">
        <div class="mt5 modal-form">

            <form method="post" action="/login">


                <h4 class='text-danger text-center login-text-danger'></h4>


                <?php
                if(isset($error)){
                    echo $error;
                }

                ?>

                <div class="form-group">
                    <input class="form-control shadow" type="text" name="email" placeholder="User:">
                </div>

                <div class="form-group">
                    <input class="form-control shadow" type="password" name="password" placeholder="Password:">
                </div>

                <!--<div class="checkbox">
                    <label class="text-gray2">
                        <input type="checkbox">Remember my password <a href="#" class="text-green">I forgot my password</a></label>
                </div>-->
                <input type="hidden" name="submitButton" value="1">

                <div class="text-center">
                    <button class="btn btn-primary text-center login-btn"  type="submit">Entrar</button>
                </div>

            </form>
        </div>
    </div>
</div>

