<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>


<div class="modal" id="modal_rut" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Mensaje importante</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div>¿Consultó RUT en el listado antes de agregar delincuente?</div>

            </div>
            <div class="modal-footer">
                <button type="button" id="no" class="btn btn-danger">No</button>
                <button type="button" class="btn btn-info" data-dismiss="modal">Si</button>
            </div>
        </div>
    </div>
</div>



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


        <!-- <?php if ($error) { ?>
            <div class="alert alert-danger" role="alert">
                El registro ya existe en nuestro sistema
            </div>
        <?php  } ?> -->

        <h2 align="center">Agregar Delincuente</h2>
        <hr>
        <h4 align="center">Datos del delincuente</h4>
        <hr>

        <form action="formulario/addDelincuente" method="post">
            <div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Rut</label>
                        <input type="text" class="form-control" name="rut" placeholder="Ej: 12123123-0" required oninput="checkRut(this)" placeholder="Ingrese RUT">

                    </div>
                    <div class="form-group col-md-4">
                        <label>Nombres</label>
                        <input type="text" class="form-control" name="nombres" placeholder="Ej: Juan Roberto" pattern="[a-zA-Z ]{2,30}" required>

                    </div>

                    <div class="form-group col-md-4">
                        <label>Apellidos</label>
                        <input type="text" class="form-control" name="apellidos" placeholder="Ej: Soto Soto" pattern="[a-zA-Z ]{2,30}" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Domicilio del delincuente</label>
                        <input type="text" class="form-control" name="domicilio" placeholder="Ej: Esperanza #345" required>

                    </div>

                    <div class="form-group col-md-4">
                        <label for="inputState">Comuna </label>
                        <select id="inputState" class="form-control" name="comuna" required>
                            <!--foreach que recorre el listado de comunas -->
                            <?php foreach ($comunas as $comuna) { ?>
                                <option value="<?php echo $comuna->idcomuna ?>" selected><?php echo $comuna->nom_comuna ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="inputState">Sector </label>
                        <select id="inputState" class="form-control" name="sector" required>
                            <!--foreach que recorre el listado de comunas -->
                            <?php foreach ($sectores as $sector) { ?>
                                <option value="<?php echo $sector->idsector ?>" selected><?php echo $sector->nomb_sector ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Telefono</label>
                        <input type="text" class="form-control" name="fono" placeholder="Ej: 92342234" pattern="[0-9]{9,11}" required>

                    </div>
                    <div class="form-group col-md-4">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Ej: Juanp75@gmail.com" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Apodos</label>
                        <input type="text" class="form-control" name="apodos" placeholder="Ej: El cara de Nalga" required>

                    </div>

                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Fecha de nacimiento</label>
                        <input type="date" class="form-control" name="fechaNacimiento" required>

                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputState">Estado </label>
                        <select id="inputState" class="form-control" name="estado" required>
                            <option value="L1" selected>Libre</option>
                            <option value="P1">Preso</option>
                            <option value="O1">Orden de Arresto</option>

                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Ultimo lugar visto</label>
                        <input type="text" class="form-control" name="visto" placeholder="Ej: En su domicilio" required>
                    </div>

                </div>



                <div>
                    <hr>
                    <h4 align="center">Datos del delito</h4>
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
        <!--footer 
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

        $('#modal_rut').modal('show')

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

        document.getElementById("no").onclick = function() {
            location.href = "/listado";
        };


    });
    //validacion del RUT
    function checkRut(rut) {
        // Despejar Puntos
        var valor = rut.value.replace('.', '');
        // Despejar Guión
        valor = valor.replace('-', '');

        // Aislar Cuerpo y Dígito Verificador
        cuerpo = valor.slice(0, -1);
        dv = valor.slice(-1).toUpperCase();

        // Formatear RUN
        rut.value = cuerpo + '-' + dv

        // Si no cumple con el mínimo ej. (n.nnn.nnn)
        if (cuerpo.length < 7) {
            rut.setCustomValidity("RUT Incompleto");
            return false;
        }

        // Calcular Dígito Verificador
        suma = 0;
        multiplo = 2;

        // Para cada dígito del Cuerpo
        for (i = 1; i <= cuerpo.length; i++) {

            // Obtener su Producto con el Múltiplo Correspondiente
            index = multiplo * valor.charAt(cuerpo.length - i);

            // Sumar al Contador General
            suma = suma + index;

            // Consolidar Múltiplo dentro del rango [2,7]
            if (multiplo < 7) {
                multiplo = multiplo + 1;
            } else {
                multiplo = 2;
            }

        }

        // Calcular Dígito Verificador en base al Módulo 11
        dvEsperado = 11 - (suma % 11);

        // Casos Especiales (0 y K)
        dv = (dv == 'K') ? 10 : dv;
        dv = (dv == 0) ? 11 : dv;

        // Validar que el Cuerpo coincide con su Dígito Verificador
        if (dvEsperado != dv) {
            rut.setCustomValidity("RUT Inválido");
            return false;
        }

        // Si todo sale bien, eliminar errores (decretar que es válido)
        rut.setCustomValidity('');
    }
</script>