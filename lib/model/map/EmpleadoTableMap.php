<?php



/**
 * This class defines the structure of the 'empleado' table.
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
class EmpleadoTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.EmpleadoTableMap';

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
		$this->setName('empleado');
		$this->setPhpName('Empleado');
		$this->setClassname('Empleado');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(false);
		// columns
		$this->addPrimaryKey('IDEMPLEADO', 'Idempleado', 'INTEGER', true, null, null);
		$this->addColumn('NOMBRE', 'Nombre', 'VARCHAR', true, 45, null);
		$this->addColumn('APELLIDO', 'Apellido', 'VARCHAR', true, 45, null);
		$this->addColumn('DNI', 'Dni', 'VARCHAR', true, 45, null);
		$this->addColumn('DIRECCION', 'Direccion', 'VARCHAR', true, 45, null);
		$this->addColumn('FECHANAC', 'Fechanac', 'VARCHAR', true, 45, null);
		$this->addColumn('TELCEL', 'Telcel', 'VARCHAR', true, 45, null);
		$this->addColumn('USUARIO', 'Usuario', 'VARCHAR', true, 45, null);
		$this->addColumn('PASSWORD', 'Password', 'VARCHAR', true, 45, null);
		$this->addColumn('EMAIL', 'Email', 'VARCHAR', true, 45, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
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

} // EmpleadoTableMap
