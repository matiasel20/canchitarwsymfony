<?php

/**
 * compras actions.
 *
 * @package    tp2
 * @subpackage compras
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class comprasActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    //$this->forward('default', 'module');
    $this->arreglo=$this->sacacat();
      
  }
  
  private function sacacat(){
 
        $categoria=CategoriaQuery::create();
        return $categoria->find();
      
  }
  
}
