<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');



/**
 * @property usuario $usuario Classe de usuário
 * @property Doctrine $doctrine Biblioteca ORM
 */
 
class Report extends CI_Controller {


  /**
   * Método principal do mini-crud
   * 
   */
    /**
   * Método principal do mini-crud
   * @param nenhum
   * @return view
   */ 
  public function index()
  {   
    $chamar['usuarios'] = $this->doctrine->em->getRepository('usuario')->findAll();
    //$this->load->view('home', $chamar);       
    }
 
  /**
     * Localiza o usuario para ser editado
     *
     * @param int $id
     */
  public function imprime($id){
    
   require ('application/plugins/fpdf/fpdf.php');
   // Se carga el modelo alumno
    //$this->load->model('usuario');
    // Se carga la libreria fpdf
   // $this->load->library('pdf');
 
    // Se obtienen los alumnos de la base de datos
   //var_dump($usuario['usuarios'] = $this->doctrine->em->getRepository('usuario')->findAll());
   //exit();
    
   
    //$usuario['usuarios'] = $this->doctrine->em->getRepository('usuario')->relatorioUsuarios();


    //$pdf = new FPDF("P","pt","A4");
    $pdf = new FPDF("P","pt","A4");
       //INICIALIZA AS VARIÁVEIS
//VERIFICA SE RETORNOU ALGUMA LINHA


        //TÍTULO DO RELATÓRIO                                     
$titulo      =  "Colunas Planilhas";                 
//LOGO QUE SERÁ COLOCADO NO RELATÓRIO                     
//$imagem      =  "logo_imasters.png";                      
//ENDEREÇO DA BIBLIOTECA FPDF                             
//$end_fpdf    =  "c:/pagina/biblioteca/fpdf";              
//NUMERO DE RESULTADOS POR PÁGINA                         
$por_pagina  =  13;                                       
//ENDEREÇO ONDE SERÁ GERADO O PDF                         
//$end_final   =  "c:/pagina/imasters/110/artigo_php.pdf";  
//TIPO DO PDF GERADO                                      
//F-> SALVA NO ENDEREÇO ESPECIFICADO NA VAR END_FINAL     
//$tipo_pdf    =  "F"; 


/*var_dump($row = array('joao', 'maria', 'Mario','Chico', 'Astrogildo', 
                'Neguim','Braulio', 'Igor', 'Marcio','Julielson',
                'Joazim', 'Fernando', 'Marciana','Natan',
                'Janio', 'Florencio', 'Joao Marcio','Ramon'));
exit();*/

//print_r($row);


$row = 10;



//if(!$row) { echo "Não retornou nenhum registro"; die; }

//CALCULA QUANTAS PÁGINAS VÃO SER NECESSÁRIAS
$paginas   =  ceil($row/$por_pagina);  

$linha_atual =  0;
$inicio      =  0;

//PÁGINAS
for($x=1; $x<=$paginas; $x++) {
   //VERIFICA
   $inicio      =  $linha_atual;
   $fim         =  $linha_atual + $por_pagina;
   if($fim > $row) $fim = $row;
   
   //$pdf->Open();                    
   $pdf->AddPage();                 
   $pdf->SetFont("Arial", "B", 10); 
   
   //MONTA O CABEÇALHO              
   //$pdf->Image($imagem, 0, 8);
   $pdf->Ln(2);
   $pdf->Cell(185, 8, "Página $x de $paginas", 0, 0, 'R');          
   
   //QUEBRA DE LINHA
   $pdf->Ln(50);
   
           
  
   //MONTA O CABEÇALHO
//$pdf->Cell(15, 8, "", 1, 0, 'C');
$pdf->Cell(100);
$pdf->Cell(100, 15, "Nome:", 1, 0, 'L');
$pdf->Cell(100, 15, "Email:", 1, 0, 'L');
$pdf->Cell(100, 15, "Cellular:", 1, 1, 'L');
//$pdf->Cell(100, 15, "Telefone:", 1, 1, 'L');


/*$pdf->Cell(15, 8, mysql_result($sql, $i, "ID"), 1, 0, 'C');
$pdf->Cell(85, 8, mysql_result($sql, $i, "NOME"), 1, 0, 'L');*/
   
   //EXIBE OS REGISTROS 
  // $usuario = $this->doctrine->em->getRepository('usuario')->findAll();  
  $post = $_POST;  
  $usuario = $this->doctrine->em->getRepository('usuario')->findOneBy(array('id'=>$id));
   //exit();
 
  //foreach ($usuario as $users){
    // $users ->setNome($post['nome']);
   // $pdf->Cell(100,15,$users->getId(),1, 0, 'C');
   $pdf->Cell(100);
   $pdf->Cell(100,15,$usuario->getNome(),1, 0, 'C');
   $pdf->Cell(100,15,$usuario->getEmail(),1, 0, 'L');
   $pdf->Cell(100,15,$usuario->getCelular(),1, 1, 'L');
   //$pdf->Cell(100,15,$users->getTelefone(),1, 1, 'L');
  //$pdf->Cell(25,5,$users->getNome(),'B',0,'L',0);
  
     //$pdf->Cell(130,15,rand(),1,0,"L");
    //$pdf->Cell(130,15,rand(),1,1,"L");
   
       $linha_atual++;
  // }//FECHA FOR(REGISTROS - i)
     }//FECHA FOR(PAGINAS - x)
//SAIDA DO PDF
$pdf->Output();
    } 


    public function imprimeAll(){  

       require ('application/plugins/fpdf/fpdf.php');
   
       $pdf = new FPDF("P","pt","A4");
 
   $pdf->AddPage();                 
   $pdf->SetFont("Arial", "B", 10); 
   $pdf->Cell(100);   
   $pdf->Cell(100, 15, "Nome:", 1, 0, 'L');
   $pdf->Cell(100, 15, "Email:", 1, 0, 'L');
   $pdf->Cell(100, 15, "Cellular:", 1, 1, 'L');
//
  $usuario = $this->doctrine->em->getRepository('usuario')->findAll();
   //exit(); 
   foreach ($usuario as $users){
   $pdf->Cell(100);
   $pdf->Cell(100,15,$users->getNome(),1, 0, 'C');
   $pdf->Cell(100,15,$users->getEmail(),1, 0, 'L');
   $pdf->Cell(100,15,$users->getCelular(),1, 1, 'L');
    
   }//FECHA FOR(REGISTROS - i)
//}//FECHA FOR(PAGINAS - x)

//SAIDA DO PDF
$pdf->Output();
    } 

  }

