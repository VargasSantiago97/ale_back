<?php

//use function PHPSTORM_META\type;

ini_set('display_errors', 1);
error_reporting(E_ALL);

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");

/*
Author: Ing. Dick Díaz Delgado
*/
include 'fpdf.php'; // Incluímos la clase fpdf.php para poder utilizar sus métodos para generar nuestro pdf

class PDF extends FPDF
{
    public $numero = '';
    public $fecha = '';
    public $beneficiario = '';
    public $transportista = '';
    public $conductor = '';
    public $patentes = '';
    public $establecimiento = '';
    public $cultivo = '';
    public $trilla_silo = '';
    public $tara = '';
    public $bruto = '';
    public $neto = '';
    public $firma1 = '';
    public $firma2 = '';
    public $observaciones = '';

    function setear($ent)
    {
        $this->numero = isset($ent["numero"]) ? utf8_decode($ent["numero"]) : "-";
        $this->fecha = isset($ent["fecha"]) ? utf8_decode($ent["fecha"]) : "  /   /  ";
        $this->beneficiario = isset($ent["beneficiario"]) ? utf8_decode($ent["beneficiario"]) : "";
        $this->transportista = isset($ent["transportista"]) ? utf8_decode($ent["transportista"]) : "";
        $this->conductor = isset($ent["conductor"]) ? utf8_decode($ent["conductor"]) : "";
        $this->patentes = isset($ent["patentes"]) ? utf8_decode($ent["patentes"]) : "";
        $this->establecimiento = isset($ent["establecimiento"]) ? utf8_decode($ent["establecimiento"]) : "";
        $this->cultivo = isset($ent["cultivo"]) ? utf8_decode($ent["cultivo"]) : "";
        $this->trilla_silo = isset($ent["trilla_silo"]) ? utf8_decode($ent["trilla_silo"]) : "";
        $this->tara = isset($ent["tara"]) ? utf8_decode($ent["tara"]) : "";
        $this->bruto = isset($ent["bruto"]) ? utf8_decode($ent["bruto"]) : "";
        $this->neto = isset($ent["neto"]) ? utf8_decode($ent["neto"]) : "";
        $this->firma1 = isset($ent["firma1"]) ? utf8_decode($ent["firma1"]) : "";
        $this->firma2 = isset($ent["firma2"]) ? utf8_decode($ent["firma2"]) : "";
        $this->observaciones = isset($ent["observaciones"]) ? utf8_decode($ent["observaciones"]) : "";
    }


    function numero($ent)
    {
        if (floatval($ent) == 0.0) {
            return '-';
        }
        return number_format(floatval($ent), 2, ',', '.');
    }




    function Body()
    {

        $this->AddPage($this->CurOrientation);

        //FONDO  
        $this->Image('img/orden_de_carga.png', 0, 0, 210, 297);

        $bordeAct = false;

        for ($i = 0; $i < 3; $i++) {

            $yy = 93.6 * $i; //Variable auxiliar para desplazarse 40 puntos del borde superior hacia abajo en la coordenada de las Y para evitar que el título este al nivel de la cabecera.

            //NUMERO
            $this->SetFont('Arial', 'B', 18);
            $this->SetXY(145, 14 + $yy);
            $this->Cell(55, 8, $this->numero, $bordeAct, 1, 'C');

            //FECHA
            $this->SetFont('Arial', 'B', 14);
            $this->SetXY(170, 23 + $yy);
            $this->Cell(30, 8, $this->fecha, $bordeAct, 1, 'C');


            //BENEFICIARIO
            $this->SetFont('Arial', '', 14);
            $this->SetXY(38, 28 + $yy);
            $this->Cell(110, 7, $this->beneficiario, $bordeAct, 1, 'L');


            //TRANSPORTISTA
            $this->SetFont('Arial', '', 12);
            $this->SetXY(40, 36 + $yy);
            $this->Cell(110, 6, $this->transportista, $bordeAct, 1, 'L');



            //CONDUCTOR
            $this->SetFont('Arial', '', 12);
            $this->SetXY(35, 44 + $yy);
            $this->Cell(80, 6, $this->conductor, $bordeAct, 1, 'L');


            //PATENTES
            $this->SetFont('Arial', '', 12);
            $this->SetXY(142, 44.5 + $yy);
            $this->Cell(62, 6, $this->patentes, $bordeAct, 1, 'L');



            //ESTABLECIMIENTO
            $this->SetFont('Arial', 'B', 12);
            $this->SetXY(43, 51.5 + $yy);
            $this->Cell(75, 6, $this->establecimiento, $bordeAct, 1, 'L');

            //CULTIVO
            $this->SetFont('Arial', 'B', 12);
            $this->SetXY(136, 51.5 + $yy);
            $this->Cell(33, 6, $this->cultivo, $bordeAct, 1, 'L');

            //TRILLA / SILO
            $this->SetFont('Arial', '', 12);
            $this->SetXY(178, 51.5 + $yy);
            $this->Cell(25, 6, $this->trilla_silo, $bordeAct, 1, 'L');


            //TARA
            $this->SetFont('Arial', '', 16);
            $this->SetXY(21, 61 + $yy);
            $this->Cell(38, 10, $this->tara, $bordeAct, 1, 'C');
            //BRUTO
            $this->SetFont('Arial', '', 16);
            $this->SetXY(78, 61 + $yy);
            $this->Cell(38, 10, $this->bruto, $bordeAct, 1, 'C');
            //NETO
            $this->SetFont('Arial', '', 16);
            $this->SetXY(134, 61 + $yy);
            $this->Cell(37, 10, $this->neto, $bordeAct, 1, 'C');

            //razonReceptor
            $this->SetFont('Arial', '', 10);
            $this->SetXY(10, 74 + $yy);
            $this->MultiCell(190, 4, $this->observaciones, $bordeAct, 'L');

            //solucionamos el problema de que sale de la pagina
            if ($i < 2) {
                //FIRMA 1
                $this->SetFont('Arial', '', 9);
                $this->SetXY(10, 95 + $yy);
                $this->Cell(80, 5, $this->firma1, $bordeAct, 1, 'C');
                //FIRMA 2
                $this->SetFont('Arial', '', 9);
                $this->SetXY(125, 95 + $yy);
                $this->Cell(80, 5, $this->firma2, $bordeAct, 1, 'C');
            }
        }
    }
    function Header()
    {
        //FIRMA 1
        $this->SetFont('Arial', '', 9);
        $this->SetXY(10, 282.2);
        $this->Cell(80, 5, $this->firma1, 0, 1, 'C');
        //FIRMA 2
        $this->SetFont('Arial', '', 9);
        $this->SetXY(125, 282.2);
        $this->Cell(80, 5, $this->firma2, 0, 1, 'C');
    }
}



if (isset($_GET['o'])) {

    $pdf = new PDF();

    $datos = json_decode(base64_decode($_GET['o']), true);

    $pdf->setear($datos);

    $pdf->Body(); //Llamada a la función Body para generar el PDF

    $nombre = "Orden de Carga - N" . utf8_decode($datos['numero']) . " - " . utf8_decode($datos['establecimiento']);
    $pdf->setTitle($nombre);

    $pdf->Output($nombre.".pdf", isset($_GET['D']) ? $_GET['D'] : 'I'); //I mostrar; D descargar
}
