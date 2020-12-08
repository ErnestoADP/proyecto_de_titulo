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
                        <a href="/listado">Tabla de delincuentes</a>
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
        </ul>
    </nav>

    <!-- Page Content  -->
    <div id="content">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark  ">
            <div class="container-fluid">
                <button type="button" id="sidebarCollapse" class="btn btn-info">
                    <i class="fa fa-bars" aria-hidden="true"></i>
                </button>

                <button type="button" id="addDelincuente" class="btn btn-info">
                    <i class="fa fa-address-book" aria-hidden="true"> Agregar delincuente</i>
                </button>
            </div>
        </nav>
        <!--tabla de contenido -->
        <h2 align="center">Listado de Delincuentes</h2>

        <div class="panel panel-primary filterable">
            <div class="panel-heading">
            </div>
            <table id="myTable" class="table table-striped table-bordered table-sm">
                <!--table-secondary-->

                <thead class="filters">
                    <tr>
                        <th>Rut</th>
                        <th class="th-sm">Nombres</th>
                        <th class="th-sm">Apellidos</th>
                        <!--  <th scope="col">Comuna</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Email</th>
                    <th scope="col">Apodos</th>
                    <th scope="col">Domicilio</th>
                    <th scope="col">Fecha de nacimiento</th> 
                    <th scope="col">Estado</th>
                    <th scope="col">Ultimo lugar visto</th> -->
                        <th scope="col">Ver Detalle</th>
                        <th scope="col">Agregar Delito</th>
                        <?php if ($session['rol'] !== 'OPERADOR') {  ?>
                            <th scope="col">Editar</th>
                            <th scope="col">Eliminar</th>
                        <?php } ?>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($delincuentes as $item) { ?>
                        <tr>
                            <!-- <th scope="row">  <?php echo $item->iddelincuente ?> /th>-->
                            <td><?php echo $item->rut ?></td>
                            <td><?php echo $item->nombres  ?></td>
                            <td><?php echo $item->apellidos ?></td>
                            <!--  <td><?php echo $item->fk_comuna ?></td>
                        <td><?php echo $item->telefono ?></td>
                        <td><?php echo $item->email ?></td>
                        <td><?php echo $item->apodos ?></td>
                        <td><?php echo $item->domicilio ?></td>
                        <td><?php echo $item->fecha_nacimiento ?></td> 
                        <td><?php echo $item->estado ?></td>-->
                            <!--   <td><?php echo $item->domicilio ?> <?php echo $item->fk_comuna ?> </td> -->
                            <td><button data-id="<?php echo $item->iddelincuente ?>" class="btn btn-info btn-block verbtn "><i class="fa fa-folder-open-o" aria-hidden="true"></i></button></td>
                            <td><button data-id="<?php echo $item->iddelincuente ?>" class="btn btn-info btn-block delitobtn "><i class="fa fa-address-book-o" aria-hidden="true"></i></td>
                            <?php if ($session['rol'] !== 'OPERADOR') {  ?>
                                <td><button data-id="<?php echo $item->iddelincuente ?>" class="btn btn-info btn-block editarbtn "><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></td>
                                <td><button data-id="<?php echo $item->iddelincuente ?>" class="btn btn-info btn-block eliminarbtn"><i class="fa fa-trash" aria-hidden="true"></i></button></td>
                            <?php } ?>

                        </tr>
                    <?php } ?>
                </tbody>
        </div>


        <hr>
        <!--footer -->
        <!--  <footer id="footer-listado">
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
            </footer>-->
        <!--fin footer-->
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
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js">
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
        $('.editarbtn').on('click', function() {
            const base_url = "<?php echo base_url('') ?>"
            const base_url_sin_application = base_url.replace("application/", "");

            window.location.href = base_url_sin_application + "editar/" + $(this).data("id");
        });

        $('.delitobtn').on('click', function() {
            const base_url = "<?php echo base_url('') ?>"
            const base_url_sin_application = base_url.replace("application/", "");

            window.location.href = base_url_sin_application + "add_delito/" + $(this).data("id");
        });

        $('.verbtn').on('click', function() {
            const base_url = "<?php echo base_url('') ?>"
            const base_url_sin_application = base_url.replace("application/", "");

            window.location.href = base_url_sin_application + "detalle_delincuente/" + $(this).data("id");
        });

        $('.eliminarbtn').on('click', function() {

            const base_url = "<?php echo base_url('') ?>"
            const base_url_sin_application = base_url.replace("application/", "");

            window.location.href = base_url_sin_application + "listado/eliminar/" + $(this).data("id");
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

        document.getElementById("addDelincuente").onclick = function() {
            location.href = "/formulario";
        };
        $('#myTable').DataTable({
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por página",
                "zeroRecords": "Sin registos",
                "info": "Páginas _PAGE_ de _PAGES_",
                "infoEmpty": "Sin registros",
                "infoFiltered": "(filtered from _MAX_ total records)",
                "search": "Buscar",
                "paginate": {
                    "previous": "Anterior",
                    "next": "Siguiente"
                }
            }
        });



    });
</script>