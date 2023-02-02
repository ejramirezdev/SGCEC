<?php
require_once 'models/CertificadoModel.php';
if(!isset($_SESSION)){session_start();}

// require_once 'models/CoursesModel.php';
require_once '../cursosenlinea/assets/FPDF/fpdf.php';
require '../cursosenlinea/assets/phpqrcode/qrlib.php';

class CertificadoController {
    private $certificadoModel;
    private $pdf;
    
    public function __construct() {
        if(!isset($_SESSION)){session_start();}
        // $cursos = $this->homeModel->get_cursos();
        $varsesion = $_SESSION['usuario'];  // ESTO CREO QUE VA AQUI Y NO EN LAS FUNCIONES
        
        if($varsesion == null || $varsesion = ''){
            header('Location:index.php?c=Index&a=index');
             
        }
       $this->pdf = new FPDF('L','mm','A4');
       $this->certificadoModel = new CertificadoModel();

    }

    private function getPDF(){
        return $this->pdf;
    }

    public function crear(){


        $usuario = $_GET['idUsuario'];
        $curso = $_GET['idCurso'];

        $certificadoExist =  $this->certificadoModel->consultar_certificadoExist( $usuario,  $curso);

        if( empty($certificadoExist) ){
            header("Location:index.php?c=Index&a=adminUsuarios&isFail=true"); 
        }
       $usuario =  $this->certificadoModel->consultar_usuario( $usuario,  $curso);
       
       $nombreCurso = $this->certificadoModel->consultar_curso($usuario->id_curso_online);
      
     
       $certificado =  $this->certificadoModel->consultar_certificado( $usuario->id,  $curso);
       
       $fecha = $usuario->fechaIni;


    
        $anio = substr($fecha, -10, 4);
        $mes = substr($fecha, -5, 2);
        $dia = substr($fecha, -2, 2);
        switch($mes)
        {   
            case "1":
            $monthNameSpanish = "Enero";
            break;
            case "2":
            $monthNameSpanish = "Febrero";
            break;
            case "3":
            $monthNameSpanish = "Marzo";
            break;
            case "4":
            $monthNameSpanish = "Abril";
            break;
            case "5":
            $monthNameSpanish = "Mayo";
            break;
            case "6":
            $monthNameSpanish = "Junio";
            break;
            case "7":
            $monthNameSpanish = "Julio";
            break;
            case "8":
            $monthNameSpanish = "Agosto";
            break;
            case "9":
            $monthNameSpanish = "Septiembre";
            break;
            case "10":
            $monthNameSpanish = "Octubre";
            break;
            case "11":
            $monthNameSpanish = "Noviembre";
            break;
            case "12":
            $monthNameSpanish = "Diciembre";
            break;
        }

        //CREAMOS PRIMERO EL QR

        
        $dir = 'temp/';
        
        if(!file_exists($dir)){
            mkdir($dir);
        }
        
        $filename = $dir.'test.png';
        
        $tamanio = 5;// el tamanio de la img
        $level = 'Q'; // tipo de precicion A M B M
        $frameSize=1; // marco que tendra (blanco)
        $contenido='https://sgcec.net/cursosenlinea/ConsultaUsuarioQR.php?idUsuario='.$usuario->id; // contenido del qr
        
        QRcode::png($contenido, $filename, $level, $tamanio, $frameSize);
        
        // AHORA CREAREMOS EL CERTIFICADo
        

      
        $var = $certificado->calificacion;
        $calificacionDecimal = floatval($var);
        $calificacionDecimal = $calificacionDecimal*10;
        $calificacionDecimal = bcdiv($calificacionDecimal, '1', 2);

            // $pdf=new FPDF('L','mm','A4');#(orizontal L o vertical P,medida cm mm, A3-A4)
            $this->getPDF()->AliasNbPages();
            $this->getPDF()->AddPage();
            $this->getPDF()->image('../cursosenlinea/assets/FPDF/img/borde.png',10,10,277,190);
            $this->getPDF()->image('../cursosenlinea/assets/FPDF/img/Foto_cursos.png',98,25,100,30);
            
            $y_axis_initial = 50;
            $this->getPDF()->SetY($y_axis_initial);
            $this->getPDF()->SetFont('arial','',16);
            $this->getPDF()->Cell(277,15,'Otorga el presente Certificado A',0,1,'C');#(ancho,alto,texto,borde,salto linea,alineacion L C R)
            $this->getPDF()->SetFont('arial','B',22);
            $this->getPDF()->Cell(277,20,utf8_decode( $usuario->nombre1." ".$usuario->nombre2." ".$usuario->apellido1." ".$usuario->apellido2),0,1,'C');
            $this->getPDF()->SetFont('arial','',14);
            $this->getPDF()->Cell(277,5,utf8_decode("Con C.I. $usuario->cedula"),0,1,'C');
            #(ancho,alto,texto,borde,salto linea,alineacion L C R)
            $this->getPDF()->SetFont('arial','',14);
            $this->getPDF()->Cell(277,15,utf8_decode("Por su participación y aprobación (".$calificacionDecimal."/100) al Curso:"),0,1,'C'); 
            $this->getPDF()->SetFont('arial','B',20);
            $this->getPDF()->SetTextColor(254, 0, 0);

            $this->getPDF()->Cell(277,15,utf8_decode($nombreCurso->nombre." "),0,1,'C');
            $this->getPDF()->SetFont('arial','',14);
            $this->getPDF()->SetTextColor(0, 0, 0);
            $y=$this->getPDF()->GetY();
            $this->getPDF()->SetXY(40,$y);
            // calificacion
            // $this->getPDF()->MultiCell(227,15,utf8_decode('Por un tiempo de 8 horas, ').('Realizado el lunes de OCTUBRE del 2021.'),0,'C');
            $this->getPDF()->MultiCell(227,15,utf8_decode('Por un tiempo de 16 horas, ').('Realizado el '.date($dia).' de '.($monthNameSpanish).' del '.date($anio).'.'),0,'C');

     
            $this->getPDF()->SetFont('arial','',12);
            $y=$this->getPDF()->GetY();
            $this->getPDF()->SetXY(30,$y); 
            $this->getPDF()->image('../cursosenlinea/assets/FPDF/img/firma.png',105,135,100,30);
            $this->getPDF()->Cell(237,20,utf8_decode('Ing.Pedro Martínez'),0,1,'C'); 
            $this->getPDF()->Cell(277,8,utf8_decode('Gerente General'),0,1,'C');
            
            $this->getPDF()->SetXY(30,180);
            $this->getPDF()->SetFont('arial','',12);
            $this->getPDF()->Cell(120,7,utf8_decode($anio.'0000'.$certificado->id),0,0,'L');
            
             $this->getPDF()->image($filename,28,30,50,50);
            $this->getPDF()->SetXY(10,180);
            $this->getPDF()->SetFont('arial','',12);
            $this->getPDF()->Cell(257,7,utf8_decode('SGCEC-CAP-EF-18-12-04'),0,1,'R');
            $nombrearchivo="Certificado_".$usuario->apellido1.".pdf";
            $this->getPDF()->Output('I',$nombrearchivo);











    }

    
}