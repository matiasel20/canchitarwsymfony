<?php

/**
 * Torneo form base class.
 *
 * @method Torneo getObject() Returns the current form's model object
 *
 * @package    tp2
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseTorneoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'idtorneo'   => new sfWidgetFormInputHidden(),
      'temporada'  => new sfWidgetFormDateTime(),
      'torneo'     => new sfWidgetFormInputText(),
      'campeon'    => new sfWidgetFormInputText(),
      'subcampeon' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'idtorneo'   => new sfValidatorChoice(array('choices' => array($this->getObject()->getIdtorneo()), 'empty_value' => $this->getObject()->getIdtorneo(), 'required' => false)),
      'temporada'  => new sfValidatorDateTime(array('required' => false)),
      'torneo'     => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'campeon'    => new sfValidatorString(array('max_length' => 45)),
      'subcampeon' => new sfValidatorString(array('max_length' => 45, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('torneo[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Torneo';
  }


}
