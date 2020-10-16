<?php require_once 'views\layout\header.php'; ?>

<div class="container-fluid mt-5 row pr-0" style="min-height: 100vh;">

    <?php require_once 'views/layout/sidebar.php';?>

    <!---------------------------------------------------------------------------- */
/*                                    PRODUCTOS                                  */
/* -------------------------------------------------------------------------- -->
    <div class="productos pr-0 col-12 col-lg-9 mt-3">
        <div class="row justify-content-around">
            <div class="col-12 col-md-6 col-xl-4 mb-3 animated fadeIn slow">
                <div class="caja-producto rounded">
                    <div class="image">
                        <img class="img-fluid" src="http://lorempixel.com/500/500/" alt="">
                    </div>
                    <div class="card-content">
                        <div class="wrapper">
                            <div class="d-flex flex-wrap justify-content-between align-content-center titulo">
                                <div class="title">Adidas originals</div>
                                <div class="price">$29.99</div>
                            </div>
                            <p>Camisa deportiva para correr</p>
                            <div class="content size">
                                <div class="name name-size">
                                    Talla
                                </div>
                                <div class="value-size">
                                    <input class="radio-buttons" name="talla" type="radio" data-labelauty="XS|XS" />
                                    <input class="radio-buttons" name="talla" type="radio" data-labelauty="S|S"
                                        checked />
                                    <input class="radio-buttons" name="talla" type="radio" data-labelauty="M|M" />
                                    <input class="radio-buttons" name="talla" type="radio" data-labelauty="L|L"
                                        checked />
                                    <input class="radio-buttons" name="talla" type="radio" data-labelauty="XL|XL" />
                                </div>
                            </div>
                            <div class="content color">
                                <div class="name name-size">
                                    Color
                                </div>
                                <div class="value-color">
                                    <input type="radio" class="color" name="color" id="red" value="red"
                                        data-img="https://cdn.shopify.com/s/files/1/0254/4543/3424/products/camiseta-roja-con-mensaje-cristiano-todo-lo-puedo-en-cristo-shirt-hoodie-regalosgifts-premium-tee-red-sml-129905_1024x1024@2x.jpg?v=1581898258" />
                                    <label class="color" for="red"><span class="red"></span></label>

                                    <input type="radio" class="color" name="color" id="green" value="green" />
                                    <label class="color" for="green"><span class="green"></span></label>

                                    <input type="radio" class="color" name="color" id="yellow" value="yellow" />
                                    <label class="color" for="yellow"><span class="yellow"></span></label>

                                    <input type="radio" class="color" name="color" id="olive" value="olive" />
                                    <label class="color" for="olive"><span class="olive"></span></label>

                                    <input type="radio" class="color" name="color" id="orange" value="orange" />
                                    <label class="color" for="orange"><span class="orange"></span></label>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center px-0  flex-wrap botones"
                                role="group" aria-label="Button group">
                                <button class="btn btn-indigo flex-grow-1 mx-1" type="button">Buy now</button>
                                <button class="btn btn-indigo flex-grow-1 mx-1" type="button" data-toggle="tooltip"
                                    title="Añadir al carrito">
                                    <i class="fas fa-cart-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-xl-4 mb-3 animated fadeIn slow">
                <div class="caja-producto rounded">
                    <div class="image">
                        <img class="img-fluid" src="http://lorempixel.com/500/500/" alt="">
                    </div>
                    <div class="card-content">
                        <div class="wrapper">
                            <div class="d-flex flex-wrap justify-content-between align-content-center titulo">
                                <div class="title">Adidas originals</div>
                                <div class="price">$29.99</div>
                            </div>
                            <p>Camisa deportiva para correr</p>
                            <div class="content size">
                                <div class="name name-size">
                                    Talla
                                </div>
                                <div class="value-size">
                                    <input class="radio-buttons" name="talla" type="radio" data-labelauty="XS|XS" />
                                    <input class="radio-buttons" name="talla" type="radio" data-labelauty="S|S"
                                        checked />
                                    <input class="radio-buttons" name="talla" type="radio" data-labelauty="M|M" />
                                    <input class="radio-buttons" name="talla" type="radio" data-labelauty="L|L"
                                        checked />
                                    <input class="radio-buttons" name="talla" type="radio" data-labelauty="XL|XL" />
                                </div>
                            </div>
                            <div class="content color">
                                <div class="name name-size">
                                    Color
                                </div>
                                <div class="value-color">
                                    <input type="radio" class="color" name="color" id="red" value="red"
                                        data-img="https://cdn.shopify.com/s/files/1/0254/4543/3424/products/camiseta-roja-con-mensaje-cristiano-todo-lo-puedo-en-cristo-shirt-hoodie-regalosgifts-premium-tee-red-sml-129905_1024x1024@2x.jpg?v=1581898258" />
                                    <label class="color" for="red"><span class="red"></span></label>

                                    <input type="radio" class="color" name="color" id="green" value="green" />
                                    <label class="color" for="green"><span class="green"></span></label>

                                    <input type="radio" class="color" name="color" id="yellow" value="yellow" />
                                    <label class="color" for="yellow"><span class="yellow"></span></label>

                                    <input type="radio" class="color" name="color" id="olive" value="olive" />
                                    <label class="color" for="olive"><span class="olive"></span></label>

                                    <input type="radio" class="color" name="color" id="orange" value="orange" />
                                    <label class="color" for="orange"><span class="orange"></span></label>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center px-0  flex-wrap botones"
                                role="group" aria-label="Button group">
                                <button class="btn btn-indigo flex-grow-1 mx-1" type="button">Buy now</button>
                                <button class="btn btn-indigo flex-grow-1 mx-1" type="button" data-toggle="tooltip"
                                    title="Añadir al carrito">
                                    <i class="fas fa-cart-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-xl-4 mb-3 animated fadeIn slow">
                <div class="caja-producto rounded">
                    <div class="image">
                        <img class="img-fluid" src="http://lorempixel.com/500/500/" alt="">
                    </div>
                    <div class="card-content">
                        <div class="wrapper">
                            <div class="d-flex flex-wrap justify-content-between align-content-center titulo">
                                <div class="title">Adidas originals</div>
                                <div class="price">$29.99</div>
                            </div>
                            <p>Camisa deportiva para correr</p>
                            <div class="content size">
                                <div class="name name-size">
                                    Talla
                                </div>
                                <div class="value-size">
                                    <input class="radio-buttons" name="talla" type="radio" data-labelauty="XS|XS" />
                                    <input class="radio-buttons" name="talla" type="radio" data-labelauty="S|S"
                                        checked />
                                    <input class="radio-buttons" name="talla" type="radio" data-labelauty="M|M" />
                                    <input class="radio-buttons" name="talla" type="radio" data-labelauty="L|L"
                                        checked />
                                    <input class="radio-buttons" name="talla" type="radio" data-labelauty="XL|XL" />
                                </div>
                            </div>
                            <div class="content color">
                                <div class="name name-size">
                                    Color
                                </div>
                                <div class="value-color">
                                    <input type="radio" class="color" name="color" id="red" value="red"
                                        data-img="https://cdn.shopify.com/s/files/1/0254/4543/3424/products/camiseta-roja-con-mensaje-cristiano-todo-lo-puedo-en-cristo-shirt-hoodie-regalosgifts-premium-tee-red-sml-129905_1024x1024@2x.jpg?v=1581898258" />
                                    <label class="color" for="red"><span class="red"></span></label>

                                    <input type="radio" class="color" name="color" id="green" value="green" />
                                    <label class="color" for="green"><span class="green"></span></label>

                                    <input type="radio" class="color" name="color" id="yellow" value="yellow" />
                                    <label class="color" for="yellow"><span class="yellow"></span></label>

                                    <input type="radio" class="color" name="color" id="olive" value="olive" />
                                    <label class="color" for="olive"><span class="olive"></span></label>

                                    <input type="radio" class="color" name="color" id="orange" value="orange" />
                                    <label class="color" for="orange"><span class="orange"></span></label>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center px-0  flex-wrap botones"
                                role="group" aria-label="Button group">
                                <button class="btn btn-indigo flex-grow-1 mx-1" type="button">Buy now</button>
                                <button class="btn btn-indigo flex-grow-1 mx-1" type="button" data-toggle="tooltip"
                                    title="Añadir al carrito">
                                    <i class="fas fa-cart-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once 'views\layout\footer.php'; ?>