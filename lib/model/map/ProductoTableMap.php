<?php



/**
 * This class defines the structure of the 'producto' table.
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
class ProductoTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.ProductoTableMap';

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
		$this->setName('producto');
		$this->setPhpName('Producto');
		$this->setClassname('Producto');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('IDPRODUCTO', 'Idproducto', 'INTEGER', true, 10, null);
		$this->addColumn('CODIGO', 'Codigo', 'INTEGER', true, 10, null);
		$this->addColumn('DESCRIPCION', 'Descripcion', 'VARCHAR', true, 45, null);
		$this->addColumn('MODELO', 'Modelo', 'VARCHAR', true, 45, null);
		$this->addColumn('TAMANIO', 'Tamanio', 'VARCHAR', false, 45, null);
		$this->addColumn('PRECIO', 'Precio', 'DECIMAL', true, 5, null);
		$this->addColumn('STOCK', 'Stock', 'VARCHAR', true, 45, null);
		$this->addForeignKey('CATEGORIAID', 'Categoriaid', 'INTEGER', 'categoria', 'IDCATEGORIA', true, 10, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('Categoria', 'Categoria', RelationMap::MANY_TO_ONE, array('categoriaid' => 'idcategoria', ), null, null);
		$this->addRelation('Compra', 'Compra', RelationMap::ONE_TO_MANY, array('idproducto' => 'productoid', ), null, null, 'Compras');
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

} // ProductoTableMap
