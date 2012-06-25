<?php


/**
 * Base class that represents a query for the 'clientes' table.
 *
 * 
 *
 * @method     ClientesQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ClientesQuery orderByApellido($order = Criteria::ASC) Order by the apellido column
 * @method     ClientesQuery orderByNombre($order = Criteria::ASC) Order by the nombre column
 * @method     ClientesQuery orderByEdad($order = Criteria::ASC) Order by the edad column
 *
 * @method     ClientesQuery groupById() Group by the id column
 * @method     ClientesQuery groupByApellido() Group by the apellido column
 * @method     ClientesQuery groupByNombre() Group by the nombre column
 * @method     ClientesQuery groupByEdad() Group by the edad column
 *
 * @method     ClientesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ClientesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ClientesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     Clientes findOne(PropelPDO $con = null) Return the first Clientes matching the query
 * @method     Clientes findOneOrCreate(PropelPDO $con = null) Return the first Clientes matching the query, or a new Clientes object populated from the query conditions when no match is found
 *
 * @method     Clientes findOneById(int $id) Return the first Clientes filtered by the id column
 * @method     Clientes findOneByApellido(string $apellido) Return the first Clientes filtered by the apellido column
 * @method     Clientes findOneByNombre(string $nombre) Return the first Clientes filtered by the nombre column
 * @method     Clientes findOneByEdad(int $edad) Return the first Clientes filtered by the edad column
 *
 * @method     array findById(int $id) Return Clientes objects filtered by the id column
 * @method     array findByApellido(string $apellido) Return Clientes objects filtered by the apellido column
 * @method     array findByNombre(string $nombre) Return Clientes objects filtered by the nombre column
 * @method     array findByEdad(int $edad) Return Clientes objects filtered by the edad column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseClientesQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseClientesQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'Clientes', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ClientesQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    ClientesQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof ClientesQuery) {
			return $criteria;
		}
		$query = new ClientesQuery();
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
	 * @return    Clientes|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = ClientesPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(ClientesPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Clientes A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `APELLIDO`, `NOMBRE`, `EDAD` FROM `clientes` WHERE `ID` = :p0';
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
			$obj = new Clientes();
			$obj->hydrate($row);
			ClientesPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    Clientes|array|mixed the result, formatted by the current formatter
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
	 * @return    ClientesQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(ClientesPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    ClientesQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(ClientesPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterById(1234); // WHERE id = 1234
	 * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
	 * $query->filterById(array('min' => 12)); // WHERE id > 12
	 * </code>
	 *
	 * @param     mixed $id The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClientesQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(ClientesPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the apellido column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByApellido('fooValue');   // WHERE apellido = 'fooValue'
	 * $query->filterByApellido('%fooValue%'); // WHERE apellido LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $apellido The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClientesQuery The current query, for fluid interface
	 */
	public function filterByApellido($apellido = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($apellido)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $apellido)) {
				$apellido = str_replace('*', '%', $apellido);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ClientesPeer::APELLIDO, $apellido, $comparison);
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
	 * @return    ClientesQuery The current query, for fluid interface
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
		return $this->addUsingAlias(ClientesPeer::NOMBRE, $nombre, $comparison);
	}

	/**
	 * Filter the query on the edad column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByEdad(1234); // WHERE edad = 1234
	 * $query->filterByEdad(array(12, 34)); // WHERE edad IN (12, 34)
	 * $query->filterByEdad(array('min' => 12)); // WHERE edad > 12
	 * </code>
	 *
	 * @param     mixed $edad The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClientesQuery The current query, for fluid interface
	 */
	public function filterByEdad($edad = null, $comparison = null)
	{
		if (is_array($edad)) {
			$useMinMax = false;
			if (isset($edad['min'])) {
				$this->addUsingAlias(ClientesPeer::EDAD, $edad['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($edad['max'])) {
				$this->addUsingAlias(ClientesPeer::EDAD, $edad['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ClientesPeer::EDAD, $edad, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Clientes $clientes Object to remove from the list of results
	 *
	 * @return    ClientesQuery The current query, for fluid interface
	 */
	public function prune($clientes = null)
	{
		if ($clientes) {
			$this->addUsingAlias(ClientesPeer::ID, $clientes->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseClientesQuery