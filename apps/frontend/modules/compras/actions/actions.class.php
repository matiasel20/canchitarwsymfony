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
  
  public function executeComprar(sfWebRequest $request){
      $q=ProductoQuery::create()
              ->findPk($request->getParameter('prod'));
      
      if( $q && $q->getStock() > 0 ){
          
          $q->setStock($q->getStock() - 1);
          $compra = new Compra();
          $compra->setCantidad(1);
          $compra->setFecha(date('Y-m-d H:i:s'));
          $compra->setClienteid($this->id_User($this->getUser()->getUsuario()));
          $compra->setProductoid($q->getIdproducto());
              $q->save();
              $compra->save();
      }else{
          $this->getUser()->setFlash('alerta', "no se pudo realizar la compra");
      }
      $this->redirect('compras/index');
  }
  
  
protected function id_User($usuario)
{
    $q = ClienteQuery::create();
    $q->filterByUser($usuario);
    
    return $q->findOne()->getIdcliente();   
    
    
    
}
  
}
