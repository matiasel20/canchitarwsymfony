<?php


/**
 * Base class that represents a query for the 'empleado' table.
 *
 * 
 *
 * @method     EmpleadoQuery orderByIdempleado($order = Criteria::ASC) Order by the idempleado column
 * @method     EmpleadoQuery orderByNombre($order = Criteria::ASC) Order by the nombre column
 * @method     EmpleadoQuery orderByApellido($order = Criteria::ASC) Order by the apellido column
 * @method     EmpleadoQuery orderByDni($order = Criteria::ASC) Order by the dni column
 * @method     EmpleadoQuery orderByDireccion($order = Criteria::ASC) Order by the direccion column
 * @method     EmpleadoQuery orderByFechanac($order = Criteria::ASC) Order by the fechanac column
 * @method     EmpleadoQuery orderByTelcel($order = Criteria::ASC) Order by the telcel column
 * @method     EmpleadoQuery orderByUsuario($order = Criteria::ASC) Order by the usuario column
 * @method     EmpleadoQuery orderByPassword($order = Criteria::ASC) Order by the password column
 * @method     EmpleadoQuery orderByEmail($order = Criteria::ASC) Order by the email column
 *
 * @method     EmpleadoQuery groupByIdempleado() Group by the idempleado column
 * @method     EmpleadoQuery groupByNombre() Group by the nombre column
 * @method     EmpleadoQuery groupByApellido() Group by the apellido column
 * @method     EmpleadoQuery groupByDni() Group by the dni column
 * @method     EmpleadoQuery groupByDireccion() Group by the direccion column
 * @method     EmpleadoQuery groupByFechanac() Group by the fechanac column
 * @method     EmpleadoQuery groupByTelcel() Group by the telcel column
 * @method     EmpleadoQuery groupByUsuario() Group by the usuario column
 * @method     EmpleadoQuery groupByPassword() Group by the password column
 * @method     EmpleadoQuery groupByEmail() Group by the email column
 *
 * @method     EmpleadoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     EmpleadoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     EmpleadoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     Empleado findOne(PropelPDO $con = null) Return the first Empleado matching the query
 * @method     Empleado findOneOrCreate(PropelPDO $con = null) Return the first Empleado matching the query, or a new Empleado object populated from the query conditions when no match is found
 *
 * @method     Empleado findOneByIdempleado(int $idempleado) Return the first Empleado filtered by the idempleado column
 * @method     Empleado findOneByNombre(string $nombre) Return the first Empleado filtered by the nombre column
 * @method     Empleado findOneByApellido(string $apellido) Return the first Empleado filtered by the apellido column
 * @method     Empleado findOneByDni(string $dni) Return the first Empleado filtered by the dni column
 * @method     Empleado findOneByDireccion(string $direccion) Return the first Empleado filtered by the direccion column
 * @method     Empleado findOneByFechanac(string $fechanac) Return the first Empleado filtered by the fechanac column
 * @method     Empleado findOneByTelcel(string $telcel) Return the first Empleado filtered by the telcel column
 * @method     Empleado findOneByUsuario(string $usuario) Return the first Empleado filtered by the usuario column
 * @method     Empleado findOneByPassword(string $password) Return the first Empleado filtered by the password column
 * @method     Empleado findOneByEmail(string $email) Return the first Empleado filtered by the email column
 *
 * @method     array findByIdempleado(int $idempleado) Return Empleado objects filtered by the idempleado column
 * @method     array findByNombre(string $nombre) Return Empleado objects filtered by the nombre column
 * @method     array findByApellido(string $apellido) Return Empleado objects filtered by the apellido column
 * @method     array findByDni(string $dni) Return Empleado objects filtered by the dni column
 * @method     array findByDireccion(string $direccion) Return Empleado objects filtered by the direccion column
 * @method     array findByFechanac(string $fechanac) Return Empleado objects filtered by the fechanac column
 * @method     array findByTelcel(string $telcel) Return Empleado objects filtered by the telcel column
 * @method     array findByUsuario(string $usuario) Return Empleado objects filtered by the usuario column
 * @method     array findByPassword(string $password) Return Empleado objects filtered by the password column
 * @method     array findByEmail(string $email) Return Empleado objects filtered by the email column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseEmpleadoQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseEmpleadoQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'Empleado', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new EmpleadoQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    EmpleadoQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof EmpleadoQuery) {
			return $criteria;
		}
		$query = new EmpleadoQuery();
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
	 * @return    Empleado|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = EmpleadoPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(EmpleadoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Empleado A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `IDEMPLEADO`, `NOMBRE`, `APELLIDO`, `DNI`, `DIRECCION`, `FECHANAC`, `TELCEL`, `USUARIO`, `PASSWORD`, `EMAIL` FROM `empleado` WHERE `IDEMPLEADO` = :p0';
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
			$obj = new Empleado();
			$obj->hydrate($row);
			EmpleadoPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    Empleado|array|mixed the result, formatted by the current formatter
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
	 * @return    EmpleadoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(EmpleadoPeer::IDEMPLEADO, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    EmpleadoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(EmpleadoPeer::IDEMPLEADO, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the idempleado column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByIdempleado(1234); // WHERE idempleado = 1234
	 * $query->filterByIdempleado(array(12, 34)); // WHERE idempleado IN (12, 34)
	 * $query->filterByIdempleado(array('min' => 12)); // WHERE idempleado > 12
	 * </code>
	 *
	 * @param     mixed $idempleado The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EmpleadoQuery The current query, for fluid interface
	 */
	public function filterByIdempleado($idempleado = null, $comparison = null)
	{
		if (is_array($idempleado) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(EmpleadoPeer::IDEMPLEADO, $idempleado, $comparison);
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
	 * @return    EmpleadoQuery The current query, for fluid interface
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
		return $this->addUsingAlias(EmpleadoPeer::NOMBRE, $nombre, $comparison);
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
	 * @return    EmpleadoQuery The current query, for fluid interface
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
		return $this->addUsingAlias(EmpleadoPeer::APELLIDO, $apellido, $comparison);
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
	 * @return    EmpleadoQuery The current query, for fluid interface
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
		return $this->addUsingAlias(EmpleadoPeer::DNI, $dni, $comparison);
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
	 * @return    EmpleadoQuery The current query, for fluid interface
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
		return $this->addUsingAlias(EmpleadoPeer::DIRECCION, $direccion, $comparison);
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
	 * @return    EmpleadoQuery The current query, for fluid interface
	 */
	public function filterByFechanac($fechanac = null, $comparison = null)
	{
		if (is_array($fechanac)) {
			$useMinMax = false;
			if (isset($fechanac['min'])) {
				$this->addUsingAlias(EmpleadoPeer::FECHANAC, $fechanac['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($fechanac['max'])) {
				$this->addUsingAlias(EmpleadoPeer::FECHANAC, $fechanac['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(EmpleadoPeer::FECHANAC, $fechanac, $comparison);
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
	 * @return    EmpleadoQuery The current query, for fluid interface
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
		return $this->addUsingAlias(EmpleadoPeer::TELCEL, $telcel, $comparison);
	}

	/**
	 * Filter the query on the usuario column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByUsuario('fooValue');   // WHERE usuario = 'fooValue'
	 * $query->filterByUsuario('%fooValue%'); // WHERE usuario LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $usuario The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EmpleadoQuery The current query, for fluid interface
	 */
	public function filterByUsuario($usuario = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($usuario)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $usuario)) {
				$usuario = str_replace('*', '%', $usuario);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(EmpleadoPeer::USUARIO, $usuario, $comparison);
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
	 * @return    EmpleadoQuery The current query, for fluid interface
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
		return $this->addUsingAlias(EmpleadoPeer::PASSWORD, $password, $comparison);
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
	 * @return    EmpleadoQuery The current query, for fluid interface
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
		return $this->addUsingAlias(EmpleadoPeer::EMAIL, $email, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Empleado $empleado Object to remove from the list of results
	 *
	 * @return    EmpleadoQuery The current query, for fluid interface
	 */
	public function prune($empleado = null)
	{
		if ($empleado) {
			$this->addUsingAlias(EmpleadoPeer::IDEMPLEADO, $empleado->getIdempleado(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseEmpleadoQuery