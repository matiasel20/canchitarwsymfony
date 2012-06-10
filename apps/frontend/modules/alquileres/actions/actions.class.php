<?php

/**
 * alquileres actions.
 *
 * @package    tp2
 * @subpackage alquileres
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class alquileresActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
      
    $nombre_dias = array('lunes','martes','miercoles','jueves','viernes','sabado','domingo');

    //$this->forward('default', 'module');
    $this->valores_cancha = array (
        1=>"cancha5 1.jpg",
        2=>"cancha5 2.jpg",
        3=>"cancha8.jpg"
    );  
    
    //vector donde se guardan los horarios disponibles correspondiente al dia de la semana
    $semana = array(
        'lunes'=> array(),
        'martes' => array(),
        'miercoles' => array(),
        'jueves' => array(),
        'viernes' => array(),
        'sabado' => array(),
        'domingo' => array()
    );
    
    $hora_inicio=8;
    $hora_fin=20;
    //asigno a cada dia los horarios disponibles, consideramos que cada dia tiene un horario corrido de 8:00 a 20:00 hs
    foreach ($semana as $dia=>$horarios) {
      for ($i=$hora_inicio;$i<=$hora_fin;$i++){
        $horarios[]=$i;
      }
      $semana[$dia]=$horarios;
    }
    
    //tomo dia y hora actuales
    $num_dia=date('N');
    $num_hora=date('H');   
    
    $this->dia_limite=8;
   
    $this->fecha=array();
    $this->horario=array(array());
    
    for($i=0;$i<$this->dia_limite;$i++)
    {  
        $j=$i+$num_dia-1;//indice para el dia de la semana correspondiente;
        
        if($i!=0)
        {
            $this->horario[$i]=$semana[$nombre_dias[$j%7]];
        }
        else
        {
            if($num_hora <$hora_fin)
            {
                      for ($k=$num_hora+1;$k<=$hora_fin;$k++)
                      {
                        $this->horario[$i][]=$k;
                      }
            }

        }                
        
        $this->fecha[$i]=$nombre_dias[$j%7]." ".$this->calcularfecha($i);
        
        //$nombre_dias[$j%7]." ".calcularfecha($i)
        
    }
    
  }
  
  protected function calcularFecha($dias){ 
    $calculo = strtotime ("$dias days");
    return date ("Y-m-d", $calculo);
  }
}
