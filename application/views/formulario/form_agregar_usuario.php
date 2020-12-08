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
        <h2 align="center">Agregar Usuario</h2>
        <hr>

        <form action="agregar_usuario/addUsuario" method="post">
            <div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Rut</label>
                        <input type="text" name="rut" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ej: 12123123-0" required oninput="checkRut(this)" placeholder="Ingrese RUT">

                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Password</label>
                        <input type="password" name="clave" class="form-control" id="inputPassword4" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Nombre Completo</label>
                        <input type="text" class="form-control" name="nombre" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ej: Juan Roberto" pattern="[a-zA-Z ]{2,30}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Correo Usuario</label>
                        <input type="email" name="correo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="email@institucion.cl" required>

                    </div>

                    <div class="form-group col-md-6">
                        <label for="inputState">Institución </label>
                        <select id="inputState" class="form-control" name="institucion" required>
                            <!--foreach que recorre la institucion-->
                            <?php foreach ($institucion as $institucion) : ?>
                                <option value="<?php echo $institucion->idinstitucion ?>" selected><?php echo $institucion->nom_institucion ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputState">Rol a Ejercer </label>
                        <select id="inputState" class="form-control" name="rol" required>
                            <!--foreach que recorre la institucion-->

                            <option value="ADMIN" selected> Administrador </option>
                            <option value="JEFE_ZONA" selected> Jefe de zona </option>
                            <option value="OPERADOR" selected> Operador </option>


                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-info btn-block">Guardar</button>
        </form>
        <hr>
        <!--footer 
        <footer id="footer-operador">
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
        $('.home').on('click', function() {
            window.location.href = "/home";
        });
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