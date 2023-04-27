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
    public $fondo = 'no_image.png';

    public $beneficiario_razon = '';
    public $beneficiario_cuit = '';
    public $beneficiario_codigo = '';
    public $beneficiario_domicilio = '';

    public $conceptos = [];

    public $pagos = [];

    public $total = 0;
    public $total_letras = '';
    public $observaciones = '';

    function setear($ent)
    { 
        $this->numero = isset($ent["numero"]) ? utf8_decode($ent["numero"]) : "";
        $this->fecha = isset($ent["fecha"]) ? utf8_decode($ent["fecha"]) : "   /    /";
        $this->fondo = isset($ent["fondo"]) ? utf8_decode($ent["fondo"]) : "no_image.png";
        $this->beneficiario_razon = isset($ent["beneficiario_razon"]) ? utf8_decode($ent["beneficiario_razon"]) : "";
        $this->beneficiario_cuit = isset($ent["beneficiario_cuit"]) ? utf8_decode($ent["beneficiario_cuit"]) : "";
        $this->beneficiario_codigo = isset($ent["beneficiario_codigo"]) ? utf8_decode($ent["beneficiario_codigo"]) : "";
        $this->beneficiario_domicilio = isset($ent["beneficiario_domicilio"]) ? utf8_decode($ent["beneficiario_domicilio"]) : "";
        $this->conceptos = isset($ent["conceptos"]) ? $ent["conceptos"] : [];
        $this->pagos = isset($ent["pagos"]) ? $ent["pagos"] : [];
        $this->total = isset($ent["total"]) ? utf8_decode($ent["total"]) : "";
        $this->total_letras = isset($ent["total_letras"]) ? utf8_decode($ent["total_letras"]) : "";
        $this->observaciones = isset($ent["observaciones"]) ? utf8_decode($ent["observaciones"]) : "";
    }


    function numero($ent)
    {
        if (floatval($ent) == 0.0) {
            return '';
        }
        return "$ " . number_format(floatval($ent), 2, ',', '.');
    }




    function Body()
    {

        $this->AddPage($this->CurOrientation);

        //FONDO
        $this->Image('img/'.$this->fondo, 0, 0, 210, 297);

        $bordeAct = false;

        for ($i = 0; $i < 2; $i++) {

            $yy = 136.4 * $i; //Variable auxiliar para desplazarse 40 puntos del borde superior hacia abajo en la coordenada de las Y para evitar que el título este al nivel de la cabecera.

            //LEYENDA
            $this->SetFont('Arial', 'B', 25);
            $this->SetXY(90, 18 + $yy);
            $this->Cell(38, 7, "OP", $bordeAct, 1, 'C');
            $this->SetFont('Arial', '', 10);
            $this->SetXY(90, 24 + $yy);
            $this->Cell(38, 5, "Orden de Pago", $bordeAct, 1, 'C');

            //NUMERO
            $this->SetFont('Arial', 'B', 18);
            $this->SetXY(160, 16 + $yy);
            $this->Cell(38, 7, $this->numero, $bordeAct, 1, 'L');

            //FECHA
            $this->SetFont('Arial', 'B', 14);
            $this->SetXY(160, 23 + $yy);
            $this->Cell(30, 7, $this->fecha, $bordeAct, 1, 'L');


            //RECEPTOR
            $this->SetFont('Arial', 'B', 12);
            $this->SetXY(33, 34 + $yy);
            $this->Cell(95, 7, $this->beneficiario_razon, $bordeAct, 1, 'L');

            //RECEPETO CUIT
            $this->SetFont('Arial', '', 10);
            $this->SetXY(138, 34 + $yy);
            $this->Cell(30, 7, $this->beneficiario_cuit, $bordeAct, 1, 'L');

            //RECEPETOR CODIGO
            $this->SetFont('Arial', '', 10);
            $this->SetXY(180, 34 + $yy);
            $this->Cell(17, 7, $this->beneficiario_codigo, $bordeAct, 1, 'L');

            $bordeAct = false;
            //ORIGINAL/DUPLICADO
            $this->SetFont('Arial', 'B', 12);
            $this->SetXY(169, 41 + $yy);
            $this->Cell(26, 7, $i ? 'DUPLICADO' : 'ORIGINAL', $bordeAct, 1, 'C');

            //RECEPETO DOMICILIO
            $this->SetFont('Arial', '', 9);
            $this->SetXY(27, 41.4 + $yy);
            $this->Cell(170, 6, $this->beneficiario_domicilio, $bordeAct, 1, 'L');

            //CONCEPTOS
            $this->SetFont('Arial', '', 8);
            $this->SetXY(14, 58 + $yy);
            foreach ($this->conceptos as $key => $value) {

                $bordeAct = false;
                $valY = $this->GetY();

                $this->SetXY(125, $valY);
                $this->Cell(23, 5, $this->numero($value["debe"]), $bordeAct, 1, 'R');
                $this->SetXY(148, $valY);
                $this->Cell(23, 5, $this->numero($value["haber"]), $bordeAct, 1, 'R');
                $this->SetXY(171, $valY);
                $this->Cell(23, 5, $this->numero($value["saldo"]), $bordeAct, 1, 'R');


                $this->SetXY(14, $valY);
                $this->MultiCell(110, 5, $value["concepto"], $bordeAct, "L", 0, true);
            }
            
            //PAGOS
            $this->SetFont('Arial', '', 8);
            $this->SetXY(14, 90 + $yy);
            foreach ($this->pagos as $key => $value) {

                $bordeAct = false;
                $valY = $this->GetY();

                /*
                "tipo" => "CHEQUE",
                "detalle" => 'BANCO NACION - NRO: 12121212',
                "fecha" => '27/02/2023',
                "valor" => '8000000'
                */

                $this->SetXY(173, $valY);
                $this->Cell(23, 4, $this->numero($value["valor"]), $bordeAct, 1, 'R');
                $this->SetXY(13, $valY);
                $this->Cell(17, 4, $value["tipo"], $bordeAct, 1, 'L');
                $this->SetXY(155, $valY);
                $this->Cell(18, 4, $value["fecha"], $bordeAct, 1, 'L');


                $this->SetXY(30, $valY);
                $this->MultiCell(125, 4, $value["detalle"], $bordeAct, "L", 0, true);
            }

            $bordeAct = false;

            //TOTAL
            $this->SetFont('Arial', 'B', 16);
            $this->SetXY(155, 123 + $yy);
            $this->Cell(43, 9, $this->numero($this->total), $bordeAct, 1, 'L');

            //OBS
            $this->SetFont('Arial', '', 8);
            $this->SetXY(36, 117 + $yy);
            $this->MultiCell(92, 4, $this->observaciones, $bordeAct, "L", 0, true);

            //TOTAL LETRAS
            $this->SetFont('Arial', '', 7);
            $this->SetXY(130, 131 + $yy);
            $this->MultiCell(65, 3, $this->total_letras, $bordeAct, "L", 0, true);
        

/* 

            //TRANSPORTISTA
            $this->SetFont('Arial', '', 12);
            $this->SetXY(40, 36 + $yy);
            $this->Cell(110, 6, $this->numero, $bordeAct, 1, 'L');


            //CONDUCTOR
            $this->SetFont('Arial', '', 12);
            $this->SetXY(35, 44 + $yy);
            $this->Cell(80, 6, $this->numero, $bordeAct, 1, 'L');

            //PATENTES
            $this->SetFont('Arial', '', 12);
            $this->SetXY(142, 44.5 + $yy);
            $this->Cell(62, 6, $this->numero, $bordeAct, 1, 'L');



            //ESTABLECIMIENTO
            $this->SetFont('Arial', 'B', 12);
            $this->SetXY(43, 51.5 + $yy);
            $this->Cell(75, 6, $this->numero, $bordeAct, 1, 'L');

            //CULTIVO
            $this->SetFont('Arial', 'B', 12);
            $this->SetXY(136, 51.5 + $yy);
            $this->Cell(33, 6, $this->numero, $bordeAct, 1, 'L');

            //TRILLA / SILO
            $this->SetFont('Arial', '', 12);
            $this->SetXY(178, 51.5 + $yy);
            $this->Cell(25, 6, $this->numero, $bordeAct, 1, 'L');


            //TARA
            $this->SetFont('Arial', '', 16);
            $this->SetXY(21, 61 + $yy);
            $this->Cell(38, 10, $this->numero, $bordeAct, 1, 'C');
            //BRUTO
            $this->SetFont('Arial', '', 16);
            $this->SetXY(78, 61 + $yy);
            $this->Cell(38, 10, $this->numero, $bordeAct, 1, 'C');
            //NETO
            $this->SetFont('Arial', '', 16);
            $this->SetXY(134, 61 + $yy);
            $this->Cell(37, 10, $this->numero, $bordeAct, 1, 'C');

            //razonReceptor
            $this->SetFont('Arial', '', 10);
            $this->SetXY(10, 74 + $yy);
            $this->MultiCell(190, 4, $this->numero, $bordeAct, 'L'); 
            */
        }
    }
    function Header()
    {
        /*
        //FIRMA 1
        $this->SetFont('Arial', '', 9);
        $this->SetXY(10, 282.2);
        $this->Cell(80, 5, $this->numero, 0, 1, 'C');
        //FIRMA 2
        $this->SetFont('Arial', '', 9);
        $this->SetXY(125, 282.2);
        $this->Cell(80, 5, $this->numero, 0, 1, 'C');
        */
    }
}


if (isset($_GET['o'])) {
    $pdf = new PDF();

    $datos = json_decode(base64_decode($_GET['o']), true);

    $pdf->setear($datos);

    $pdf->Body(); //Llamada a la función Body para generar el PDF

    $numero = isset($datos['numero']) ? utf8_decode($datos['numero']) : '';
    $benef = isset($datos['beneficiario_razon']) ? utf8_decode($datos['beneficiario_razon']) : '';
    $nombre = "Orden de Pago - N " . $numero . " - " . $benef;
    $pdf->setTitle($nombre);

    $pdf->Output($nombre.".pdf", isset($_GET['D']) ? $_GET['D'] : 'I'); //I mostrar; D descargar
}