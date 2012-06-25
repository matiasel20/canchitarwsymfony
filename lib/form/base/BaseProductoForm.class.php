<?php

/**
 * Producto form base class.
 *
 * @method Producto getObject() Returns the current form's model object
 *
 * @package    tp2
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseProductoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'idproducto'  => new sfWidgetFormInputHidden(),
      'codigo'      => new sfWidgetFormInputText(),
      'descripcion' => new sfWidgetFormInputText(),
      'modelo'      => new sfWidgetFormInputText(),
      'tamanio'     => new sfWidgetFormInputText(),
      'precio'      => new sfWidgetFormInputText(),
      'stock'       => new sfWidgetFormInputText(),
      'categoriaid' => new sfWidgetFormPropelChoice(array('model' => 'Categoria', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'idproducto'  => new sfValidatorChoice(array('choices' => array($this->getObject()->getIdproducto()), 'empty_value' => $this->getObject()->getIdproducto(), 'required' => false)),
      'codigo'      => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'descripcion' => new sfValidatorString(array('max_length' => 45)),
      'modelo'      => new sfValidatorString(array('max_length' => 45)),
      'tamanio'     => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'precio'      => new sfValidatorNumber(),
      'stock'       => new sfValidatorString(array('max_length' => 45)),
      'categoriaid' => new sfValidatorPropelChoice(array('model' => 'Categoria', 'column' => 'idcategoria')),
    ));

    $this->widgetSchema->setNameFormat('producto[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Producto';
  }


}
