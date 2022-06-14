<?php
    require_once("../../controller/usuarioController.php");
    require_once("../../model/dao/userDao.php");
    require_once("../../model/dto/userDto.php");
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
            $this -> pdf ->Image('../img/Logo2.png',20,5,40);
            // Arial bold 15
            $this -> pdf ->SetFont('Arial','B',15);
            // Movernos a la derecha
            $this -> pdf ->Cell(80);
            // Título
            $this -> pdf ->Cell(30,10,'Reporte RikoPollo',0,0,'C');
            // Salto de línea
            $this -> pdf ->Ln(20);
        }

        //Info de la pagina
        public function viewAll(){
            $this -> pdf->SetFont('Arial','B',16);

            try {
                $objDtoUser = new Usuario();
                $objDaoUser = new UsuarioModel($objDtoUser);
                $respon = $objDaoUser -> mIdSearchAllUsuario() -> fetchAll(); //La funcion fetchAll es para convertir todos los datos en un arreglo asociativo

            } catch (PDOException $e) {
                echo "Error en la creacion del controlador para mostrar todo ". $e -> getMessage();
            }

            foreach ($respon as $key => $value) {
                $this -> pdf->Cell(40,50, $value['idUsuario']);
                $this -> pdf->Cell(40,50, $value['nombre']);
                $this -> pdf->Cell(40,50, $value['apellido']);
                $this -> pdf->Cell(40,50, $value['usuario']);
                $this -> pdf->Cell(40,50, $value['contrasena']);
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

