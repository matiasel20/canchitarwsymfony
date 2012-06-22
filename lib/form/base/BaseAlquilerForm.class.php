<?php

/**
 * Alquiler form base class.
 *
 * @method Alquiler getObject() Returns the current form's model object
 *
 * @package    tp2
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseAlquilerForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'idalquiler'   => new sfWidgetFormInputHidden(),
      'cancha'       => new sfWidgetFormInputText(),
      'fecha'        => new sfWidgetFormDateTime(),
      'indumentaria' => new sfWidgetFormInputCheckbox(),
      'duchas'       => new sfWidgetFormInputCheckbox(),
      'confiteria'   => new sfWidgetFormInputCheckbox(),
      'clienteid'    => new sfWidgetFormPropelChoice(array('model' => 'Cliente', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'idalquiler'   => new sfValidatorChoice(array('choices' => array($this->getObject()->getIdalquiler()), 'empty_value' => $this->getObject()->getIdalquiler(), 'required' => false)),
      'cancha'       => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'fecha'        => new sfValidatorDateTime(),
      'indumentaria' => new sfValidatorBoolean(),
      'duchas'       => new sfValidatorBoolean(),
      'confiteria'   => new sfValidatorBoolean(),
      'clienteid'    => new sfValidatorPropelChoice(array('model' => 'Cliente', 'column' => 'idcliente')),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'Alquiler', 'column' => array('cancha', 'fecha')))
    );

    $this->widgetSchema->setNameFormat('alquiler[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Alquiler';
  }


}
