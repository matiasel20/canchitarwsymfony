<?php


/**
 * Base class that represents a query for the 'cliente' table.
 *
 * 
 *
 * @method     ClienteQuery orderByIdcliente($order = Criteria::ASC) Order by the idcliente column
 * @method     ClienteQuery orderByUser($order = Criteria::ASC) Order by the user column
 * @method     ClienteQuery orderByNombre($order = Criteria::ASC) Order by the nombre column
 * @method     ClienteQuery orderByApellido($order = Criteria::ASC) Order by the apellido column
 * @method     ClienteQuery orderByDni($order = Criteria::ASC) Order by the dni column
 * @method     ClienteQuery orderByFechanac($order = Criteria::ASC) Order by the fechanac column
 * @method     ClienteQuery orderByDireccion($order = Criteria::ASC) Order by the direccion column
 * @method     ClienteQuery orderByLocalidad($order = Criteria::ASC) Order by the localidad column
 * @method     ClienteQuery orderByTelcel($order = Criteria::ASC) Order by the telcel column
 * @method     ClienteQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     ClienteQuery orderByPassword($order = Criteria::ASC) Order by the password column
 * @method     ClienteQuery orderByEquipoid($order = Criteria::ASC) Order by the equipoid column
 *
 * @method     ClienteQuery groupByIdcliente() Group by the idcliente column
 * @method     ClienteQuery groupByUser() Group by the user column
 * @method     ClienteQuery groupByNombre() Group by the nombre column
 * @method     ClienteQuery groupByApellido() Group by the apellido column
 * @method     ClienteQuery groupByDni() Group by the dni column
 * @method     ClienteQuery groupByFechanac() Group by the fechanac column
 * @method     ClienteQuery groupByDireccion() Group by the direccion column
 * @method     ClienteQuery groupByLocalidad() Group by the localidad column
 * @method     ClienteQuery groupByTelcel() Group by the telcel column
 * @method     ClienteQuery groupByEmail() Group by the email column
 * @method     ClienteQuery groupByPassword() Group by the password column
 * @method     ClienteQuery groupByEquipoid() Group by the equipoid column
 *
 * @method     ClienteQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ClienteQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ClienteQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ClienteQuery leftJoinEquipo($relationAlias = null) Adds a LEFT JOIN clause to the query using the Equipo relation
 * @method     ClienteQuery rightJoinEquipo($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Equipo relation
 * @method     ClienteQuery innerJoinEquipo($relationAlias = null) Adds a INNER JOIN clause to the query using the Equipo relation
 *
 * @method     ClienteQuery leftJoinAlquiler($relationAlias = null) Adds a LEFT JOIN clause to the query using the Alquiler relation
 * @method     ClienteQuery rightJoinAlquiler($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Alquiler relation
 * @method     ClienteQuery innerJoinAlquiler($relationAlias = null) Adds a INNER JOIN clause to the query using the Alquiler relation
 *
 * @method     ClienteQuery leftJoinCompra($relationAlias = null) Adds a LEFT JOIN clause to the query using the Compra relation
 * @method     ClienteQuery rightJoinCompra($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Compra relation
 * @method     ClienteQuery innerJoinCompra($relationAlias = null) Adds a INNER JOIN clause to the query using the Compra relation
 *
 * @method     Cliente findOne(PropelPDO $con = null) Return the first Cliente matching the query
 * @method     Cliente findOneOrCreate(PropelPDO $con = null) Return the first Cliente matching the query, or a new Cliente object populated from the query conditions when no match is found
 *
 * @method     Cliente findOneByIdcliente(int $idcliente) Return the first Cliente filtered by the idcliente column
 * @method     Cliente findOneByUser(string $user) Return the first Cliente filtered by the user column
 * @method     Cliente findOneByNombre(string $nombre) Return the first Cliente filtered by the nombre column
 * @method     Cliente findOneByApellido(string $apellido) Return the first Cliente filtered by the apellido column
 * @method     Cliente findOneByDni(string $dni) Return the first Cliente filtered by the dni column
 * @method     Cliente findOneByFechanac(string $fechanac) Return the first Cliente filtered by the fechanac column
 * @method     Cliente findOneByDireccion(string $direccion) Return the first Cliente filtered by the direccion column
 * @method     Cliente findOneByLocalidad(string $localidad) Return the first Cliente filtered by the localidad column
 * @method     Cliente findOneByTelcel(string $telcel) Return the first Cliente filtered by the telcel column
 * @method     Cliente findOneByEmail(string $email) Return the first Cliente filtered by the email column
 * @method     Cliente findOneByPassword(string $password) Return the first Cliente filtered by the password column
 * @method     Cliente findOneByEquipoid(int $equipoid) Return the first Cliente filtered by the equipoid column
 *
 * @method     array findByIdcliente(int $idcliente) Return Cliente objects filtered by the idcliente column
 * @method     array findByUser(string $user) Return Cliente objects filtered by the user column
 * @method     array findByNombre(string $nombre) Return Cliente objects filtered by the nombre column
 * @method     array findByApellido(string $apellido) Return Cliente objects filtered by the apellido column
 * @method     array findByDni(string $dni) Return Cliente objects filtered by the dni column
 * @method     array findByFechanac(string $fechanac) Return Cliente objects filtered by the fechanac column
 * @method     array findByDireccion(string $direccion) Return Cliente objects filtered by the direccion column
 * @method     array findByLocalidad(string $localidad) Return Cliente objects filtered by the localidad column
 * @method     array findByTelcel(string $telcel) Return Cliente objects filtered by the telcel column
 * @method     array findByEmail(string $email) Return Cliente objects filtered by the email column
 * @method     array findByPassword(string $password) Return Cliente objects filtered by the password column
 * @method     array findByEquipoid(int $equipoid) Return Cliente objects filtered by the equipoid column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseClienteQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseClienteQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'Cliente', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ClienteQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    ClienteQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof ClienteQuery) {
			return $criteria;
		}
		$query = new ClienteQuery();
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
	 * @return    Cliente|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = ClientePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(ClientePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Cliente A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `IDCLIENTE`, `USER`, `NOMBRE`, `APELLIDO`, `DNI`, `FECHANAC`, `DIRECCION`, `LOCALIDAD`, `TELCEL`, `EMAIL`, `PASSWORD`, `EQUIPOID` FROM `cliente` WHERE `IDCLIENTE` = :p0';
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
			$obj = new Cliente();
			$obj->hydrate($row);
			ClientePeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    Cliente|array|mixed the result, formatted by the current formatter
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
	 * @return    ClienteQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(ClientePeer::IDCLIENTE, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    ClienteQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(ClientePeer::IDCLIENTE, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the idcliente column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByIdcliente(1234); // WHERE idcliente = 1234
	 * $query->filterByIdcliente(array(12, 34)); // WHERE idcliente IN (12, 34)
	 * $query->filterByIdcliente(array('min' => 12)); // WHERE idcliente > 12
	 * </code>
	 *
	 * @param     mixed $idcliente The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClienteQuery The current query, for fluid interface
	 */
	public function filterByIdcliente($idcliente = null, $comparison = null)
	{
		if (is_array($idcliente) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(ClientePeer::IDCLIENTE, $idcliente, $comparison);
	}

	/**
	 * Filter the query on the user column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByUser('fooValue');   // WHERE user = 'fooValue'
	 * $query->filterByUser('%fooValue%'); // WHERE user LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $user The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClienteQuery The current query, for fluid interface
	 */
	public function filterByUser($user = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($user)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $user)) {
				$user = str_replace('*', '%', $user);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ClientePeer::USER, $user, $comparison);
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
	 * @return    ClienteQuery The current query, for fluid interface
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
		return $this->addUsingAlias(ClientePeer::NOMBRE, $nombre, $comparison);
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
	 * @return    ClienteQuery The current query, for fluid interface
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
		return $this->addUsingAlias(ClientePeer::APELLIDO, $apellido, $comparison);
	}

	/**
	 * Filter the query on the dni column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDni('fooValue');   // WHERE dni = 'fooValue'
	 * $query->filterByDni('%fooValue%'); // WHERE dni LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $dni The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClienteQuery The current query, for fluid interface
	 */
	public function filterByDni($dni = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($dni)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $dni)) {
				$dni = str_replace('*', '%', $dni);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ClientePeer::DNI, $dni, $comparison);
	}

	/**
	 * Filter the query on the fechanac column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByFechanac('2011-03-14'); // WHERE fechanac = '2011-03-14'
	 * $query->filterByFechanac('now'); // WHERE fechanac = '2011-03-14'
	 * $query->filterByFechanac(array('max' => 'yesterday')); // WHERE fechanac > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $fechanac The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClienteQuery The current query, for fluid interface
	 */
	public function filterByFechanac($fechanac = null, $comparison = null)
	{
		if (is_array($fechanac)) {
			$useMinMax = false;
			if (isset($fechanac['min'])) {
				$this->addUsingAlias(ClientePeer::FECHANAC, $fechanac['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($fechanac['max'])) {
				$this->addUsingAlias(ClientePeer::FECHANAC, $fechanac['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ClientePeer::FECHANAC, $fechanac, $comparison);
	}

	/**
	 * Filter the query on the direccion column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDireccion('fooValue');   // WHERE direccion = 'fooValue'
	 * $query->filterByDireccion('%fooValue%'); // WHERE direccion LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $direccion The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClienteQuery The current query, for fluid interface
	 */
	public function filterByDireccion($direccion = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($direccion)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $direccion)) {
				$direccion = str_replace('*', '%', $direccion);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ClientePeer::DIRECCION, $direccion, $comparison);
	}

	/**
	 * Filter the query on the localidad column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByLocalidad('fooValue');   // WHERE localidad = 'fooValue'
	 * $query->filterByLocalidad('%fooValue%'); // WHERE localidad LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $localidad The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClienteQuery The current query, for fluid interface
	 */
	public function filterByLocalidad($localidad = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($localidad)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $localidad)) {
				$localidad = str_replace('*', '%', $localidad);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ClientePeer::LOCALIDAD, $localidad, $comparison);
	}

	/**
	 * Filter the query on the telcel column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByTelcel('fooValue');   // WHERE telcel = 'fooValue'
	 * $query->filterByTelcel('%fooValue%'); // WHERE telcel LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $telcel The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClienteQuery The current query, for fluid interface
	 */
	public function filterByTelcel($telcel = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($telcel)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $telcel)) {
				$telcel = str_replace('*', '%', $telcel);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ClientePeer::TELCEL, $telcel, $comparison);
	}

	/**
	 * Filter the query on the email column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByEmail('fooValue');   // WHERE email = 'fooValue'
	 * $query->filterByEmail('%fooValue%'); // WHERE email LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $email The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClienteQuery The current query, for fluid interface
	 */
	public function filterByEmail($email = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($email)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $email)) {
				$email = str_replace('*', '%', $email);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ClientePeer::EMAIL, $email, $comparison);
	}

	/**
	 * Filter the query on the password column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByPassword('fooValue');   // WHERE password = 'fooValue'
	 * $query->filterByPassword('%fooValue%'); // WHERE password LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $password The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClienteQuery The current query, for fluid interface
	 */
	public function filterByPassword($password = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($password)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $password)) {
				$password = str_replace('*', '%', $password);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ClientePeer::PASSWORD, $password, $comparison);
	}

	/**
	 * Filter the query on the equipoid column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByEquipoid(1234); // WHERE equipoid = 1234
	 * $query->filterByEquipoid(array(12, 34)); // WHERE equipoid IN (12, 34)
	 * $query->filterByEquipoid(array('min' => 12)); // WHERE equipoid > 12
	 * </code>
	 *
	 * @see       filterByEquipo()
	 *
	 * @param     mixed $equipoid The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClienteQuery The current query, for fluid interface
	 */
	public function filterByEquipoid($equipoid = null, $comparison = null)
	{
		if (is_array($equipoid)) {
			$useMinMax = false;
			if (isset($equipoid['min'])) {
				$this->addUsingAlias(ClientePeer::EQUIPOID, $equipoid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($equipoid['max'])) {
				$this->addUsingAlias(ClientePeer::EQUIPOID, $equipoid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ClientePeer::EQUIPOID, $equipoid, $comparison);
	}

	/**
	 * Filter the query by a related Equipo object
	 *
	 * @param     Equipo|PropelCollection $equipo The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClienteQuery The current query, for fluid interface
	 */
	public function filterByEquipo($equipo, $comparison = null)
	{
		if ($equipo instanceof Equipo) {
			return $this
				->addUsingAlias(ClientePeer::EQUIPOID, $equipo->getIdequipo(), $comparison);
		} elseif ($equipo instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(ClientePeer::EQUIPOID, $equipo->toKeyValue('PrimaryKey', 'Idequipo'), $comparison);
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
	 * @return    ClienteQuery The current query, for fluid interface
	 */
	public function joinEquipo($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
	public function useEquipoQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinEquipo($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Equipo', 'EquipoQuery');
	}

	/**
	 * Filter the query by a related Alquiler object
	 *
	 * @param     Alquiler $alquiler  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClienteQuery The current query, for fluid interface
	 */
	public function filterByAlquiler($alquiler, $comparison = null)
	{
		if ($alquiler instanceof Alquiler) {
			return $this
				->addUsingAlias(ClientePeer::IDCLIENTE, $alquiler->getClienteid(), $comparison);
		} elseif ($alquiler instanceof PropelCollection) {
			return $this
				->useAlquilerQuery()
				->filterByPrimaryKeys($alquiler->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByAlquiler() only accepts arguments of type Alquiler or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Alquiler relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ClienteQuery The current query, for fluid interface
	 */
	public function joinAlquiler($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Alquiler');

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
			$this->addJoinObject($join, 'Alquiler');
		}

		return $this;
	}

	/**
	 * Use the Alquiler relation Alquiler object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AlquilerQuery A secondary query class using the current class as primary query
	 */
	public function useAlquilerQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinAlquiler($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Alquiler', 'AlquilerQuery');
	}

	/**
	 * Filter the query by a related Compra object
	 *
	 * @param     Compra $compra  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClienteQuery The current query, for fluid interface
	 */
	public function filterByCompra($compra, $comparison = null)
	{
		if ($compra instanceof Compra) {
			return $this
				->addUsingAlias(ClientePeer::IDCLIENTE, $compra->getClienteid(), $comparison);
		} elseif ($compra instanceof PropelCollection) {
			return $this
				->useCompraQuery()
				->filterByPrimaryKeys($compra->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByCompra() only accepts arguments of type Compra or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Compra relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ClienteQuery The current query, for fluid interface
	 */
	public function joinCompra($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Compra');

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
			$this->addJoinObject($join, 'Compra');
		}

		return $this;
	}

	/**
	 * Use the Compra relation Compra object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CompraQuery A secondary query class using the current class as primary query
	 */
	public function useCompraQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinCompra($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Compra', 'CompraQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Cliente $cliente Object to remove from the list of results
	 *
	 * @return    ClienteQuery The current query, for fluid interface
	 */
	public function prune($cliente = null)
	{
		if ($cliente) {
			$this->addUsingAlias(ClientePeer::IDCLIENTE, $cliente->getIdcliente(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseClienteQuery