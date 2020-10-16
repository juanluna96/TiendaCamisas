<h2 class="text-center animated bounceInDown slow">Registrarse</h2>
<hr class="px-3">

<?php if (isset($_SESSION["register"]) && $_SESSION["register"]=="completado"): ?>
<div class="alert alert-info" role="alert">
    <strong>Felicidades</strong>, te has registrado exitosamente
</div>
<?php elseif (isset($_SESSION["register"]) && $_SESSION["register"]=="fallido"): ?>
<div class="alert alert-danger" role="alert">
    </strong>Lastima</strong>, tu proceso de registro no se llevo a cabo, intenta de nuevo.
</div>
<?php endif; ?>
<?php utilidades::borrarSession('register');?>


<form action="<?php echo base_url;?>usuarios/guardar" class="animated fadeIn slow px-3 mb-2 row" method="POST"
    enctype="multipart/form-data">
    <div class="col-12 col-md-6 order-2 order-md-1">
        <div class="md-form mt-0">
            <input type="text" id="nombre" class="form-control" name="nombre" required>
            <label for="nombre">Nombre</label>
        </div>
        <div class="md-form">
            <input type="text" id="apellidos" class="form-control" name="apellidos" required>
            <label for="apellidos">Apellidos</label>
        </div>
        <div class="md-form">
            <input type="email" id="email" class="form-control" name="email" required>
            <label for="email">Email</label>
        </div>
        <div class="md-form">
            <input type="password" id="password" class="form-control" name="password">
            <label for="password">Contraseña</label>
        </div>
        <input type="hidden" name="rol" value="2">
        <button type="submit" class="btn btn-indigo mx-0 btn-block">Registrarse</button>
    </div>

    <div class="col-12 col-md-6 order-1 order-md-2">
        <label for="avatar" class="text-muted">Seleccione una imagen de perfil:</label>
        <div class="d-flex justify-content-center mb-4 flex-column">
            <div class="kv-avatar text-center mx-auto">
                <div class="file-loading">
                    <input id="avatar" name="avatar" type="file" required>
                </div>
            </div>
            <small class="text-muted mt-2 text-center">Tamaño máximo: 1.5MB</small>
        </div>
    </div>


</form>