<?php

class myUser extends sfBasicSecurityUser
{
    public function iniciarSesion($nombre_usuario)
    {
        $this->setAttribute("usuario", $nombre_usuario);
        $this->setAuthenticated(true);
        
    }
    
    public function cerrarSesion()
    {
        $this->getAttributeHolder()->clear();
        $this->setAuthenticated(false);
        
    }
    
    public function setErrorLogin($msj)
    {
        $this->setAttribute('error_login',$msj);
    }
    
    public function getErrorLogin()
    {
        return $this->getAttribute('error_login',"");
    }
	
	 public function getUsuario()
    {
        return $this->getAttribute('usuario',"");
    }
    
    public function removerErrorLogin()
    {
        $this->getAttributeHolder()->remove('error_login');
    }
}
