<div class="bounceInDown animated slow">
    <h2 class="text-center"><i class="mr-2 fas fa-tshirt indigo-text"></i>Listado de productos</h2>
    <hr>
</div>

<div class="col-12 fadeIn animated slow">
    <?php utilidades::AlertOperacion("producto", "registrado") ?>
    <?php utilidades::AlertOperacion("producto", "editado") ?>
    <?php utilidades::AlertOperacion("producto", "borrado") ?>
    <?php utilidades::AlertOperacion("tallaje", "agregado") ?>
    <?php utilidades::AlertOperacion("color", "agregado") ?>
    <?php utilidades::borrarSession("tallaje") ?>
    <?php utilidades::borrarSession("producto") ?>

    <a href="<?php echo base_url ?>productos/crear" type="button" class="btn btn-indigo mx-0">
        <i class="fas fa-plus-square mr-2"></i>Crear nuevo producto
    </a>
    <table class="table table-striped table-inverse">
        <thead class="indigo thead-default text-white">
            <tr class="rounded-top">
                <th class="text-center">N° </th>
                <th class="text-center">Nombre producto</th>
                <th class="text-center">Imagen</th>
                <th class="text-center">Precio</th>
                <th class="text-center">Stock</th>
                <th class="text-center">Tallas</th>
                <th class="text-center">Colores</th>
                <th class="text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productos as $producto) : ?>
                <?php
                $tallas = explode(',', $producto['tallas']);
                ?>
                <tr>
                    <td class="text-center" scope="row"><?php echo $producto['id']; ?></td>
                    <td class="text-center"><?php echo $producto['nombre']; ?></td>
                    <td class="text-center"></td>
                    <td class="text-center">$<?php echo $producto['precio']; ?></td>
                    <td class="text-center"><?php echo $producto['stock']; ?></td>
                    <td>
                        <?php if (!empty($producto['tallas'])) : ?>
                            <div class="content size">
                                <div class="value-size w-100 justify-content-around">
                                    <?php for ($i = 0; $i < COUNT($tallas); $i++) : ?>
                                        <input class="radio-buttons" name="talla" type="radio" data-labelauty="<?php echo $tallas[$i]; ?>|<?php echo $tallas[$i]; ?>" />
                                    <?php endfor; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if (isset($colores_productos[$producto['id']])) : ?>
                            <div class="content color">
                                <div class="value-color justify-content-around">
                                    <?php for ($i = 0; $i < COUNT($colores_productos[$producto['id']]); $i++) : ?>
                                        <input type="radio" class="color" name="color" id="<?php echo $colores_productos[$producto['id']][$i]['color']; ?>" value="<?php echo $colores_productos[$producto['id']][$i]['color']; ?>" />
                                        <label class="color" for="<?php echo $colores_productos[$producto['id']][$i]['color']; ?>"><span class="<?php echo $colores_productos[$producto['id']][$i]['color']; ?>"></span></label>
                                    <?php endfor; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </td>
                    <td>
                        <div class="row justify-content-center px-2">
                            <a class="btn btn-unique mx-0 mx-md-1 col-6 col-md-2" href="<?= base_url ?>productos/anadir_color&producto_id=<?= $producto['id'] ?>" role="button" data-toggle="tooltip" title="Añadir color">
                                <i class="fas fa-fill-drip"></i>
                            </a>
                            <a class="btn btn-info mx-0 mx-md-1 col-6 col-md-2" href="<?= base_url ?>productos/anadir_talla&producto_id=<?= $producto['id'] ?>" role="button" data-toggle="tooltip" title="Añadir talla">
                                <i class="fas fa-ruler"></i>
                            </a>
                            <a class="btn btn-warning mx-0 mx-md-1 col-6 col-md-2" href="<?= base_url ?>productos/editar&producto_id=<?= $producto['id'] ?>" role="button" data-toggle="tooltip" title="Editar producto">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a class="btn btn-danger mx-0 mx-md-1 col-6 col-md-2" href="<?= base_url ?>productos/eliminar&producto_id=<?= $producto['id'] ?>" role="button" data-toggle="tooltip" title="Eliminar producto">
                                <i class="far fa-trash-alt"></i>
                            </a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php
foreach ($productos as $producto) {
    if (isset($colores_productos[$producto['id']])) {
        for ($i = 0; $i < COUNT($colores_productos[$producto['id']]); $i++) {
            $nombre_color = $colores_productos[$producto['id']][$i]['color'];
            $codigo_color = $colores_productos[$producto['id']][$i]['codigo_color'];
            $color_oscuro = utilidades::oscurecerColor($codigo_color, $darker = 2);
            echo '<style>label.color span.' . $nombre_color . '{background: ' . $codigo_color . '!important;} </style>';
            echo '<style>input[type="radio"].color:checked + label .' . $nombre_color . '{border: 2px solid ' . $color_oscuro . '; } </style>';
        }
    }
}
?>