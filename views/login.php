<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<link href="public/css/estilos.css" rel="stylesheet" id="bootstrap-css">
<script src="public/js/functions.js?<?php echo time(); ?>"></script>
<link rel="stylesheet" href="public/dist/sweetalert/sweetalert2.css"/>
<link href="public/dist/images/favicon.png" rel="shortcut icon">

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-login">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-4">
                            <a href="#" class="active" id="login-form-link">Iniciar sesión</a>
                        </div>
                        <div class="col-xs-4">
                            <a href="#" id="register-form-link">Regístrate ahora</a>
                        </div>
                        <div class="col-xs-4">
                            <a href="#" id="show-news">Ver noticias</a>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form id="login-form" role="form" style="display: block;">
                                <div class="form-group">
                                    <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Usuario" value="">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Contraseña">
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6 col-sm-offset-3">
                                            <input type="button" name="login-button" id="login-button" tabindex="3" class="form-control btn btn-login" value="Iniciar sesión">
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <form id="register-form" role="form" style="display: none;">
                                <div class="form-group">
                                    <input type="text" name="newUsername" id="newUsername" required tabindex="4" class="form-control" placeholder="Usuario *" value="">
                                    <div class="error left-align" id="err-user">Debe ingresar un Nombre de Usuario.</div>
                                    <div class="error left-align" id="err-existUser">El usuario ingresado ya existe.</div>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="newEmail" id="newEmail" required tabindex="5" class="form-control" placeholder="Correo electronico *" value="">
                                    <div class="error left-align" id="err-email">Debe ingresar un Correo válido.</div>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="newPassword" id="newPassword" required tabindex="6" class="form-control" placeholder="Contraseña *">
                                    <div class="error left-align" id="err-password">Debe ingresar una contraseña.</div>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="confirm-password" id="confirm-password" required tabindex="7" class="form-control" placeholder="Confirmar contraseña *">
                                    <div class="error left-align" id="err-confirmPassword">Debe confirmar su contraseña.</div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6 col-sm-offset-3">
                                            <input type="button" name="register-button" id="register-button" tabindex="8" class="form-control btn btn-register" value="Crear cuenta">
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <form id="news-form" role="form" style="display: none;">
                                <div class="row">
                                    <?php
                                    $news = $modelNoticias->shownews();
                                    foreach($news as $key)
                                    {
                                        ?>
                                        <div class="col-md-12">
                                            <div class="card mb-4 box-shadow">
                                                <p class="card-text descriptionCar"><h2><?php echo "Titutlo: ".$key['not_titulo']; ?></h2></p>
                                                <img class="card-img-top" data-src="<?php echo $key['not_imagen']; ?>" alt="Thumbnail [100%x225]" style="height: 100px; width: 100px; display: block;" src="<?php echo $key['not_imagen']; ?>" data-holder-rendered="true">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <small class="text-muted">
                                                            <?php echo $key['not_texto']; ?>
                                                        </small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script  type="text/javascript" src="public/dist/sweetalert/sweetalert2.js"></script>