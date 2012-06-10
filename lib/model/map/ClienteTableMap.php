<?php



/**
 * This class defines the structure of the 'cliente' table.
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
class ClienteTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.ClienteTableMap';

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
		$this->setName('cliente');
		$this->setPhpName('Cliente');
		$this->setClassname('Cliente');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('IDCLIENTE', 'Idcliente', 'INTEGER', true, 10, null);
		$this->addColumn('USER', 'User', 'VARCHAR', true, 45, null);
		$this->addColumn('NOMBRE', 'Nombre', 'VARCHAR', true, 45, null);
		$this->addColumn('APELLIDO', 'Apellido', 'VARCHAR', true, 45, null);
		$this->addColumn('DNI', 'Dni', 'VARCHAR', true, 45, null);
		$this->addColumn('FECHANAC', 'Fechanac', 'DATE', true, null, null);
		$this->addColumn('DIRECCION', 'Direccion', 'VARCHAR', true, 45, null);
		$this->addColumn('LOCALIDAD', 'Localidad', 'VARCHAR', true, 45, null);
		$this->addColumn('TELCEL', 'Telcel', 'VARCHAR', true, 45, null);
		$this->addColumn('EMAIL', 'Email', 'VARCHAR', true, 45, null);
		$this->addColumn('PASSWORD', 'Password', 'VARCHAR', true, 45, null);
		$this->addForeignKey('EQUIPOID', 'Equipoid', 'INTEGER', 'equipo', 'IDEQUIPO', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('Equipo', 'Equipo', RelationMap::MANY_TO_ONE, array('equipoid' => 'idequipo', ), null, null);
		$this->addRelation('Alquiler', 'Alquiler', RelationMap::ONE_TO_MANY, array('idcliente' => 'clienteid', ), null, null, 'Alquilers');
		$this->addRelation('Compra', 'Compra', RelationMap::ONE_TO_MANY, array('idcliente' => 'clienteid', ), null, null, 'Compras');
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

} // ClienteTableMap
