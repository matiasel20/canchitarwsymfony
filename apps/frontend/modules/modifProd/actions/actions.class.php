<?php

/**
 * modifProd actions.
 *
 * @package    tp2
 * @subpackage modifProd
 * @author     Your name here
 */
class modifProdActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->Productos = ProductoQuery::create()->find();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ProductoForm();
    
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ProductoForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
    
    
  }

  public function executeEdit(sfWebRequest $request)
  {
    $Producto = ProductoQuery::create()->findPk($request->getParameter('idproducto'));
    $this->forward404Unless($Producto, sprintf('Object Producto does not exist (%s).', $request->getParameter('idproducto')));
    $this->form = new ProductoForm($Producto);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $Producto = ProductoQuery::create()->findPk($request->getParameter('idproducto'));
    $this->forward404Unless($Producto, sprintf('Object Producto does not exist (%s).', $request->getParameter('idproducto')));
    $this->form = new ProductoForm($Producto);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $Producto = ProductoQuery::create()->findPk($request->getParameter('idproducto'));
    $this->forward404Unless($Producto, sprintf('Object Producto does not exist (%s).', $request->getParameter('idproducto')));
    $Producto->delete();

    $this->redirect('modifProd/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Producto = $form->save();

      //$this->redirect('modifProd/edit?idproducto='.$Producto->getIdproducto());
      $this->redirect('administracion/index');
    }
  }
}
