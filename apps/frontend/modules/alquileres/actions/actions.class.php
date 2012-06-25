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
    //seteo mensajes template por defecto
    $this->msj_sesion="";
    $this->alert="";
    
    //declaro arreglo con nombre de los dias de la semana
    $nombre_dias = array('lunes','martes','miercoles','jueves','viernes','sabado','domingo');

    //$this->forward('default', 'module');
    $this->valores_cancha = array (
        1=>"cancha5 1.jpg",
        2=>"cancha5 2.jpg",
        3=>"cancha8.jpg"
    );  
	
    if (!$this->getUser()->isAuthenticated())
    {
            $this->msj_sesion="Usuario no identificado";
            $this->dia_limite=0;
            return sfView::SUCCESS;
    }   
    
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
    $this->horarios_disponibles=array(1=>array(array()),2=>array(array()),3=>array(array()));
    $this->dia=array();
    
    $horarios_reservados = $this->consultoHorarios($this->dia_limite);   
    
            
	for($c=1;$c<=3;$c++)
	{
		for($i=0;$i<$this->dia_limite;$i++)
		{  
			$j=$i+$num_dia-1;//indice para el dia de la semana correspondiente;
			
                        $horario=$semana[$nombre_dias[$j%7]];
                        
                        foreach($horario as $clave => $hora)
                        {
                            if($i!=0 || $num_hora<$hora)
                            {
                                if($this->esHorarioValido($hora,$i,$c,$horarios_reservados))
                                {
                                    $this->horarios_disponibles[$c][$i][]=$hora;
                                }
                            }
			 
                        }       
			
			$this->fecha[$i]=$this->calcularfecha($i);
			
			$this->dia[$i]=$nombre_dias[$j%7];
			
		}
	}
    
  }
    
  public function executeReservar(sfWebRequest $request)
  {
    if ($this->getUser()->isAuthenticated())
    {
        $iduser=$this->id_User($this->getUser()->getUsuario());
        
        $hora = $request->getParameter('hora');
	$cancha = $request->getParameter('cancha');
        $fecha = $request->getParameter('fecha');
        
        $fechac=explode("-",$fecha);//y-m-d -> m-d-y en checkdate
    
	$num_hora=date('H');
	$star_date=$this->calcularFecha(0);
	//var_dump($star_date);
	$end_date=$this->calcularFecha(7);
    //verifico que la hora y cancha y fecha esten en el rango correcto antes de insertarlos en la base de datos
    if (($hora>=8 and $hora<=20) and ($cancha>=1 and $cancha<=3) and checkdate($fechac[1],$fechac[2],$fechac[0]) and $this->check_in_range($star_date, $end_date,$fecha) and ($fecha!=$star_date or $hora>$num_hora)){
        
        $fecha=sprintf("%s %d:00",$fecha,$hora);     
 
		
		
		$indumentaria=0;
		$ducha=0;
		$confiteria=0;
		
		if ($request->getParameter('s1')){
			$indumentaria=1;			
		}
		if ($request->getParameter('s2')){
			$ducha=1;		
		}
		if ($request->getParameter('s3')){
			$confiteria=1;		
		}
                
        $alquiler = new Alquiler();
        $alquiler->setCancha($cancha);
        $alquiler->setFecha($fecha);
        $alquiler->setIndumentaria($indumentaria);
        $alquiler->setDuchas($ducha);
        $alquiler->setConfiteria($confiteria);
        $alquiler->setClienteid($iduser);
        $alquiler->save();
        
        $this->getUser()->setFlash('alerta', "reserva realizada con exito");
        return $this->redirect('alquileres/index');
        
			
			
		
		
    }
    else        
    {
        $this->getUser()->setFlash('alerta', "no se pudo realizar la reserva");
        return $this->redirect('alquileres/index');
    }
  }
 }
  
  protected function calcularFecha($dias)
  { 
    $calculo = strtotime ("$dias days");
    return date ("Y-m-d", $calculo);
  }
  
  protected function esHorarioValido($h,$d,$c,$horario)
  {
    $fecha = $this->calcularFecha($d);
    
    if($h<10)
    {
        $h = sprintf("0%s",$h);
    }
    
    $fecha= sprintf("%s %s:00:00",$fecha,$h);
    
    
    return !$horario->contains(array('Fecha' => $fecha,'Cancha' =>strval($c)));
    
    /*
    $q = AlquilerQuery::create();
    $q->filterByFecha($fecha);
    $q->filterByCancha($c);
    
    return ($q->find()->isEmpty());*/
  }
  
 protected function check_in_range($start_date, $end_date, $evaluame) 
{
    $start_ts = strtotime($start_date);
    $end_ts = strtotime($end_date);
    $user_ts = strtotime($evaluame);
    return (($user_ts >= $start_ts) && ($user_ts <= $end_ts));
}

protected function id_User($usuario)
{
    $q = ClienteQuery::create();
    $q->filterByUser($usuario);
    
    return $q->findOne()->getIdcliente();   
    
    
    
}

protected function consultoHorarios($dia_limite)
{
   
    $fecha_fin = $this->calcularFecha($dia_limite);
    
    $q = AlquilerQuery::create();   
    
    $q->select(array('Fecha', 'Cancha'));
            
    $q->filterByFecha(array('max' => $fecha_fin)); 
    
    $q->filterByFecha(array('min' => 'now'));  
    
    $q->orderByFecha(Criteria::ASC);
    
    $q->orderByCancha(Criteria::ASC);
    
    return $q->find();
    
 }

}
