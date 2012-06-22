<?php

/**
 * Compra form base class.
 *
 * @method Compra getObject() Returns the current form's model object
 *
 * @package    tp2
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseCompraForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'idcompra'   => new sfWidgetFormInputHidden(),
      'cantidad'   => new sfWidgetFormInputText(),
      'fecha'      => new sfWidgetFormDateTime(),
      'clienteid'  => new sfWidgetFormPropelChoice(array('model' => 'Cliente', 'add_empty' => true)),
      'productoid' => new sfWidgetFormPropelChoice(array('model' => 'Producto', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'idcompra'   => new sfValidatorChoice(array('choices' => array($this->getObject()->getIdcompra()), 'empty_value' => $this->getObject()->getIdcompra(), 'required' => false)),
      'cantidad'   => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'fecha'      => new sfValidatorDateTime(),
      'clienteid'  => new sfValidatorPropelChoice(array('model' => 'Cliente', 'column' => 'idcliente', 'required' => false)),
      'productoid' => new sfValidatorPropelChoice(array('model' => 'Producto', 'column' => 'idproducto', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('compra[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Compra';
  }


}
