<?php

/**
 * administracion actions.
 *
 * @package    tp2
 * @subpackage administracion
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class administracionActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
      $this->cats = $this->sacacat();
      $this->results = $this->traerProducto();
      $this->user = $this->traerUsuario();
      $this->compras = $this->compras();
      $this->alquileres = $this->alquileres();
  }
  
  
  private function sacacat(){
 
        $categoria=CategoriaQuery::create();
        return $categoria->find();
      
  }
  private function traerProducto(){
      $productos=ProductoQuery::create();
              //'idproducto', 'codigo', 'descripcion','modelo', 'tamanio', 'precio', 'stock'
      return $productos->find();
      //->addJoin(ProductoPeer::CATEGORIAID, CategoriaPeer::IDCATEGORIA)
  }
  
  private function traerUsuario(){
      $user=ClienteQuery::create();
      return $user->find();
  }
  
  private function compras(){
      $compras=CompraQuery::create();
      return $compras->find();
  }
 
  private function alquileres(){
      $alquileres=AlquilerQuery::create();
      return $alquileres->find();
  }
  
  private function borrarProducto(){
      
  }




  function executeBorrar(sfWebRequest $request){
      $pdt= ProductoQuery::create();
      //$pdt->filterByIdproducto($request->getParameter('idp'))
      //    ->findOne(); lo q es = a findPK()
      $prod = $pdt->findPk($request->getParameter('idp'));
      if($prod){
        try{
          $prod->delete();
        }  catch (Exception $e){
            $this->getUser()->setFlash('alerta', "no se pudo borrar el producto");
            $this->redirect('administracion/index');    
        }
      }else{
          $this->forward404('No existe el producto a borrar');
      }
      $this->redirect('administracion/index');
 }

 function executeCancelar(sfWebRequest $request){
      $alqs= AlquilerQuery::create();
      //$pdt->filterByIdproducto($request->getParameter('idA'))
      //    ->findOne(); lo q es = a findPK()
      $alq = $alqs->findPk($request->getParameter('idA'));
      if($alq){
          $alq->delete();
      }else{
          $this->forward404('No existe el producto a borrar');
      }
      $this->redirect('administracion/index');



 }
 public function executeModificar(sfWebRequest $request){




 }

}