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

                </div>
            </div>
        </nav>
        <h2 align="center">Inicio</h2>
        <hr>
        <div align="center" class="form-group">
            <div class="form-group col-md-10">
                <canvas id="myChart"></canvas>
                <hr>

                <canvas id="a"></canvas>


            </div>
        </div>

        <div class="listado">
            <?php foreach ($ranking_comuna as $item) { ?>
                <input type="hidden" class="comunaranking" value="<?php echo $item['comuna'] ?>">
            <?php } ?>
        </div>
        <!--footer 
        <footer id="footer-home">
            <div class="card text-center">
                <div class="card-header">
                    Featured
                </div>
                <div class="card-body">
                    <h5 class="card-title">Todos los derechos reservados</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>

            </div>
        </footer>
       fin footer-->

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


<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

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

        var ctx = document.getElementById('myChart').getContext('2d');
        var a = document.getElementById('a').getContext('2d');
        var rankingComuna = $('.listado > input');

        const arrayComuna = [];

        for (let i = 0; i < rankingComuna.length; i++) {

            arrayComuna.push(($(rankingComuna[i]).val()));
        }

        const result = {}
        const array_aux_data = [];
        const array_aux_labels = [];

        for (let i = 0; i < arrayComuna.length; i++) {
            result[arrayComuna[i]] = (result[arrayComuna[i]] || 0) + 1
        }

        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'line',

            // The data for our dataset
            data: {
                labels: Object.keys(result),
                datasets: [{
                    label: 'Rankin de comunas con mas delitos',
                    backgroundColor: '#17a2b8',
                    borderColor: '#343a40',
                    data: Object.values(result)
                }]
            },

            // Configuration options go here
            options: {}
        });
     //   var chart = new Chart(a, {
         //   // The type of chart we want to create
          //  type: 'line',

            // The data for our dataset
         //   data: {
             //   labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
              //  datasets: [{
              //      label: 'Rankin de sectores con mas delitos',
              //      backgroundColor: '#17a2b8',
              //      borderColor: '#343a40',
              //      data: [2, 10, 5, 2, 20, 30, 45, 18, 10, 20, 30, 33, 13]
             //   }]
         //   },

            // Configuration options go here
         //   options: {}
     //   });
    });

    function countDuplicates(original) {

        let counts = {},
            duplicate = 0;
        original.forEach(function(x) {
            counts[x] = (counts[x] || 0) + 1;
        });

        for (var key in counts) {
            if (counts.hasOwnProperty(key)) {
                counts[key] > 1 ? duplicate++ : duplicate;
            }
        }

        return duplicate;

    }
</script>