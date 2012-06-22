<?php

/**
 * Producto form.
 *
 * @package    tp2
 * @subpackage form
 * @author     Your name here
 */
class ProductoForm extends BaseProductoForm
{
  public function configure()
  {
      //$this->widgetSchema['categoriaid']= new sfWidgetFormPropelChoice(array('model' => 'Categoria', 'column' => 'nombre'));
     //  'categoriaid' => new sfWidgetFormPropelChoice(array('model' => 'Categoria', 'add_empty' => false))
  }
}
