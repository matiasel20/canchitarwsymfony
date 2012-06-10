<?php



/**
 * This class defines the structure of the 'torneo' table.
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
class TorneoTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.TorneoTableMap';

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
		$this->setName('torneo');
		$this->setPhpName('Torneo');
		$this->setClassname('Torneo');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('IDTORNEO', 'Idtorneo', 'INTEGER', true, null, null);
		$this->addColumn('TEMPORADA', 'Temporada', 'TIMESTAMP', false, null, null);
		$this->addColumn('TORNEO', 'Torneo', 'VARCHAR', false, 45, null);
		$this->addColumn('CAMPEON', 'Campeon', 'VARCHAR', true, 45, null);
		$this->addColumn('SUBCAMPEON', 'Subcampeon', 'VARCHAR', false, 45, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('Equipo', 'Equipo', RelationMap::ONE_TO_MANY, array('idtorneo' => 'torneoid', ), null, null, 'Equipos');
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

} // TorneoTableMap
