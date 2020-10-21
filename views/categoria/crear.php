<div class="bounceInDown animated slow">
    <h2 class="text-center">Crear nueva categoría</h2>
    <hr>
</div>

<form action="<?php echo base_url ?>/categorias/guardar" method="post" class="fadeIn animated slow clearfix">
    <div class="md-form input-with-post-icon">
        <i class="fas fa-tag input-prefix"></i>
        <input type="text" id="nombre" name="nombre" class="form-control">
        <label for="nombre">Nombre</label>
    </div>
    <button type="submit" class="btn btn-indigo float-lg-right mx-0">Crear</button>
</form>