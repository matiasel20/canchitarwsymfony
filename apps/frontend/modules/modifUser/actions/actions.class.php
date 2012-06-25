<?php

/**
 * modifUser actions.
 *
 * @package    tp2
 * @subpackage modifUser
 * @author     Your name here
 */
class modifUserActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->Clientes = ClienteQuery::create()->find();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ClienteForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ClienteForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $Cliente = ClienteQuery::create()->findPk($request->getParameter('idcliente'));
    $this->forward404Unless($Cliente, sprintf('Object Cliente does not exist (%s).', $request->getParameter('idcliente')));
    $this->form = new ClienteForm($Cliente);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $Cliente = ClienteQuery::create()->findPk($request->getParameter('idcliente'));
    $this->forward404Unless($Cliente, sprintf('Object Cliente does not exist (%s).', $request->getParameter('idcliente')));
    $this->form = new ClienteForm($Cliente);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    //$request->checkCSRFProtection();

    $Cliente = ClienteQuery::create()->findPk($request->getParameter('idcliente'));
    //$this->forward404Unless($Cliente, sprintf('Object Cliente does not exist (%s).', $request->getParameter('idcliente')));
    $Cliente->delete();

    $this->redirect('administracion/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Cliente = $form->save();

      //$this->redirect('modifUser/edit?idcliente='.$Cliente->getIdcliente());
      $this->redirect('administracion/index');
    }
  }
}
