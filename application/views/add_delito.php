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
                    <!--   <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Page</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Page</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Page</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Page</a>
                        </li>
                    </ul>-->
                </div>
            </div>
        </nav>

        <h2 align="center">Agregar un nuevo delito</h2>
        <hr>




        <form action="/add_delito/agregar_delito/<?php echo $delincuente["iddelincuente"] ?>" method="post">
            <div>
                <div>
                    <h4 align="center">Datos del delincuente</h4>
                    <hr>
                </div>
                <div class="form-row">

                    <div class="form-group col-md-4">
                        <label>Rut</label>
                        <input type="text" readonly="readonly" class="form-control" name="rut" value="<?php echo $delincuente["rut"] ?>">

                    </div>
                    <div class="form-group col-md-4">
                        <label>Nombres</label>
                        <input type="text" readonly="readonly" class="form-control" name="nombres" value="<?php echo $delincuente["nombres"] ?>">

                    </div>


                    <div class="form-group col-md-4">
                        <label>Apellidos</label>
                        <input type="text" readonly="readonly" class="form-control" name="apellidos" value="<?php echo $delincuente["apellidos"] ?>">
                    </div>

                </div>

                <div>
                    <hr>
                    <h4 align="center">Agregar delito</h4>
                    <hr>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputState">Tipo de delito </label>
                        <select id="inputState" class="form-control" name="tipoDelito" required>
                            <!--foreach que recorre el listado de comunas -->
                            <?php foreach ($delitos as $delito) { ?>
                                <option value="<?php echo $delito->iddelito ?>" selected><?php echo $delito->nom_delito ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>


                    <div class="form-group col-md-6">
                        <label>Dirección del delito</label>
                        <input type="text" class="form-control" name="direccion_delito" placeholder="Ej: Esperanza #345" required>

                    </div>

                    <div class="form-group col-md-6">
                        <label for="inputState">Comuna </label>
                        <select id="inputState" class="form-control" name="comuna_delito" required>
                            <!--foreach que recorre el listado de comunas -->
                            <?php foreach ($comunas as $comuna) { ?>
                                <option value="<?php echo $comuna->idcomuna ?>" selected><?php echo $comuna->nom_comuna ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="inputState">Sector </label>
                        <select id="inputState" class="form-control" name="sector_delito" required>
                            <!--foreach que recorre el listado de comunas -->
                            <?php foreach ($sectores as $sector) { ?>
                                <option value="<?php echo $sector->idsector ?>" selected><?php echo $sector->nomb_sector ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>



            <hr>



            <button type="submit" class="btn btn-info btn-block">Guardar</button>

        </form>
        <hr>
        <!--footer -->
        <footer id="footer-contenido">
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
        $('.home').on('click', function() {
            window.location.href = "/home";
        });
    });
</script>