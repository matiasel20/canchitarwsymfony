<?php

/**
 * Empleado form base class.
 *
 * @method Empleado getObject() Returns the current form's model object
 *
 * @package    tp2
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseEmpleadoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'idempleado' => new sfWidgetFormInputHidden(),
      'nombre'     => new sfWidgetFormInputText(),
      'apellido'   => new sfWidgetFormInputText(),
      'dni'        => new sfWidgetFormInputText(),
      'direccion'  => new sfWidgetFormInputText(),
      'fechanac'   => new sfWidgetFormInputText(),
      'telcel'     => new sfWidgetFormInputText(),
      'usuario'    => new sfWidgetFormInputText(),
      'password'   => new sfWidgetFormInputText(),
      'email'      => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'idempleado' => new sfValidatorChoice(array('choices' => array($this->getObject()->getIdempleado()), 'empty_value' => $this->getObject()->getIdempleado(), 'required' => false)),
      'nombre'     => new sfValidatorString(array('max_length' => 45)),
      'apellido'   => new sfValidatorString(array('max_length' => 45)),
      'dni'        => new sfValidatorString(array('max_length' => 45)),
      'direccion'  => new sfValidatorString(array('max_length' => 45)),
      'fechanac'   => new sfValidatorString(array('max_length' => 45)),
      'telcel'     => new sfValidatorString(array('max_length' => 45)),
      'usuario'    => new sfValidatorString(array('max_length' => 45)),
      'password'   => new sfValidatorString(array('max_length' => 45)),
      'email'      => new sfValidatorString(array('max_length' => 45)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'Empleado', 'column' => array('usuario')))
    );

    $this->widgetSchema->setNameFormat('empleado[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Empleado';
  }


}
