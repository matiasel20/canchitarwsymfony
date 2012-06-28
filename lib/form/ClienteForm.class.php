<?php

/**
 * Cliente form.
 *
 * @package    tp2
 * @subpackage form
 * @author     Your name here
 */
class ClienteForm extends BaseClienteForm
{
  public function configure()
  {
      unset ($this['equipoid']);
      $anios = range(date('Y') - 80, date('Y') - 18);
      $this->widgetSchema['fechanac']->setOption('years', $anios);
      $this->widgetSchema['fechanac']->setOption('years', array_combine($anios, $anios));
      //$this->widgetSchema->setHelp('dni','sin puntos'); // para añadir un comentario junto al input
      $this->widgetSchema->setLabels(array(
          'fechanac' => 'Fecha de nacimiento',
          'user' => 'Nombre de usuario',
          'telcel' => 'Tel/Cel',
          'email' => 'E-mail',
          'password' => 'Contraseña',
      ));
      $this->widgetSchema['password'] = new sfWidgetFormInputPassword();
      
      $this->validatorSchema['user']->setOption('min_length', 6);
      
      
      $this->validatorSchema['password'] = new sfValidatorPass();
      //$this->validatorSchema['password']->setOption('min_length', 6);
      
      $this->validatorSchema['email'] = new sfValidatorEmail();
      
      $this->validatorSchema->setPostValidator(
        new sfValidatorAnd(array(
        new sfValidatorPropelUnique(array('model' => 'Cliente', 'column' => array('email'))),
        new sfValidatorPropelUnique(array('model' => 'Cliente', 'column' => array('user')))
        ))
      );
  }
}
