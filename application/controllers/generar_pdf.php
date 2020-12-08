<?php
class Generar_pdf extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        /** Cargar libreria de PDF */
        $this->load->library('Pdf');

        /** Cargar modelos */
        $this->load->model('Delincuente_model');
        $this->load->model('Comuna_model');
        $this->load->model('Sector_model');
        $this->load->model('Detalle_model');
    }
    function index()
    {
    }

    function generar_documento_pdf($id)
    {

        $sectores = $this->sector_model->obtener_sector();
        $delincuente = $this->delincuente_model->obtener_porID_delincuente($id);
        $delitos = $this->detalle_model->obtener_delitos_por_delincuente($id);

        /** Instanciar pdf */
        $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);

        /** Agregar pagina nueva pdf */
        $pdf->AddPage();
        $html = "<h1>Detalle del Delincuente</h1>";
        $html = $html . "<h3>" . $delincuente['nombres'] . " " . $delincuente['apellidos'] . "</h3>";
        $html = $html . "<hr>";
        $html = $html . "<p></p>";
        $html = $html . "<table align='center'>";
        $html = $html . " <tbody>";
        $html = $html . " <tr>";
        $html = $html . " <td>Rut:</td>";
        $html = $html . " <td>" . $delincuente['rut'] . "</td>";
        $html = $html . " </tr>";
        $html = $html . " <tr>";
        $html = $html . " <td>Fecha de Nacimiento:</td>";
        $html = $html . " <td>" . $delincuente['fecha_nacimiento'] . "</td>";
        $html = $html . " </tr>";
        $html = $html . " <tr>";
        $html = $html . " <td>Apodos:</td>";
        $html = $html . " <td>" . $delincuente['apodos'] . "</td>";
        $html = $html . " </tr>";
        $html = $html . " <tr>";
        $html = $html . " <td>Domicilio:</td>";
        $html = $html . " <td>" . $delincuente["domicilio"] . ", " . $delincuente["fk_comuna"] . "</td>";
        $html = $html . " </tr>";
        $html = $html . " <tr>";
        $html = $html . " <td>Telefono:</td>";
        $html = $html . " <td>" . $delincuente["telefono"] . "</td>";
        $html = $html . " </tr>";
        $html = $html . " <tr>";
        $html = $html . " <td>Estado: </td>";
        $html = $html . " <td>" . $delincuente["estado"]  . "</td>";
        $html = $html . " </tr>";
        $html = $html . " <tr>";
        $html = $html . " <td>Ultimo lugar visto: </td>";
        $html = $html . " <td>" . $delincuente["ultimo_lugar_visto"]  . "</td>";
        $html = $html . " </tr>";
        $html = $html . " </tbody>";
        $html = $html . "</table>";
        $html = $html . "<p></p>";
        $html = $html . "<hr>";
        $html = $html . "<h2>Delitos cometidos</h2>";
        /** Tabla de delitos cometidos */
        $html = $html . "<table align='center'>";
        $html = $html . " <tbody>";
        if ($delitos) :
            foreach ($delitos as $delito) :
                $html = $html . " <tr>";
                $html = $html . " <td>" . $delito->delito_iddelito . "</td>";
                $html = $html . " </tr>";
            endforeach;
        else :
            $html = $html . "<h4 align='center'>No hay delitos asociados a este registro</h4>";
        endif;
        $html = $html . " </tbody>";
        $html = $html . "</table>";
        $pdf->writeHTML($html, true, false, true, false, '');
        $pdf->Output($delincuente['nombres'] . "_" . $delincuente['apellidos'] . "_informe.pdf", 'I');
    }
}
