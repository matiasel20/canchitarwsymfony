<?php

/**
 * login actions.
 *
 * @package    tp2
 * @subpackage login
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class loginActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
 public function executeIndex(sfWebRequest $request)
  {
      if ($this->getUser()->isAuthenticated())
          return $this->redirect('@homepage');
    //$this->forward('default', 'module');
      
      
      
      if($request->isMethod(sfWebRequest::POST))
      {
          $nombre_usuario = $request->getParameter("usuario");
          $pass = $request->getParameter("pass");      
          
          if ($nombre_usuario !="" AND $pass !="")
          { 
            
            if ($this->esLoginCorrecto($nombre_usuario,$pass))
            {            
                $this->getUser()->iniciarSesion($nombre_usuario);
                return $this->redirect('@homepage');
            }
            else
            {
                $this->getUser()->setErrorLogin("login incorrecto");
            }
                
          }
          else
              $this->getUser()->setErrorLogin( "campos incompletos");
          
       }
       
       $this->msj = $this->getUser()->getErrorLogin();
       $this->getUser()->removerErrorLogin();
      
      
              
  }
  
  public function executeLogout(sfWebRequest $request)
  {
      $this->getUser()->cerrarSesion();
      
      return $this->redirect('@homepage');
  }
  
  private function esLoginCorrecto($usuario,$pass)
  {
      $q = ClienteQuery::create();
      $q->filterByUser($usuario);
      $q->filterByPassword(md5($pass));
      
      return !($q->find()->isEmpty());
  }
}
