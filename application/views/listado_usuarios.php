<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>






<div class="wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3 class="home">PREVCRIM</h3>
        </div>

        <ul class="list-unstyled components">

            <li class="active">
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Menu</a>
                <ul class="collapse list-unstyled" id="homeSubmenu">


                    <li>
                        <a href="listado">Tabla de delincuentes</a>
                    </li>
                    <li>
                        <a href="/listado_compilado">Tabla de listados</a>
                    </li>
                </ul>
            </li>

            <?php if ($session['rol'] !== 'OPERADOR') {  ?>
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Menu
                        Institucional</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="listadoJefezona">Listado de Personal</a>
                        </li>
                    </ul>
                </li>
            <?php } ?>
        </ul>

        <ul class="list-unstyled CTAs">
            <li>
                <a href="Login" class="article">Cerrar Sesión </a>
            </li>
            <!--    <li>
                <a href="editar_clave" class="article">Editar Perfil </a>
            </li> -->
        </ul>
    </nav>

    <!-- Page Content  -->

    <div id="content">

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid fix-relative">

                <button type="button" id="sidebarCollapse" class="btn btn-info">
                    <i class="fa fa-bars" aria-hidden="true"></i>
                </button>


                <button type="button" class="btn btn-info btnAddUsuario" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-address-book" aria-hidden="true"> Agregar Usuario</i>
                </button>




                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ml-auto">
                    </ul>
                </div>
            </div>
        </nav>
        <!--tabla de contenido -->

        <h2 align="center">Listado de Personal</h2>
        <div class="panel panel-primary filterable">
            <div class="panel-heading">

                <div class="pull-right">
                    <button class="btn btn-dark btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span>Filtrar Usuario</button>
                </div>
            </div>
            <table class="table">

                <thead class="filters">
                    <tr>
                        <th><input type="text" class="form-control" placeholder="Rut" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Nombre" disabled></th>
                        <th scope="col">Email </th>
                        <th scope="col">Fecha habilitacion</th>
                        <th scope="col">Institucion</th>
                        <th scope="col">Cargo</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($usuarios as $item) { ?>
                        <?php if ($session['rol'] !== 'ADMIN' &&  $session['institucion'] === $item->idinstitucion_fk) : ?>
                            <tr>
                                <td><?php echo $item->rut ?></td>
                                <td><?php echo $item->nombre   ?></td>
                                <td><?php echo $item->correo  ?></td>
                                <td><?php echo $item->fecha_habilitacion ?></td>
                                <td><?php echo $item->nombre_institucion_fk ?></td>
                                <td><?php echo $item->rol ?></td>
                                <td><button data-id="<?php echo $item->idusuario ?>" class="btn btn-info btn-block editarbtn "><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></td>
                                <td><button data-id="<?php echo $item->idusuario ?>" class="btn btn-info btn-block eliminarbtn"><i class="fa fa-trash" aria-hidden="true"></i></button></td>
                            </tr>
                        <?php elseif ($session['rol'] === 'ADMIN') : ?>
                            <tr>
                                <td><?php echo $item->rut ?></td>
                                <td><?php echo $item->nombre   ?></td>
                                <td><?php echo $item->correo  ?></td>
                                <td><?php echo $item->fecha_habilitacion ?></td>
                                <td><?php echo $item->nombre_institucion_fk ?></td>
                                <td><?php echo $item->rol ?></td>
                                <td><button data-id="<?php echo $item->idusuario ?>" class="btn btn-info btn-block editarbtn "><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></td>
                                <td><button data-id="<?php echo $item->idusuario ?>" class="btn btn-info btn-block eliminarbtn"><i class="fa fa-trash" aria-hidden="true"></i></button></td>
                            </tr>
                        <?php endif; ?>
                    <?php } ?>
                </tbody>
        </div>

        <hr>
        <!--footer 
            <footer id="footer-listado">
                <div class="card text-center">
                    <div class="card-header">
                        Featured
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Todos los derechos reservados</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                    <div class="card-footer text-muted">
                        2 days ago
                    </div>
                </div>
            </footer>
           fin footer-->
    </div>
</div>

</div>



<!-- jQuery CDN - Slim version (=without AJAX) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous">
</script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous">
</script>
<!-- jQuery Custom Scroller CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js">
</script>

<script type="text/javascript">
    $(document).ready(function() {



        $("#sidebar").mCustomScrollbar({
            theme: "minimal"
        });

        $('#sidebarCollapse').on('click', function() {
            $('#sidebar, #content').toggleClass('active');
            $('.collapse.in').toggleClass('in');
            $('a[aria-expanded=true]').attr('aria-expanded', 'false');
        });
        //funciones para editar y eliminar un registro de la tabla delincuentes 
        //funciones para editar y eliminar un registro de la tabla delincuentes 
        $('.editarbtn').on('click', function() {
            const base_url = "<?php echo base_url('') ?>"
            const base_url_sin_application = base_url.replace("application/", "");

            window.location.href = base_url_sin_application + "editar_usuario/" + $(this).data("id");
        });

        $('.eliminarbtn').on('click', function() {
            const base_url = "<?php echo base_url('') ?>"
            const base_url_sin_application = base_url.replace("application/", "");

            window.location.href = base_url_sin_application + "listadoJefezona/eliminar/" + $(this).data("id");
        });
        $('.filterable .btn-filter').click(function() {
            var $panel = $(this).parents('.filterable'),
                $filters = $panel.find('.filters input'),
                $tbody = $panel.find('.table tbody');
            if ($filters.prop('disabled') == true) {
                $filters.prop('disabled', false);
                $filters.first().focus();
            } else {
                $filters.val('').prop('disabled', true);
                $tbody.find('.no-result').remove();
                $tbody.find('tr').show();
            }
        });

        $('.filterable .filters input').keyup(function(e) {
            /* Ignore tab key */
            var code = e.keyCode || e.which;
            if (code == '9') return;
            /* Useful DOM data and selectors */
            var $input = $(this),
                inputContent = $input.val().toLowerCase(),
                $panel = $input.parents('.filterable'),
                column = $panel.find('.filters th').index($input.parents('th')),
                $table = $panel.find('.table'),
                $rows = $table.find('tbody tr');
            /* Dirtiest filter function ever ;) */
            var $filteredRows = $rows.filter(function() {
                var value = $(this).find('td').eq(column).text().toLowerCase();
                return value.indexOf(inputContent) === -1;
            });
            /* Clean previous no-result if exist */
            $table.find('tbody .no-result').remove();
            /* Show all rows, hide filtered ones (never do that outside of a demo ! xD) */
            $rows.show();
            $filteredRows.hide();
            /* Prepend no-result row if all rows are filtered */
            if ($filteredRows.length === $rows.length) {
                $table.find('tbody').prepend($('<tr class="no-result text-center"><td colspan="' + $table.find('.filters th').length + '">No se han encontrado resultados</td></tr>'));
            }
        });
        $('.home').on('click', function() {
            window.location.href = "/home";
        });

        $('.btnAddUsuario').on('click', function() {
            window.location.href = "/agregar_usuario";
        });





    });
</script>