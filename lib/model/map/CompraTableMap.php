<?php



/**
 * This class defines the structure of the 'compra' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.lib.model.map
 */
class CompraTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.CompraTableMap';

	/**
	 * Initialize the table attributes, columns and validators
	 * Relations are not initialized by this method since they are lazy loaded
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function initialize()
	{
		// attributes
		$this->setName('compra');
		$this->setPhpName('Compra');
		$this->setClassname('Compra');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('IDCOMPRA', 'Idcompra', 'INTEGER', true, 10, null);
		$this->addColumn('CANTIDAD', 'Cantidad', 'INTEGER', true, 10, null);
		$this->addColumn('FECHA', 'Fecha', 'TIMESTAMP', true, null, 'CURRENT_TIMESTAMP');
		$this->addForeignKey('CLIENTEID', 'Clienteid', 'INTEGER', 'cliente', 'IDCLIENTE', false, 10, null);
		$this->addForeignKey('PRODUCTOID', 'Productoid', 'INTEGER', 'producto', 'IDPRODUCTO', false, 10, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('Cliente', 'Cliente', RelationMap::MANY_TO_ONE, array('clienteid' => 'idcliente', ), null, null);
		$this->addRelation('Producto', 'Producto', RelationMap::MANY_TO_ONE, array('productoid' => 'idproducto', ), null, null);
	} // buildRelations()

	/**
	 *
	 * Gets the list of behaviors registered for this table
	 *
	 * @return array Associative array (name => parameters) of behaviors
	 */
	public function getBehaviors()
	{
		return array(
			'symfony' => array('form' => 'true', 'filter' => 'true', ),
			'symfony_behaviors' => array(),
		);
	} // getBehaviors()

} // CompraTableMap
