<?php


/**
 * Base class that represents a query for the 'torneo' table.
 *
 * 
 *
 * @method     TorneoQuery orderByIdtorneo($order = Criteria::ASC) Order by the idtorneo column
 * @method     TorneoQuery orderByTemporada($order = Criteria::ASC) Order by the temporada column
 * @method     TorneoQuery orderByTorneo($order = Criteria::ASC) Order by the torneo column
 * @method     TorneoQuery orderByCampeon($order = Criteria::ASC) Order by the campeon column
 * @method     TorneoQuery orderBySubcampeon($order = Criteria::ASC) Order by the subcampeon column
 *
 * @method     TorneoQuery groupByIdtorneo() Group by the idtorneo column
 * @method     TorneoQuery groupByTemporada() Group by the temporada column
 * @method     TorneoQuery groupByTorneo() Group by the torneo column
 * @method     TorneoQuery groupByCampeon() Group by the campeon column
 * @method     TorneoQuery groupBySubcampeon() Group by the subcampeon column
 *
 * @method     TorneoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     TorneoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     TorneoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     TorneoQuery leftJoinEquipo($relationAlias = null) Adds a LEFT JOIN clause to the query using the Equipo relation
 * @method     TorneoQuery rightJoinEquipo($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Equipo relation
 * @method     TorneoQuery innerJoinEquipo($relationAlias = null) Adds a INNER JOIN clause to the query using the Equipo relation
 *
 * @method     Torneo findOne(PropelPDO $con = null) Return the first Torneo matching the query
 * @method     Torneo findOneOrCreate(PropelPDO $con = null) Return the first Torneo matching the query, or a new Torneo object populated from the query conditions when no match is found
 *
 * @method     Torneo findOneByIdtorneo(int $idtorneo) Return the first Torneo filtered by the idtorneo column
 * @method     Torneo findOneByTemporada(string $temporada) Return the first Torneo filtered by the temporada column
 * @method     Torneo findOneByTorneo(string $torneo) Return the first Torneo filtered by the torneo column
 * @method     Torneo findOneByCampeon(string $campeon) Return the first Torneo filtered by the campeon column
 * @method     Torneo findOneBySubcampeon(string $subcampeon) Return the first Torneo filtered by the subcampeon column
 *
 * @method     array findByIdtorneo(int $idtorneo) Return Torneo objects filtered by the idtorneo column
 * @method     array findByTemporada(string $temporada) Return Torneo objects filtered by the temporada column
 * @method     array findByTorneo(string $torneo) Return Torneo objects filtered by the torneo column
 * @method     array findByCampeon(string $campeon) Return Torneo objects filtered by the campeon column
 * @method     array findBySubcampeon(string $subcampeon) Return Torneo objects filtered by the subcampeon column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseTorneoQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseTorneoQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'Torneo', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new TorneoQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    TorneoQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof TorneoQuery) {
			return $criteria;
		}
		$query = new TorneoQuery();
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
	 * @return    Torneo|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = TorneoPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(TorneoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Torneo A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `IDTORNEO`, `TEMPORADA`, `TORNEO`, `CAMPEON`, `SUBCAMPEON` FROM `torneo` WHERE `IDTORNEO` = :p0';
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
			$obj = new Torneo();
			$obj->hydrate($row);
			TorneoPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    Torneo|array|mixed the result, formatted by the current formatter
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
	 * @return    TorneoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(TorneoPeer::IDTORNEO, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    TorneoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(TorneoPeer::IDTORNEO, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the idtorneo column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByIdtorneo(1234); // WHERE idtorneo = 1234
	 * $query->filterByIdtorneo(array(12, 34)); // WHERE idtorneo IN (12, 34)
	 * $query->filterByIdtorneo(array('min' => 12)); // WHERE idtorneo > 12
	 * </code>
	 *
	 * @param     mixed $idtorneo The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TorneoQuery The current query, for fluid interface
	 */
	public function filterByIdtorneo($idtorneo = null, $comparison = null)
	{
		if (is_array($idtorneo) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(TorneoPeer::IDTORNEO, $idtorneo, $comparison);
	}

	/**
	 * Filter the query on the temporada column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByTemporada('2011-03-14'); // WHERE temporada = '2011-03-14'
	 * $query->filterByTemporada('now'); // WHERE temporada = '2011-03-14'
	 * $query->filterByTemporada(array('max' => 'yesterday')); // WHERE temporada > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $temporada The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TorneoQuery The current query, for fluid interface
	 */
	public function filterByTemporada($temporada = null, $comparison = null)
	{
		if (is_array($temporada)) {
			$useMinMax = false;
			if (isset($temporada['min'])) {
				$this->addUsingAlias(TorneoPeer::TEMPORADA, $temporada['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($temporada['max'])) {
				$this->addUsingAlias(TorneoPeer::TEMPORADA, $temporada['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(TorneoPeer::TEMPORADA, $temporada, $comparison);
	}

	/**
	 * Filter the query on the torneo column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByTorneo('fooValue');   // WHERE torneo = 'fooValue'
	 * $query->filterByTorneo('%fooValue%'); // WHERE torneo LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $torneo The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TorneoQuery The current query, for fluid interface
	 */
	public function filterByTorneo($torneo = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($torneo)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $torneo)) {
				$torneo = str_replace('*', '%', $torneo);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(TorneoPeer::TORNEO, $torneo, $comparison);
	}

	/**
	 * Filter the query on the campeon column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCampeon('fooValue');   // WHERE campeon = 'fooValue'
	 * $query->filterByCampeon('%fooValue%'); // WHERE campeon LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $campeon The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TorneoQuery The current query, for fluid interface
	 */
	public function filterByCampeon($campeon = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($campeon)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $campeon)) {
				$campeon = str_replace('*', '%', $campeon);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(TorneoPeer::CAMPEON, $campeon, $comparison);
	}

	/**
	 * Filter the query on the subcampeon column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterBySubcampeon('fooValue');   // WHERE subcampeon = 'fooValue'
	 * $query->filterBySubcampeon('%fooValue%'); // WHERE subcampeon LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $subcampeon The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TorneoQuery The current query, for fluid interface
	 */
	public function filterBySubcampeon($subcampeon = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($subcampeon)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $subcampeon)) {
				$subcampeon = str_replace('*', '%', $subcampeon);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(TorneoPeer::SUBCAMPEON, $subcampeon, $comparison);
	}

	/**
	 * Filter the query by a related Equipo object
	 *
	 * @param     Equipo $equipo  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TorneoQuery The current query, for fluid interface
	 */
	public function filterByEquipo($equipo, $comparison = null)
	{
		if ($equipo instanceof Equipo) {
			return $this
				->addUsingAlias(TorneoPeer::IDTORNEO, $equipo->getTorneoid(), $comparison);
		} elseif ($equipo instanceof PropelCollection) {
			return $this
				->useEquipoQuery()
				->filterByPrimaryKeys($equipo->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByEquipo() only accepts arguments of type Equipo or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Equipo relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    TorneoQuery The current query, for fluid interface
	 */
	public function joinEquipo($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Equipo');

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
			$this->addJoinObject($join, 'Equipo');
		}

		return $this;
	}

	/**
	 * Use the Equipo relation Equipo object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    EquipoQuery A secondary query class using the current class as primary query
	 */
	public function useEquipoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinEquipo($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Equipo', 'EquipoQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Torneo $torneo Object to remove from the list of results
	 *
	 * @return    TorneoQuery The current query, for fluid interface
	 */
	public function prune($torneo = null)
	{
		if ($torneo) {
			$this->addUsingAlias(TorneoPeer::IDTORNEO, $torneo->getIdtorneo(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseTorneoQuery