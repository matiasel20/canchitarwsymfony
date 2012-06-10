<?php



/**
 * This class defines the structure of the 'alquiler' table.
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
class AlquilerTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.AlquilerTableMap';

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
		$this->setName('alquiler');
		$this->setPhpName('Alquiler');
		$this->setClassname('Alquiler');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('IDALQUILER', 'Idalquiler', 'INTEGER', true, null, null);
		$this->addColumn('CANCHA', 'Cancha', 'INTEGER', true, 1, null);
		$this->addColumn('FECHA', 'Fecha', 'TIMESTAMP', true, null, 'CURRENT_TIMESTAMP');
		$this->addColumn('INDUMENTARIA', 'Indumentaria', 'BOOLEAN', true, 1, false);
		$this->addColumn('DUCHAS', 'Duchas', 'BOOLEAN', true, 1, false);
		$this->addColumn('CONFITERIA', 'Confiteria', 'BOOLEAN', true, 1, false);
		$this->addForeignKey('CLIENTEID', 'Clienteid', 'INTEGER', 'cliente', 'IDCLIENTE', true, 10, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('Cliente', 'Cliente', RelationMap::MANY_TO_ONE, array('clienteid' => 'idcliente', ), null, null);
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

} // AlquilerTableMap
