<?php

/**
 * Equipo form base class.
 *
 * @method Equipo getObject() Returns the current form's model object
 *
 * @package    tp2
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseEquipoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'idequipo' => new sfWidgetFormInputHidden(),
      'nombre'   => new sfWidgetFormInputText(),
      'torneoid' => new sfWidgetFormPropelChoice(array('model' => 'Torneo', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'idequipo' => new sfValidatorChoice(array('choices' => array($this->getObject()->getIdequipo()), 'empty_value' => $this->getObject()->getIdequipo(), 'required' => false)),
      'nombre'   => new sfValidatorString(array('max_length' => 45)),
      'torneoid' => new sfValidatorPropelChoice(array('model' => 'Torneo', 'column' => 'idtorneo')),
    ));

    $this->widgetSchema->setNameFormat('equipo[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Equipo';
  }


}
