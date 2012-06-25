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
  }
}
