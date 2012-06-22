<?php

/**
 * Cliente form base class.
 *
 * @method Cliente getObject() Returns the current form's model object
 *
 * @package    tp2
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseClienteForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'idcliente' => new sfWidgetFormInputHidden(),
      'user'      => new sfWidgetFormInputText(),
      'nombre'    => new sfWidgetFormInputText(),
      'apellido'  => new sfWidgetFormInputText(),
      'dni'       => new sfWidgetFormInputText(),
      'fechanac'  => new sfWidgetFormDate(),
      'direccion' => new sfWidgetFormInputText(),
      'localidad' => new sfWidgetFormInputText(),
      'telcel'    => new sfWidgetFormInputText(),
      'email'     => new sfWidgetFormInputText(),
      'password'  => new sfWidgetFormInputText(),
      'equipoid'  => new sfWidgetFormPropelChoice(array('model' => 'Equipo', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'idcliente' => new sfValidatorChoice(array('choices' => array($this->getObject()->getIdcliente()), 'empty_value' => $this->getObject()->getIdcliente(), 'required' => false)),
      'user'      => new sfValidatorString(array('max_length' => 45)),
      'nombre'    => new sfValidatorString(array('max_length' => 45)),
      'apellido'  => new sfValidatorString(array('max_length' => 45)),
      'dni'       => new sfValidatorString(array('max_length' => 45)),
      'fechanac'  => new sfValidatorDate(),
      'direccion' => new sfValidatorString(array('max_length' => 45)),
      'localidad' => new sfValidatorString(array('max_length' => 45)),
      'telcel'    => new sfValidatorString(array('max_length' => 45)),
      'email'     => new sfValidatorString(array('max_length' => 45)),
      'password'  => new sfValidatorString(array('max_length' => 45)),
      'equipoid'  => new sfValidatorPropelChoice(array('model' => 'Equipo', 'column' => 'idequipo', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'Cliente', 'column' => array('user')))
    );

    $this->widgetSchema->setNameFormat('cliente[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Cliente';
  }


}
