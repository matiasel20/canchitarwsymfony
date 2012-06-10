<?php


/**
 * Base class that represents a query for the 'compra' table.
 *
 * 
 *
 * @method     CompraQuery orderByIdcompra($order = Criteria::ASC) Order by the idcompra column
 * @method     CompraQuery orderByCantidad($order = Criteria::ASC) Order by the cantidad column
 * @method     CompraQuery orderByFecha($order = Criteria::ASC) Order by the fecha column
 * @method     CompraQuery orderByClienteid($order = Criteria::ASC) Order by the clienteid column
 * @method     CompraQuery orderByProductoid($order = Criteria::ASC) Order by the productoid column
 *
 * @method     CompraQuery groupByIdcompra() Group by the idcompra column
 * @method     CompraQuery groupByCantidad() Group by the cantidad column
 * @method     CompraQuery groupByFecha() Group by the fecha column
 * @method     CompraQuery groupByClienteid() Group by the clienteid column
 * @method     CompraQuery groupByProductoid() Group by the productoid column
 *
 * @method     CompraQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     CompraQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     CompraQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     CompraQuery leftJoinCliente($relationAlias = null) Adds a LEFT JOIN clause to the query using the Cliente relation
 * @method     CompraQuery rightJoinCliente($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Cliente relation
 * @method     CompraQuery innerJoinCliente($relationAlias = null) Adds a INNER JOIN clause to the query using the Cliente relation
 *
 * @method     CompraQuery leftJoinProducto($relationAlias = null) Adds a LEFT JOIN clause to the query using the Producto relation
 * @method     CompraQuery rightJoinProducto($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Producto relation
 * @method     CompraQuery innerJoinProducto($relationAlias = null) Adds a INNER JOIN clause to the query using the Producto relation
 *
 * @method     Compra findOne(PropelPDO $con = null) Return the first Compra matching the query
 * @method     Compra findOneOrCreate(PropelPDO $con = null) Return the first Compra matching the query, or a new Compra object populated from the query conditions when no match is found
 *
 * @method     Compra findOneByIdcompra(int $idcompra) Return the first Compra filtered by the idcompra column
 * @method     Compra findOneByCantidad(int $cantidad) Return the first Compra filtered by the cantidad column
 * @method     Compra findOneByFecha(string $fecha) Return the first Compra filtered by the fecha column
 * @method     Compra findOneByClienteid(int $clienteid) Return the first Compra filtered by the clienteid column
 * @method     Compra findOneByProductoid(int $productoid) Return the first Compra filtered by the productoid column
 *
 * @method     array findByIdcompra(int $idcompra) Return Compra objects filtered by the idcompra column
 * @method     array findByCantidad(int $cantidad) Return Compra objects filtered by the cantidad column
 * @method     array findByFecha(string $fecha) Return Compra objects filtered by the fecha column
 * @method     array findByClienteid(int $clienteid) Return Compra objects filtered by the clienteid column
 * @method     array findByProductoid(int $productoid) Return Compra objects filtered by the productoid column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseCompraQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseCompraQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'Compra', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new CompraQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    CompraQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof CompraQuery) {
			return $criteria;
		}
		$query = new CompraQuery();
		if (null !== $modelAlias) {
			$query->setModelAlias($modelAlias);
		}
		if ($criteria instanceof Criteria) {
			$query->mergeWith($criteria);
		}
		return $query;
	}

	/**
	 * Find object by primary key.
	 * Propel uses the instance pool to skip the database if the object exists.
	 * Go fast if the query is untouched.
	 *
	 * <code>
	 * $obj  = $c->findPk(12, $con);
	 * </code>
	 *
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    Compra|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = CompraPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(CompraPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
		$this->basePreSelect($con);
		if ($this->formatter || $this->modelAlias || $this->with || $this->select
		 || $this->selectColumns || $this->asColumns || $this->selectModifiers
		 || $this->map || $this->having || $this->joins) {
			return $this->findPkComplex($key, $con);
		} else {
			return $this->findPkSimple($key, $con);
		}
	}

	/**
	 * Find object by primary key using raw SQL to go fast.
	 * Bypass doSelect() and the object formatter by using generated code.
	 *
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con A connection object
	 *
	 * @return    Compra A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `IDCOMPRA`, `CANTIDAD`, `FECHA`, `CLIENTEID`, `PRODUCTOID` FROM `compra` WHERE `IDCOMPRA` = :p0';
		try {
			$stmt = $con->prepare($sql);
			$stmt->bindValue(':p0', $key, PDO::PARAM_INT);
			$stmt->execute();
		} catch (Exception $e) {
			Propel::log($e->getMessage(), Propel::LOG_ERR);
			throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
		}
		$obj = null;
		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$obj = new Compra();
			$obj->hydrate($row);
			CompraPeer::addInstanceToPool($obj, (string) $key);
		}
		$stmt->closeCursor();

		return $obj;
	}

	/**
	 * Find object by primary key.
	 *
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con A connection object
	 *
	 * @return    Compra|array|mixed the result, formatted by the current formatter
	 */
	protected function findPkComplex($key, $con)
	{
		// As the query uses a PK condition, no limit(1) is necessary.
		$criteria = $this->isKeepQuery() ? clone $this : $this;
		$stmt = $criteria
			->filterByPrimaryKey($key)
			->doSelect($con);
		return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
	}

	/**
	 * Find objects by primary key
	 * <code>
	 * $objs = $c->findPks(array(12, 56, 832), $con);
	 * </code>
	 * @param     array $keys Primary keys to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    PropelObjectCollection|array|mixed the list of results, formatted by the current formatter
	 */
	public function findPks($keys, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection($this->getDbName(), Propel::CONNECTION_READ);
		}
		$this->basePreSelect($con);
		$criteria = $this->isKeepQuery() ? clone $this : $this;
		$stmt = $criteria
			->filterByPrimaryKeys($keys)
			->doSelect($con);
		return $criteria->getFormatter()->init($criteria)->format($stmt);
	}

	/**
	 * Filter the query by primary key
	 *
	 * @param     mixed $key Primary key to use for the query
	 *
	 * @return    CompraQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(CompraPeer::IDCOMPRA, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    CompraQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(CompraPeer::IDCOMPRA, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the idcompra column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByIdcompra(1234); // WHERE idcompra = 1234
	 * $query->filterByIdcompra(array(12, 34)); // WHERE idcompra IN (12, 34)
	 * $query->filterByIdcompra(array('min' => 12)); // WHERE idcompra > 12
	 * </code>
	 *
	 * @param     mixed $idcompra The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CompraQuery The current query, for fluid interface
	 */
	public function filterByIdcompra($idcompra = null, $comparison = null)
	{
		if (is_array($idcompra) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(CompraPeer::IDCOMPRA, $idcompra, $comparison);
	}

	/**
	 * Filter the query on the cantidad column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCantidad(1234); // WHERE cantidad = 1234
	 * $query->filterByCantidad(array(12, 34)); // WHERE cantidad IN (12, 34)
	 * $query->filterByCantidad(array('min' => 12)); // WHERE cantidad > 12
	 * </code>
	 *
	 * @param     mixed $cantidad The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CompraQuery The current query, for fluid interface
	 */
	public function filterByCantidad($cantidad = null, $comparison = null)
	{
		if (is_array($cantidad)) {
			$useMinMax = false;
			if (isset($cantidad['min'])) {
				$this->addUsingAlias(CompraPeer::CANTIDAD, $cantidad['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($cantidad['max'])) {
				$this->addUsingAlias(CompraPeer::CANTIDAD, $cantidad['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(CompraPeer::CANTIDAD, $cantidad, $comparison);
	}

	/**
	 * Filter the query on the fecha column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByFecha('2011-03-14'); // WHERE fecha = '2011-03-14'
	 * $query->filterByFecha('now'); // WHERE fecha = '2011-03-14'
	 * $query->filterByFecha(array('max' => 'yesterday')); // WHERE fecha > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $fecha The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CompraQuery The current query, for fluid interface
	 */
	public function filterByFecha($fecha = null, $comparison = null)
	{
		if (is_array($fecha)) {
			$useMinMax = false;
			if (isset($fecha['min'])) {
				$this->addUsingAlias(CompraPeer::FECHA, $fecha['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($fecha['max'])) {
				$this->addUsingAlias(CompraPeer::FECHA, $fecha['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(CompraPeer::FECHA, $fecha, $comparison);
	}

	/**
	 * Filter the query on the clienteid column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByClienteid(1234); // WHERE clienteid = 1234
	 * $query->filterByClienteid(array(12, 34)); // WHERE clienteid IN (12, 34)
	 * $query->filterByClienteid(array('min' => 12)); // WHERE clienteid > 12
	 * </code>
	 *
	 * @see       filterByCliente()
	 *
	 * @param     mixed $clienteid The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CompraQuery The current query, for fluid interface
	 */
	public function filterByClienteid($clienteid = null, $comparison = null)
	{
		if (is_array($clienteid)) {
			$useMinMax = false;
			if (isset($clienteid['min'])) {
				$this->addUsingAlias(CompraPeer::CLIENTEID, $clienteid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($clienteid['max'])) {
				$this->addUsingAlias(CompraPeer::CLIENTEID, $clienteid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(CompraPeer::CLIENTEID, $clienteid, $comparison);
	}

	/**
	 * Filter the query on the productoid column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByProductoid(1234); // WHERE productoid = 1234
	 * $query->filterByProductoid(array(12, 34)); // WHERE productoid IN (12, 34)
	 * $query->filterByProductoid(array('min' => 12)); // WHERE productoid > 12
	 * </code>
	 *
	 * @see       filterByProducto()
	 *
	 * @param     mixed $productoid The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CompraQuery The current query, for fluid interface
	 */
	public function filterByProductoid($productoid = null, $comparison = null)
	{
		if (is_array($productoid)) {
			$useMinMax = false;
			if (isset($productoid['min'])) {
				$this->addUsingAlias(CompraPeer::PRODUCTOID, $productoid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($productoid['max'])) {
				$this->addUsingAlias(CompraPeer::PRODUCTOID, $productoid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(CompraPeer::PRODUCTOID, $productoid, $comparison);
	}

	/**
	 * Filter the query by a related Cliente object
	 *
	 * @param     Cliente|PropelCollection $cliente The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CompraQuery The current query, for fluid interface
	 */
	public function filterByCliente($cliente, $comparison = null)
	{
		if ($cliente instanceof Cliente) {
			return $this
				->addUsingAlias(CompraPeer::CLIENTEID, $cliente->getIdcliente(), $comparison);
		} elseif ($cliente instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(CompraPeer::CLIENTEID, $cliente->toKeyValue('PrimaryKey', 'Idcliente'), $comparison);
		} else {
			throw new PropelException('filterByCliente() only accepts arguments of type Cliente or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Cliente relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CompraQuery The current query, for fluid interface
	 */
	public function joinCliente($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Cliente');

		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}

		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'Cliente');
		}

		return $this;
	}

	/**
	 * Use the Cliente relation Cliente object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ClienteQuery A secondary query class using the current class as primary query
	 */
	public function useClienteQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinCliente($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Cliente', 'ClienteQuery');
	}

	/**
	 * Filter the query by a related Producto object
	 *
	 * @param     Producto|PropelCollection $producto The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CompraQuery The current query, for fluid interface
	 */
	public function filterByProducto($producto, $comparison = null)
	{
		if ($producto instanceof Producto) {
			return $this
				->addUsingAlias(CompraPeer::PRODUCTOID, $producto->getIdproducto(), $comparison);
		} elseif ($producto instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(CompraPeer::PRODUCTOID, $producto->toKeyValue('PrimaryKey', 'Idproducto'), $comparison);
		} else {
			throw new PropelException('filterByProducto() only accepts arguments of type Producto or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Producto relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CompraQuery The current query, for fluid interface
	 */
	public function joinProducto($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Producto');

		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}

		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'Producto');
		}

		return $this;
	}

	/**
	 * Use the Producto relation Producto object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ProductoQuery A secondary query class using the current class as primary query
	 */
	public function useProductoQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinProducto($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Producto', 'ProductoQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Compra $compra Object to remove from the list of results
	 *
	 * @return    CompraQuery The current query, for fluid interface
	 */
	public function prune($compra = null)
	{
		if ($compra) {
			$this->addUsingAlias(CompraPeer::IDCOMPRA, $compra->getIdcompra(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseCompraQuery