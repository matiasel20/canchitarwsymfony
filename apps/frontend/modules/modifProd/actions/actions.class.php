<?php

/**
 * modifProd actions.
 *
 * @package    tp2
 * @subpackage modifProd
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class modifProdActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
      $prods=ProductoQuery::create();
      $prod = $prods->findPk($request->getParameter('idX'));
      if ($prod){        
        $this->fila = $prod;
      }else {
        $this->forward404('No existe el producto a modificar');
      }
      
  }
  
  function executeModifProd(sfWebRequest $request){
      $pdt= ProductoQuery::create();
      //$pdt->filterByIdproducto($request->getParameter('idp'))
      //    ->findOne(); lo q es = a findPK()
      $prod = $pdt->findPk($request->getParameter('idp'));
      if($prod){
          $prod->set;
      }else{
          $this->forward404('No existe el producto a borrar');
      }
      $this->redirect('administracion/index');
  }
  
}
