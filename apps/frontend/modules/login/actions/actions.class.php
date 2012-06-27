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
              
  }
  
  public function executeLogin(sfWebRequest $request)
  {
      if($request->isMethod(sfWebRequest::POST))
      {
          $nombre_usuario = $request->getParameter("usuario");
          $pass = $request->getParameter("pass");      
          
          if ($nombre_usuario !="" AND $pass !="")
          { 
            
            if ($this->esLoginCorrecto($nombre_usuario,$pass))
            {            
                $this->getUser()->iniciarSesion($nombre_usuario);
                $this->getUser()->addCredential('cliente');
                return $this->redirect('@homepage');
            }
            elseif ($this->esLoginCorrectoEmpleado($nombre_usuario,$pass))
            {
                $this->getUser()->iniciarSesion($nombre_usuario);
                $this->getUser()->addCredential('empleado');
                return $this->redirect('@homepage');
            }
            else
            {
                $this->getUser()->setFlash('errorlogin', "login incorrecto");            }
                
          }
          else
                $this->getUser()->setFlash('errorlogin', "campos incompletos");          
       }
       
       return $this->redirect('login/index');
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
  
  private function esLoginCorrectoEmpleado($usuario,$pass)
  {
      $q = EmpleadoQuery::create();
      $q->filterByUsuario($usuario);
      $q->filterByPassword($pass);
      
      return !($q->find()->isEmpty());
  }
  
}
