<div class="row justify-content-around">
    <?php foreach ($productos as $producto) : ?>
        <?php if (isset($colores_productos[$producto['id']]) && $producto['tallas'] != null) : ?>
            <?php $tallas = explode(',', $producto['tallas']); ?>
            <div class="col-12 col-md-6 col-xl-3 mb-3 animated fadeIn slow">
                <div class="caja-producto rounded">
                    <?php
                    $primer_color = $colores_productos[$producto['id']][0]['color'];
                    $primera_imagen = $colores_productos[$producto['id']][0]['imagen_1'];
                    ?>
                    <div class="image">
                        <img class="img-fluid" src="assets/img/productos/<?= $producto['nombre'] . '-' . $producto['id'] ?>/<?= $primer_color ?>/<?= $primera_imagen ?>" alt="">
                    </div>
                    <div class="card-content">
                        <div class="wrapper">
                            <div class="d-flex flex-wrap justify-content-between align-content-center titulo w-100">
                                <div class="title"><?= $producto['nombre'] ?></div>
                                <div class="price py-1">$<?= $producto['precio'] ?> COP</div>
                            </div>
                            <p class="mb-0"><?= substr($producto['descripcion'], 0, 120) . "..." ?></p>
                            <div class="content size m-0">
                                <div class="form-group">
                                    <div class="select" id="el1">
                                        <i class="fas fa-angle-down"></i>
                                        <select name="select" id="select">
                                            <option value="" selected="" disabled>Selecciona tu sexo</option>
                                            <option value="1">Hombre</option>
                                            <option value="2">Mujer</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="name name-size">
                                    Tallas
                                </div>
                                <div class="value-size">
                                    <?php if (!empty($producto['tallas'])) : ?>
                                        <?php for ($i = 0; $i < COUNT($tallas); $i++) : ?>
                                            <input class="radio-buttons" name="talla" type="radio" data-labelauty="<?php echo $tallas[$i]; ?>|<?php echo $tallas[$i]; ?>" />
                                        <?php endfor; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="content color">
                                <div class="name name-size">
                                    Color
                                </div>
                                <div class="value-color justify-content-between w-75">
                                    <?php for ($i = 0; $i < COUNT($colores_productos[$producto['id']]); $i++) : ?>
                                        <?php
                                        $color = $colores_productos[$producto['id']][$i]['color'];
                                        $imagen = $colores_productos[$producto['id']][$i]['imagen_1'];
                                        ?>
                                        <input type="radio" class="color" name="color" id="<?= $color ?>-<?= $producto['id'] ?>" value="<?= $color ?>" data-img="assets/img/productos/<?= $producto['nombre'] . '-' . $producto['id'] ?>/<?= $color ?>/<?= $imagen ?>" />
                                        <label class="color" for="<?= $color ?>-<?= $producto['id'] ?>"><span class="<?= $color ?>"></span></label>
                                    <?php endfor; ?>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between align-items-center px-0  flex-wrap botones" role="group" aria-label="Button group">
                                <button class="btn btn-indigo flex-grow-1 mx-1" type="button">Buy now</button>
                                <button class="btn btn-indigo flex-grow-1 mx-1" type="button" data-toggle="tooltip" title="Añadir al carrito">
                                    <i class="fas fa-cart-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
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