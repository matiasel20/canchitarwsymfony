<?php

/**
 * Categoria form base class.
 *
 * @method Categoria getObject() Returns the current form's model object
 *
 * @package    tp2
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseCategoriaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'idcategoria' => new sfWidgetFormInputHidden(),
      'nombre'      => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'idcategoria' => new sfValidatorChoice(array('choices' => array($this->getObject()->getIdcategoria()), 'empty_value' => $this->getObject()->getIdcategoria(), 'required' => false)),
      'nombre'      => new sfValidatorString(array('max_length' => 45)),
    ));

    $this->widgetSchema->setNameFormat('categoria[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Categoria';
  }


}
