<?php


/**
 * Base class that represents a query for the 'alquiler' table.
 *
 * 
 *
 * @method     AlquilerQuery orderByIdalquiler($order = Criteria::ASC) Order by the idalquiler column
 * @method     AlquilerQuery orderByCancha($order = Criteria::ASC) Order by the cancha column
 * @method     AlquilerQuery orderByFecha($order = Criteria::ASC) Order by the fecha column
 * @method     AlquilerQuery orderByIndumentaria($order = Criteria::ASC) Order by the indumentaria column
 * @method     AlquilerQuery orderByDuchas($order = Criteria::ASC) Order by the duchas column
 * @method     AlquilerQuery orderByConfiteria($order = Criteria::ASC) Order by the confiteria column
 * @method     AlquilerQuery orderByClienteid($order = Criteria::ASC) Order by the clienteid column
 *
 * @method     AlquilerQuery groupByIdalquiler() Group by the idalquiler column
 * @method     AlquilerQuery groupByCancha() Group by the cancha column
 * @method     AlquilerQuery groupByFecha() Group by the fecha column
 * @method     AlquilerQuery groupByIndumentaria() Group by the indumentaria column
 * @method     AlquilerQuery groupByDuchas() Group by the duchas column
 * @method     AlquilerQuery groupByConfiteria() Group by the confiteria column
 * @method     AlquilerQuery groupByClienteid() Group by the clienteid column
 *
 * @method     AlquilerQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     AlquilerQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     AlquilerQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     AlquilerQuery leftJoinCliente($relationAlias = null) Adds a LEFT JOIN clause to the query using the Cliente relation
 * @method     AlquilerQuery rightJoinCliente($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Cliente relation
 * @method     AlquilerQuery innerJoinCliente($relationAlias = null) Adds a INNER JOIN clause to the query using the Cliente relation
 *
 * @method     Alquiler findOne(PropelPDO $con = null) Return the first Alquiler matching the query
 * @method     Alquiler findOneOrCreate(PropelPDO $con = null) Return the first Alquiler matching the query, or a new Alquiler object populated from the query conditions when no match is found
 *
 * @method     Alquiler findOneByIdalquiler(int $idalquiler) Return the first Alquiler filtered by the idalquiler column
 * @method     Alquiler findOneByCancha(int $cancha) Return the first Alquiler filtered by the cancha column
 * @method     Alquiler findOneByFecha(string $fecha) Return the first Alquiler filtered by the fecha column
 * @method     Alquiler findOneByIndumentaria(boolean $indumentaria) Return the first Alquiler filtered by the indumentaria column
 * @method     Alquiler findOneByDuchas(boolean $duchas) Return the first Alquiler filtered by the duchas column
 * @method     Alquiler findOneByConfiteria(boolean $confiteria) Return the first Alquiler filtered by the confiteria column
 * @method     Alquiler findOneByClienteid(int $clienteid) Return the first Alquiler filtered by the clienteid column
 *
 * @method     array findByIdalquiler(int $idalquiler) Return Alquiler objects filtered by the idalquiler column
 * @method     array findByCancha(int $cancha) Return Alquiler objects filtered by the cancha column
 * @method     array findByFecha(string $fecha) Return Alquiler objects filtered by the fecha column
 * @method     array findByIndumentaria(boolean $indumentaria) Return Alquiler objects filtered by the indumentaria column
 * @method     array findByDuchas(boolean $duchas) Return Alquiler objects filtered by the duchas column
 * @method     array findByConfiteria(boolean $confiteria) Return Alquiler objects filtered by the confiteria column
 * @method     array findByClienteid(int $clienteid) Return Alquiler objects filtered by the clienteid column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseAlquilerQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseAlquilerQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'Alquiler', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new AlquilerQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    AlquilerQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof AlquilerQuery) {
			return $criteria;
		}
		$query = new AlquilerQuery();
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
	 * @return    Alquiler|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = AlquilerPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(AlquilerPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Alquiler A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `IDALQUILER`, `CANCHA`, `FECHA`, `INDUMENTARIA`, `DUCHAS`, `CONFITERIA`, `CLIENTEID` FROM `alquiler` WHERE `IDALQUILER` = :p0';
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
			$obj = new Alquiler();
			$obj->hydrate($row);
			AlquilerPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    Alquiler|array|mixed the result, formatted by the current formatter
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
	 * @return    AlquilerQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(AlquilerPeer::IDALQUILER, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    AlquilerQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(AlquilerPeer::IDALQUILER, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the idalquiler column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByIdalquiler(1234); // WHERE idalquiler = 1234
	 * $query->filterByIdalquiler(array(12, 34)); // WHERE idalquiler IN (12, 34)
	 * $query->filterByIdalquiler(array('min' => 12)); // WHERE idalquiler > 12
	 * </code>
	 *
	 * @param     mixed $idalquiler The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AlquilerQuery The current query, for fluid interface
	 */
	public function filterByIdalquiler($idalquiler = null, $comparison = null)
	{
		if (is_array($idalquiler) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(AlquilerPeer::IDALQUILER, $idalquiler, $comparison);
	}

	/**
	 * Filter the query on the cancha column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCancha(1234); // WHERE cancha = 1234
	 * $query->filterByCancha(array(12, 34)); // WHERE cancha IN (12, 34)
	 * $query->filterByCancha(array('min' => 12)); // WHERE cancha > 12
	 * </code>
	 *
	 * @param     mixed $cancha The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AlquilerQuery The current query, for fluid interface
	 */
	public function filterByCancha($cancha = null, $comparison = null)
	{
		if (is_array($cancha)) {
			$useMinMax = false;
			if (isset($cancha['min'])) {
				$this->addUsingAlias(AlquilerPeer::CANCHA, $cancha['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($cancha['max'])) {
				$this->addUsingAlias(AlquilerPeer::CANCHA, $cancha['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AlquilerPeer::CANCHA, $cancha, $comparison);
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
	 * @return    AlquilerQuery The current query, for fluid interface
	 */
	public function filterByFecha($fecha = null, $comparison = null)
	{
		if (is_array($fecha)) {
			$useMinMax = false;
			if (isset($fecha['min'])) {
				$this->addUsingAlias(AlquilerPeer::FECHA, $fecha['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($fecha['max'])) {
				$this->addUsingAlias(AlquilerPeer::FECHA, $fecha['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AlquilerPeer::FECHA, $fecha, $comparison);
	}

	/**
	 * Filter the query on the indumentaria column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByIndumentaria(true); // WHERE indumentaria = true
	 * $query->filterByIndumentaria('yes'); // WHERE indumentaria = true
	 * </code>
	 *
	 * @param     boolean|string $indumentaria The value to use as filter.
	 *              Non-boolean arguments are converted using the following rules:
	 *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AlquilerQuery The current query, for fluid interface
	 */
	public function filterByIndumentaria($indumentaria = null, $comparison = null)
	{
		if (is_string($indumentaria)) {
			$indumentaria = in_array(strtolower($indumentaria), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
		}
		return $this->addUsingAlias(AlquilerPeer::INDUMENTARIA, $indumentaria, $comparison);
	}

	/**
	 * Filter the query on the duchas column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDuchas(true); // WHERE duchas = true
	 * $query->filterByDuchas('yes'); // WHERE duchas = true
	 * </code>
	 *
	 * @param     boolean|string $duchas The value to use as filter.
	 *              Non-boolean arguments are converted using the following rules:
	 *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AlquilerQuery The current query, for fluid interface
	 */
	public function filterByDuchas($duchas = null, $comparison = null)
	{
		if (is_string($duchas)) {
			$duchas = in_array(strtolower($duchas), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
		}
		return $this->addUsingAlias(AlquilerPeer::DUCHAS, $duchas, $comparison);
	}

	/**
	 * Filter the query on the confiteria column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByConfiteria(true); // WHERE confiteria = true
	 * $query->filterByConfiteria('yes'); // WHERE confiteria = true
	 * </code>
	 *
	 * @param     boolean|string $confiteria The value to use as filter.
	 *              Non-boolean arguments are converted using the following rules:
	 *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AlquilerQuery The current query, for fluid interface
	 */
	public function filterByConfiteria($confiteria = null, $comparison = null)
	{
		if (is_string($confiteria)) {
			$confiteria = in_array(strtolower($confiteria), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
		}
		return $this->addUsingAlias(AlquilerPeer::CONFITERIA, $confiteria, $comparison);
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
	 * @return    AlquilerQuery The current query, for fluid interface
	 */
	public function filterByClienteid($clienteid = null, $comparison = null)
	{
		if (is_array($clienteid)) {
			$useMinMax = false;
			if (isset($clienteid['min'])) {
				$this->addUsingAlias(AlquilerPeer::CLIENTEID, $clienteid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($clienteid['max'])) {
				$this->addUsingAlias(AlquilerPeer::CLIENTEID, $clienteid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AlquilerPeer::CLIENTEID, $clienteid, $comparison);
	}

	/**
	 * Filter the query by a related Cliente object
	 *
	 * @param     Cliente|PropelCollection $cliente The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AlquilerQuery The current query, for fluid interface
	 */
	public function filterByCliente($cliente, $comparison = null)
	{
		if ($cliente instanceof Cliente) {
			return $this
				->addUsingAlias(AlquilerPeer::CLIENTEID, $cliente->getIdcliente(), $comparison);
		} elseif ($cliente instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(AlquilerPeer::CLIENTEID, $cliente->toKeyValue('PrimaryKey', 'Idcliente'), $comparison);
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
	 * @return    AlquilerQuery The current query, for fluid interface
	 */
	public function joinCliente($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
	public function useClienteQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinCliente($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Cliente', 'ClienteQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Alquiler $alquiler Object to remove from the list of results
	 *
	 * @return    AlquilerQuery The current query, for fluid interface
	 */
	public function prune($alquiler = null)
	{
		if ($alquiler) {
			$this->addUsingAlias(AlquilerPeer::IDALQUILER, $alquiler->getIdalquiler(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseAlquilerQuery