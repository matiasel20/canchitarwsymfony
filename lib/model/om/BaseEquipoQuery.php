<?php


/**
 * Base class that represents a query for the 'equipo' table.
 *
 * 
 *
 * @method     EquipoQuery orderByIdequipo($order = Criteria::ASC) Order by the idequipo column
 * @method     EquipoQuery orderByNombre($order = Criteria::ASC) Order by the nombre column
 * @method     EquipoQuery orderByTorneoid($order = Criteria::ASC) Order by the torneoid column
 *
 * @method     EquipoQuery groupByIdequipo() Group by the idequipo column
 * @method     EquipoQuery groupByNombre() Group by the nombre column
 * @method     EquipoQuery groupByTorneoid() Group by the torneoid column
 *
 * @method     EquipoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     EquipoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     EquipoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     EquipoQuery leftJoinTorneo($relationAlias = null) Adds a LEFT JOIN clause to the query using the Torneo relation
 * @method     EquipoQuery rightJoinTorneo($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Torneo relation
 * @method     EquipoQuery innerJoinTorneo($relationAlias = null) Adds a INNER JOIN clause to the query using the Torneo relation
 *
 * @method     EquipoQuery leftJoinCliente($relationAlias = null) Adds a LEFT JOIN clause to the query using the Cliente relation
 * @method     EquipoQuery rightJoinCliente($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Cliente relation
 * @method     EquipoQuery innerJoinCliente($relationAlias = null) Adds a INNER JOIN clause to the query using the Cliente relation
 *
 * @method     Equipo findOne(PropelPDO $con = null) Return the first Equipo matching the query
 * @method     Equipo findOneOrCreate(PropelPDO $con = null) Return the first Equipo matching the query, or a new Equipo object populated from the query conditions when no match is found
 *
 * @method     Equipo findOneByIdequipo(int $idequipo) Return the first Equipo filtered by the idequipo column
 * @method     Equipo findOneByNombre(string $nombre) Return the first Equipo filtered by the nombre column
 * @method     Equipo findOneByTorneoid(int $torneoid) Return the first Equipo filtered by the torneoid column
 *
 * @method     array findByIdequipo(int $idequipo) Return Equipo objects filtered by the idequipo column
 * @method     array findByNombre(string $nombre) Return Equipo objects filtered by the nombre column
 * @method     array findByTorneoid(int $torneoid) Return Equipo objects filtered by the torneoid column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseEquipoQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseEquipoQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'Equipo', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new EquipoQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    EquipoQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof EquipoQuery) {
			return $criteria;
		}
		$query = new EquipoQuery();
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
	 * @return    Equipo|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = EquipoPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(EquipoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Equipo A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `IDEQUIPO`, `NOMBRE`, `TORNEOID` FROM `equipo` WHERE `IDEQUIPO` = :p0';
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
			$obj = new Equipo();
			$obj->hydrate($row);
			EquipoPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    Equipo|array|mixed the result, formatted by the current formatter
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
	 * @return    EquipoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(EquipoPeer::IDEQUIPO, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    EquipoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(EquipoPeer::IDEQUIPO, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the idequipo column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByIdequipo(1234); // WHERE idequipo = 1234
	 * $query->filterByIdequipo(array(12, 34)); // WHERE idequipo IN (12, 34)
	 * $query->filterByIdequipo(array('min' => 12)); // WHERE idequipo > 12
	 * </code>
	 *
	 * @param     mixed $idequipo The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EquipoQuery The current query, for fluid interface
	 */
	public function filterByIdequipo($idequipo = null, $comparison = null)
	{
		if (is_array($idequipo) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(EquipoPeer::IDEQUIPO, $idequipo, $comparison);
	}

	/**
	 * Filter the query on the nombre column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByNombre('fooValue');   // WHERE nombre = 'fooValue'
	 * $query->filterByNombre('%fooValue%'); // WHERE nombre LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $nombre The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EquipoQuery The current query, for fluid interface
	 */
	public function filterByNombre($nombre = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($nombre)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $nombre)) {
				$nombre = str_replace('*', '%', $nombre);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(EquipoPeer::NOMBRE, $nombre, $comparison);
	}

	/**
	 * Filter the query on the torneoid column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByTorneoid(1234); // WHERE torneoid = 1234
	 * $query->filterByTorneoid(array(12, 34)); // WHERE torneoid IN (12, 34)
	 * $query->filterByTorneoid(array('min' => 12)); // WHERE torneoid > 12
	 * </code>
	 *
	 * @see       filterByTorneo()
	 *
	 * @param     mixed $torneoid The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EquipoQuery The current query, for fluid interface
	 */
	public function filterByTorneoid($torneoid = null, $comparison = null)
	{
		if (is_array($torneoid)) {
			$useMinMax = false;
			if (isset($torneoid['min'])) {
				$this->addUsingAlias(EquipoPeer::TORNEOID, $torneoid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($torneoid['max'])) {
				$this->addUsingAlias(EquipoPeer::TORNEOID, $torneoid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(EquipoPeer::TORNEOID, $torneoid, $comparison);
	}

	/**
	 * Filter the query by a related Torneo object
	 *
	 * @param     Torneo|PropelCollection $torneo The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EquipoQuery The current query, for fluid interface
	 */
	public function filterByTorneo($torneo, $comparison = null)
	{
		if ($torneo instanceof Torneo) {
			return $this
				->addUsingAlias(EquipoPeer::TORNEOID, $torneo->getIdtorneo(), $comparison);
		} elseif ($torneo instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(EquipoPeer::TORNEOID, $torneo->toKeyValue('PrimaryKey', 'Idtorneo'), $comparison);
		} else {
			throw new PropelException('filterByTorneo() only accepts arguments of type Torneo or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Torneo relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    EquipoQuery The current query, for fluid interface
	 */
	public function joinTorneo($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Torneo');

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
			$this->addJoinObject($join, 'Torneo');
		}

		return $this;
	}

	/**
	 * Use the Torneo relation Torneo object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    TorneoQuery A secondary query class using the current class as primary query
	 */
	public function useTorneoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinTorneo($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Torneo', 'TorneoQuery');
	}

	/**
	 * Filter the query by a related Cliente object
	 *
	 * @param     Cliente $cliente  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EquipoQuery The current query, for fluid interface
	 */
	public function filterByCliente($cliente, $comparison = null)
	{
		if ($cliente instanceof Cliente) {
			return $this
				->addUsingAlias(EquipoPeer::IDEQUIPO, $cliente->getEquipoid(), $comparison);
		} elseif ($cliente instanceof PropelCollection) {
			return $this
				->useClienteQuery()
				->filterByPrimaryKeys($cliente->getPrimaryKeys())
				->endUse();
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
	 * @return    EquipoQuery The current query, for fluid interface
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
	 * Exclude object from result
	 *
	 * @param     Equipo $equipo Object to remove from the list of results
	 *
	 * @return    EquipoQuery The current query, for fluid interface
	 */
	public function prune($equipo = null)
	{
		if ($equipo) {
			$this->addUsingAlias(EquipoPeer::IDEQUIPO, $equipo->getIdequipo(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseEquipoQuery