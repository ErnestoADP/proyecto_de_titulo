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
                            <a href="/listadoJefezona">Listado de Personal</a>
                        </li>
                    </ul>
                </li>
            <?php } ?>
        </ul>

        <ul class="list-unstyled CTAs">
            <li>
                <a href="/login" class="article">Cerrar Sesión </a>
            </li>
            <!--    <li>
                <a href="editar_clave" class="article">Editar Perfil </a>
            </li> -->
        </ul>
    </nav>

    <!-- Page Content  -->

    <div id="content">

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">

                <button type="button" id="sidebarCollapse" class="btn btn-info">
                    <i class="fa fa-bars" aria-hidden="true"></i>

                </button>
                <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-align-justify"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ml-auto">
                    </ul>
                </div>
            </div>
        </nav>
        <!--tabla de contenido -->

        <h2 align="center">Detalle del Delincuente</h2>


        <div align="center" class="container">


            <div class="row-fluid user-infos cyruxx">
                <div class="span6">

                    <table align="center" class="table table-bordered" action="/detalle_delito/<?php echo $delincuente["iddelincuente"] ?>" method="post">
                        <tbody>
                            <tr>
                                <td>Rut:</td>
                                <td><?php echo $delincuente["rut"] ?></td>
                            </tr>
                            <tr>
                                <td>Apellidos:</td>
                                <td><?php echo $delincuente["apellidos"] ?></td>
                            </tr>
                            <tr>
                                <td>Nombres:</td>
                                <td><?php echo $delincuente["nombres"] ?></td>
                            </tr>
                            <tr>
                                <td>Apodos:</td>
                                <td><?php echo $delincuente["apodos"] ?></td>
                            </tr>

                            <tr>
                                <td>Fecha de nacimiento:</td>
                                <td><?php echo $delincuente["fecha_nacimiento"] ?></td>
                            </tr>

                            <tr>
                                <td>Domicilio:</td>
                                <td><?php echo $delincuente["domicilio"] . ", " . $delincuente["fk_comuna"] . ", " . $delincuente["fk_sector"] ?> </td>
                            </tr>
                            <tr>
                                <td>Telefono:</td>
                                <td><?php echo $delincuente["telefono"] ?></td>
                            </tr>
                            <tr>
                                <td>Estado:</td>
                                <td><?php echo $delincuente["estado"] ?></td>
                            </tr>

                            <tr>
                                <td>Ultimo lugar visto:</td>
                                <td><?php echo $delincuente["ultimo_lugar_visto"] ?></td>
                            </tr>

                        </tbody>
                    </table>

                    <h3>Delitos cometidos del delincuente</h3>


                    <table align="center" class="table table-bordered">
                        <tbody>
                            <?php foreach ($delitos as $delito) { ?>

                                <tr>

                                    <td><?php echo $delito->delito_iddelito ?></td>
                                </tr>

                            <?php } ?>
                        </tbody>
                    </table>


                </div>

                <div class="panel-footer">
                    <span class="pull-right">
                        <button type="button" class="btn btn-info pdf" data-id="<?php echo $delincuente["iddelincuente"] ?>">Descargar PDF <i class="fa fa-file-pdf-o" aria-hidden="true"></i></button>
                    </span>
                </div>


            </div>








        </div>




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

        /** Boton click para generar el pdf */
        $('.pdf').on('click', function() {
            const base_url = "<?php echo base_url('') ?>"
            const base_url_sin_application = base_url.replace("application/", "");

            window.location.href = base_url_sin_application + "generar_pdf/generar_documento_pdf/" + $(this).data("id");
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

    });
</script>