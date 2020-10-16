<!---------------------------------------------------------------------------- */
/*                           MODAL AJUSTES Y OPCIONES                             */
/* -------------------------------------------------------------------------- -->

<div class="modal fade mt-5" id="ajustes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Información del usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php if ($_SESSION["usuario"]->cargo == 'Admin') : ?>
                <a href="" class="indigo-text"><i class="mr-2 fas fa-tag"></i>Gestionar categorías</a>
                <hr>
                <a href="" class="indigo-text"><i class="mr-2 fas fa-tshirt"></i>Gestionar productos</a>
                <hr>
                <a href="" class="indigo-text"><i class="mr-2 fas fa-palette"></i>Gestionar colores</a>
                <hr>
                <a href="" class="indigo-text"><i class="mr-2 fas fa-ruler-combined"></i>Gestionar tallas</a>
                <?php elseif ($_SESSION["usuario"]->cargo == 'Cliente') : ?>
                <a href="" class="indigo-text"><i class="mr-2 fas fa-truck-moving"></i>Visualizar pedidos</a>
                <hr>
                <a href="" class="indigo-text"><i class="mr-2 fas fa-tools"></i>Modificar perfil</a>
                <?php endif; ?>
                <hr>
                <a href="<?php echo base_url; ?>/usuarios/logout" class="indigo-text"><i
                        class="mr-2 fas fa-window-close"></i>Cerrar sesión</a>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!---------------------------------------------------------------------------- */
/*                           MODAL OLVIDE LA CONTRASEÑA                        */
/* -------------------------------------------------------------------------- -->

<!-- Modal -->
<div class="modal fade" id="recuperar_password" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Recuperar contraseña</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Ingresa el correo con el que registraste y revisa tu correo electrónico para reiniciar la contraseña.
                </p>
                <form action="" id="recuperar_contra" method="post">
                    <div class="md-form input-with-post-icon">
                        <i class="fas fa-at input-prefix"></i>
                        <input type="text" id="suffixInside" class="form-control">
                        <label for="suffixInside">Correo electrónico </label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-indigo" form="recuperar_contra">Recuperar contraseña</button>
            </div>
        </div>
    </div>
</div>