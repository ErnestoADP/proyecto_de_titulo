<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>




<h2 align="center">Listado de Operadores</h2>

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

            <li>
                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Menu
                    Institucional</a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    <li>
                        <a href="listadoOperador">Listado de Operadores</a>
                    </li>
                    <li>
                        <a href="listadoJefezona">Listado de Jefe de Zona</a>
                    </li>
                  
                   

                </ul>
            </li>
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

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">

                <button type="button" id="sidebarCollapse" class="btn btn-info">
                    <i class="fa fa-bars" aria-hidden="true"></i>

                </button>
                <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <i class="fas fa-align-justify"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ml-auto">
                    </ul>
                </div>
            </div>
        </nav>
        <!--tabla de contenido -->
        <table class="table table-secondary ">

            <thead>
                <tr>
                    <th scope="col"> </th>
                    <th scope="col">Rut</th>
                    <th scope="col">Nombre </th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">Institucion</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach($delincuentes as $item){ ?>
                <tr>
                    <th scope="row"><?php echo $item->iddelincuente ?></th>
                    <td><?php echo $item->rut ?></td>
                    <td><?php echo $item->nombres  ?></td>
                    <td><?php echo $item->apellidos ?></td>
                    <td><?php echo $item->institucion ?></td>
                    <td><button data-id="<?php echo $item->iddelincuente ?>"
                            class="btn btn-info btn-block editarbtn "><i class="fa fa-pencil-square-o"
                                aria-hidden="true"></i></button></td>
                    <td><button data-id="<?php echo $item->iddelincuente ?>"
                            class="btn btn-info btn-block eliminarbtn"><i class="fa fa-trash"
                                aria-hidden="true"></i></button></td>

                </tr>
                <?php } ?>
            </tbody>

            <hr>
            <!--footer -->
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
            <!--fin footer-->
    </div>
</div>

</div>



<!-- jQuery CDN - Slim version (=without AJAX) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
    integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous">
</script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
    integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous">
</script>
<!-- jQuery Custom Scroller CDN -->
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js">
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
        alert("esto es para editar " + $(this).data("id"))
    });

    $('.eliminarbtn').on('click', function() {
        alert("esto es para eeliminar " + $(this).data("id"))
    });
    $('.home').on('click', function() {
           window.location.href ="/home";
        });


});
</script>