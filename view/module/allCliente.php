<?php
    require_once("../../controller/clienteController.php");
    require_once("../../model/dao/clienteDao.php");
    require_once("../../model/dto/clienteDto.php");
    require_once("../../model/conexion.php");

    class Reporte{
        private $pdf;

        public function __construct(){
            include 'vendor/fpdf.php';
            $this -> pdf = new FPDF();
            $this -> pdf->AddPage();
        }

        //Encabezado de la pagina
        public function headReport() {
            $this -> pdf->SetFont('Arial','B',16);

            // Logo
            $this -> pdf ->Image('../img/Icon.png',20,5,28);
            // Arial bold 15
            $this -> pdf ->SetFont('Arial','B',15);
            // Movernos a la derecha
            $this -> pdf ->Cell(80);
            // Título
            $this -> pdf ->Cell(30,10,'Reporte Clientes - RikoPollo',0,0,'C');
            // Salto de línea
            $this -> pdf ->Ln(30);
        }

        //Info de la pagina
        public function viewAll(){
            $this -> pdf->SetFont('Arial','B',12);

            try {
                $objDtoCliente = new Cliente();
                $objDaoCliente = new ClienteModel($objDtoCliente);
                $respon = $objDaoCliente -> mIdSearchAllCliente() -> fetchAll(); //La funcion fetchAll es para convertir todos los datos en un arreglo asociativo

            } catch (PDOException $e) {
                echo "Error en la creacion del controlador para mostrar todo ". $e -> getMessage();
            }

            $header = array('Codigo', 'Nombre', 'Telefono', 'Celular', 'Direccion');
            foreach ($header as $col)
                $this-> pdf -> Cell(38,10,$col,1,0,'C');
                $this-> pdf -> Ln(10);
            

            foreach ($respon as $key => $value) {
                $this -> pdf->Cell(38,10, $value['idCliente'],1,0,'C');
                $this -> pdf->Cell(38,10, $value['nombre'],1,0,'C');
                $this -> pdf->Cell(38,10, $value['telefono'],1,0,'C');
                $this -> pdf->Cell(38,10, $value['celular'],1,0,'C');
                $this -> pdf->Cell(38,10, $value['direccion'],1,0,'C');
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

