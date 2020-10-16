<div class="bounceInDown animated slow">
    <h2 class="text-center">Gestionar categorías</h2>
    <hr>
</div>

<div class="col-12 fadeIn animated slow">
    <a href="<?php echo base_url ?>categorias/crear" type="button" class="btn btn-indigo mx-0"><i
            class="fas fa-plus-square mr-2"></i>Crear nueva
        categoría</a>
    <table class="table table-striped table-inverse">
        <thead class="indigo thead-default text-white">
            <tr class="rounded-top">
                <th>#</th>
                <th>Categoría</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categorias as $categoria) : ?>
            <tr>
                <td scope="row"><?php echo $categoria['id']; ?></td>
                <td><?php echo $categoria['nombre']; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>