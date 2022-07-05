<?php
    require_once("../../controller/entradaController.php");
    require_once("../../model/dao/entradaDao.php");
    require_once("../../model/dto/entradaDto.php");
    require_once("../../model/conexion.php");

    class Reporte{
        private $pdf;
        
        public function __construct(){
            include 'vendor/fpdf.php';
            $this -> pdf = new FPDF();
            $this -> pdf->AddPage();
            $this -> pdf -> SetKeywords('ñ',true);
        }

        //Encabezado de la pagina
        public function headReport() {
            $this -> pdf->SetFont('Arial','B',16);

            // Logo
            $this -> pdf ->Image('../img/Logo2.png',30,5,35);
            // Arial bold 15
            $this -> pdf ->SetFont('Arial','B',15);
            // Movernos a la derecha
            $this -> pdf ->Cell(80);
            // Título
            $this -> pdf ->Cell(30,10,'Reporte entradas',0,0,'C');
            // Salto de línea
            $this -> pdf ->Ln(30);

        }

        //Info de la pagina
        public function viewAll(){
            $this -> pdf->SetFont('Arial','B',12);
            
            try {
                $objDtoEntrada = new Entrada();
                $objDaoEntrada = new EntradaModel($objDtoEntrada);
                $respon = $objDaoEntrada -> mIdSearchAllEntrada() -> fetchAll(); //La funcion fetchAll es para convertir todos los datos en un arreglo asociativo
                
            } catch (PDOException $e) {
                echo "Error en la creacion del controlador para mostrar todo ". $e -> getMessage();
            }

            // Cabecera
            $header = array('Codigo', 'Fecha Entrada', 'Cantidad', 'Precio', 'Proveedor', 'Producto');
            foreach($header as $col)  
                $this-> pdf -> Cell(31.5,10,$col,1,0,'C');
                $this-> pdf -> Ln(10); 
            
            foreach ($respon as $key => $value) {
                $this -> pdf->Cell(31.5,10, $value['idDetEntrada'],1,0,'C');
                $this -> pdf->Cell(31.5,10, $value['fechaEntrada'],1,0,'C');
                $this -> pdf->Cell(31.5,10, $value['cantProEntrada'],1,0,'C');
                $this -> pdf->Cell(31.5,10, $value['precioEntrada'],1,0,'C');
                $this -> pdf->Cell(31.5,10, $value['idProveedor'],1,0,'C');
                $this -> pdf->Cell(31.5,10, $value['idProducto'],1,0,'C');
                $this -> pdf -> Ln(10);
            }      

        }

        // Pie de página
        function fooReport() {
            $this -> pdf -> AliasNbPages();

            // Posición: a 1,5 cm del final
            $this -> pdf ->SetY(265);
            // Arial italic 8
            $this -> pdf ->SetFont('Arial','I',8);
            // Número de página
            $this -> pdf ->Cell(0,10,'Page '.$this-> pdf -> PageNo().'/{nb}',0,0,'C');

            $this -> pdf->Output();
        }
    }

    $objView = new Reporte();
    $objView -> headReport();
    $objView -> viewAll();
    $objView -> fooReport();
?>