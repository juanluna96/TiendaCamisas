<!---------------------------------------------------------------------------- */
/*                                    LOGIN-SIDEBAR                            */
/* -------------------------------------------------------------------------- -->



<div class="sidebar login col-12 col-lg-3 pr-0 mt-3">
    <?php if (!isset($_SESSION["usuario"])) : ?>
    <div class="col-12 bg-white rounded p-2 animated bounceInDown slow">
        <?php if (isset($_SESSION["error_login"])) : ?>
        <div class="alert alert-danger text-center" role="alert">
            <?php echo $_SESSION["error_login"]; ?>
        </div>
        <?php endif; ?>
        <h4 class="text-center">Inicia sección</h4>
        <hr>
        <form action="<?php echo base_url; ?>usuarios/login" class="px-2" method="post">
            <div class="md-form">
                <i class="fas fa-user prefix"></i>
                <input type="email" id="nombre_usuario" class="form-control" name="nombre_usuario">
                <label for="nombre_usuario">Correo electrónico</label>
            </div>
            <div class="md-form">
                <i class="fas fa-lock prefix" id="icon"></i>
                <input type="password" id="contra" class="form-control password" name="password">
                <label for="contra">Contraseña</label>
            </div>
            <button type="submit" class="btn btn-indigo btn-block">Iniciar sesión</button>
            <small class="text-center d-block">
                <a href="" class="text-secondary" data-toggle="modal" data-target="#recuperar_password">
                    ¿Olvidaste tu contraseña?
                </a>
            </small>
            <a class="btn btn-outline-primary btn-block mt-2" href="<?php echo base_url; ?>usuarios/registro"
                role="button">Registrarse</a>
        </form>
    </div>
    <?php else : ?>
    <div class="col-12 bg-white rounded p-2 animated bounceInDown slow">
        <h3 class="text-center"><?php echo $_SESSION["usuario"]->nombre . " " . $_SESSION["usuario"]->apellidos; ?></h3>
        <hr>
        <p class="text-center text-muted">¿Que deseas hacer hoy?</p>
        <a class="btn btn-indigo btn-block mt-2" href="<?php echo base_url; ?>/usuarios/logout"
            role="button">Deslogearse</a>
    </div>
    <?php endif; ?>
</div>