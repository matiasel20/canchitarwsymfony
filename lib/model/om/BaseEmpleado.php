<?php


/**
 * Base class that represents a row from the 'empleado' table.
 *
 * 
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseEmpleado extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'EmpleadoPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        EmpleadoPeer
	 */
	protected static $peer;

	/**
	 * The flag var to prevent infinit loop in deep copy
	 * @var       boolean
	 */
	protected $startCopy = false;

	/**
	 * The value for the idempleado field.
	 * @var        int
	 */
	protected $idempleado;

	/**
	 * The value for the nombre field.
	 * @var        string
	 */
	protected $nombre;

	/**
	 * The value for the apellido field.
	 * @var        string
	 */
	protected $apellido;

	/**
	 * The value for the dni field.
	 * @var        string
	 */
	protected $dni;

	/**
	 * The value for the direccion field.
	 * @var        string
	 */
	protected $direccion;

	/**
	 * The value for the fechanac field.
	 * @var        string
	 */
	protected $fechanac;

	/**
	 * The value for the telcel field.
	 * @var        string
	 */
	protected $telcel;

	/**
	 * The value for the usuario field.
	 * @var        string
	 */
	protected $usuario;

	/**
	 * The value for the password field.
	 * @var        string
	 */
	protected $password;

	/**
	 * The value for the email field.
	 * @var        string
	 */
	protected $email;

	/**
	 * Flag to prevent endless save loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInSave = false;

	/**
	 * Flag to prevent endless validation loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInValidation = false;

	/**
	 * Get the [idempleado] column value.
	 * 
	 * @return     int
	 */
	public function getIdempleado()
	{
		return $this->idempleado;
	}

	/**
	 * Get the [nombre] column value.
	 * 
	 * @return     string
	 */
	public function getNombre()
	{
		return $this->nombre;
	}

	/**
	 * Get the [apellido] column value.
	 * 
	 * @return     string
	 */
	public function getApellido()
	{
		return $this->apellido;
	}

	/**
	 * Get the [dni] column value.
	 * 
	 * @return     string
	 */
	public function getDni()
	{
		return $this->dni;
	}

	/**
	 * Get the [direccion] column value.
	 * 
	 * @return     string
	 */
	public function getDireccion()
	{
		return $this->direccion;
	}

	/**
	 * Get the [optionally formatted] temporal [fechanac] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getFechanac($format = 'Y-m-d')
	{
		if ($this->fechanac === null) {
			return null;
		}


		if ($this->fechanac === '0000-00-00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->fechanac);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->fechanac, true), $x);
			}
		}

		if ($format === null) {
			// Because propel.useDateTimeClass is TRUE, we return a DateTime object.
			return $dt;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $dt->format('U'));
		} else {
			return $dt->format($format);
		}
	}

	/**
	 * Get the [telcel] column value.
	 * 
	 * @return     string
	 */
	public function getTelcel()
	{
		return $this->telcel;
	}

	/**
	 * Get the [usuario] column value.
	 * 
	 * @return     string
	 */
	public function getUsuario()
	{
		return $this->usuario;
	}

	/**
	 * Get the [password] column value.
	 * 
	 * @return     string
	 */
	public function getPassword()
	{
		return $this->password;
	}

	/**
	 * Get the [email] column value.
	 * 
	 * @return     string
	 */
	public function getEmail()
	{
		return $this->email;
	}

	/**
	 * Set the value of [idempleado] column.
	 * 
	 * @param      int $v new value
	 * @return     Empleado The current object (for fluent API support)
	 */
	public function setIdempleado($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->idempleado !== $v) {
			$this->idempleado = $v;
			$this->modifiedColumns[] = EmpleadoPeer::IDEMPLEADO;
		}

		return $this;
	} // setIdempleado()

	/**
	 * Set the value of [nombre] column.
	 * 
	 * @param      string $v new value
	 * @return     Empleado The current object (for fluent API support)
	 */
	public function setNombre($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->nombre !== $v) {
			$this->nombre = $v;
			$this->modifiedColumns[] = EmpleadoPeer::NOMBRE;
		}

		return $this;
	} // setNombre()

	/**
	 * Set the value of [apellido] column.
	 * 
	 * @param      string $v new value
	 * @return     Empleado The current object (for fluent API support)
	 */
	public function setApellido($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->apellido !== $v) {
			$this->apellido = $v;
			$this->modifiedColumns[] = EmpleadoPeer::APELLIDO;
		}

		return $this;
	} // setApellido()

	/**
	 * Set the value of [dni] column.
	 * 
	 * @param      string $v new value
	 * @return     Empleado The current object (for fluent API support)
	 */
	public function setDni($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->dni !== $v) {
			$this->dni = $v;
			$this->modifiedColumns[] = EmpleadoPeer::DNI;
		}

		return $this;
	} // setDni()

	/**
	 * Set the value of [direccion] column.
	 * 
	 * @param      string $v new value
	 * @return     Empleado The current object (for fluent API support)
	 */
	public function setDireccion($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->direccion !== $v) {
			$this->direccion = $v;
			$this->modifiedColumns[] = EmpleadoPeer::DIRECCION;
		}

		return $this;
	} // setDireccion()

	/**
	 * Sets the value of [fechanac] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.
	 *               Empty strings are treated as NULL.
	 * @return     Empleado The current object (for fluent API support)
	 */
	public function setFechanac($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');
		if ($this->fechanac !== null || $dt !== null) {
			$currentDateAsString = ($this->fechanac !== null && $tmpDt = new DateTime($this->fechanac)) ? $tmpDt->format('Y-m-d') : null;
			$newDateAsString = $dt ? $dt->format('Y-m-d') : null;
			if ($currentDateAsString !== $newDateAsString) {
				$this->fechanac = $newDateAsString;
				$this->modifiedColumns[] = EmpleadoPeer::FECHANAC;
			}
		} // if either are not null

		return $this;
	} // setFechanac()

	/**
	 * Set the value of [telcel] column.
	 * 
	 * @param      string $v new value
	 * @return     Empleado The current object (for fluent API support)
	 */
	public function setTelcel($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->telcel !== $v) {
			$this->telcel = $v;
			$this->modifiedColumns[] = EmpleadoPeer::TELCEL;
		}

		return $this;
	} // setTelcel()

	/**
	 * Set the value of [usuario] column.
	 * 
	 * @param      string $v new value
	 * @return     Empleado The current object (for fluent API support)
	 */
	public function setUsuario($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->usuario !== $v) {
			$this->usuario = $v;
			$this->modifiedColumns[] = EmpleadoPeer::USUARIO;
		}

		return $this;
	} // setUsuario()

	/**
	 * Set the value of [password] column.
	 * 
	 * @param      string $v new value
	 * @return     Empleado The current object (for fluent API support)
	 */
	public function setPassword($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->password !== $v) {
			$this->password = $v;
			$this->modifiedColumns[] = EmpleadoPeer::PASSWORD;
		}

		return $this;
	} // setPassword()

	/**
	 * Set the value of [email] column.
	 * 
	 * @param      string $v new value
	 * @return     Empleado The current object (for fluent API support)
	 */
	public function setEmail($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->email !== $v) {
			$this->email = $v;
			$this->modifiedColumns[] = EmpleadoPeer::EMAIL;
		}

		return $this;
	} // setEmail()

	/**
	 * Indicates whether the columns in this object are only set to default values.
	 *
	 * This method can be used in conjunction with isModified() to indicate whether an object is both
	 * modified _and_ has some values set which are non-default.
	 *
	 * @return     boolean Whether the columns in this object are only been set with default values.
	 */
	public function hasOnlyDefaultValues()
	{
		// otherwise, everything was equal, so return TRUE
		return true;
	} // hasOnlyDefaultValues()

	/**
	 * Hydrates (populates) the object variables with values from the database resultset.
	 *
	 * An offset (0-based "start column") is specified so that objects can be hydrated
	 * with a subset of the columns in the resultset rows.  This is needed, for example,
	 * for results of JOIN queries where the resultset row includes columns from two or
	 * more tables.
	 *
	 * @param      array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
	 * @param      int $startcol 0-based offset column which indicates which restultset column to start with.
	 * @param      boolean $rehydrate Whether this object is being re-hydrated from the database.
	 * @return     int next starting column
	 * @throws     PropelException  - Any caught Exception will be rewrapped as a PropelException.
	 */
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->idempleado = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->nombre = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->apellido = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->dni = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->direccion = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->fechanac = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->telcel = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->usuario = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->password = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
			$this->email = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 10; // 10 = EmpleadoPeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating Empleado object", $e);
		}
	}

	/**
	 * Checks and repairs the internal consistency of the object.
	 *
	 * This method is executed after an already-instantiated object is re-hydrated
	 * from the database.  It exists to check any foreign keys to make sure that
	 * the objects related to the current object are correct based on foreign key.
	 *
	 * You can override this method in the stub class, but you should always invoke
	 * the base method from the overridden method (i.e. parent::ensureConsistency()),
	 * in case your model changes.
	 *
	 * @throws     PropelException
	 */
	public function ensureConsistency()
	{

	} // ensureConsistency

	/**
	 * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
	 *
	 * This will only work if the object has been saved and has a valid primary key set.
	 *
	 * @param      boolean $deep (optional) Whether to also de-associated any related objects.
	 * @param      PropelPDO $con (optional) The PropelPDO connection to use.
	 * @return     void
	 * @throws     PropelException - if this object is deleted, unsaved or doesn't have pk match in db
	 */
	public function reload($deep = false, PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("Cannot reload a deleted object.");
		}

		if ($this->isNew()) {
			throw new PropelException("Cannot reload an unsaved object.");
		}

		if ($con === null) {
			$con = Propel::getConnection(EmpleadoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = EmpleadoPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

		} // if (deep)
	}

	/**
	 * Removes this object from datastore and sets delete attribute.
	 *
	 * @param      PropelPDO $con
	 * @return     void
	 * @throws     PropelException
	 * @see        BaseObject::setDeleted()
	 * @see        BaseObject::isDeleted()
	 */
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(EmpleadoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$deleteQuery = EmpleadoQuery::create()
				->filterByPrimaryKey($this->getPrimaryKey());
			$ret = $this->preDelete($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseEmpleado:delete:pre') as $callable)
			{
			  if (call_user_func($callable, $this, $con))
			  {
			    $con->commit();
			    return;
			  }
			}

			if ($ret) {
				$deleteQuery->delete($con);
				$this->postDelete($con);
				// symfony_behaviors behavior
				foreach (sfMixer::getCallables('BaseEmpleado:delete:post') as $callable)
				{
				  call_user_func($callable, $this, $con);
				}

				$con->commit();
				$this->setDeleted(true);
			} else {
				$con->commit();
			}
		} catch (Exception $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Persists this object to the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All modified related objects will also be persisted in the doSave()
	 * method.  This method wraps all precipitate database operations in a
	 * single transaction.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        doSave()
	 */
	public function save(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(EmpleadoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		$isInsert = $this->isNew();
		try {
			$ret = $this->preSave($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseEmpleado:save:pre') as $callable)
			{
			  if (is_integer($affectedRows = call_user_func($callable, $this, $con)))
			  {
			  	$con->commit();
			    return $affectedRows;
			  }
			}

			if ($isInsert) {
				$ret = $ret && $this->preInsert($con);
			} else {
				$ret = $ret && $this->preUpdate($con);
			}
			if ($ret) {
				$affectedRows = $this->doSave($con);
				if ($isInsert) {
					$this->postInsert($con);
				} else {
					$this->postUpdate($con);
				}
				$this->postSave($con);
				// symfony_behaviors behavior
				foreach (sfMixer::getCallables('BaseEmpleado:save:post') as $callable)
				{
				  call_user_func($callable, $this, $con, $affectedRows);
				}

				EmpleadoPeer::addInstanceToPool($this);
			} else {
				$affectedRows = 0;
			}
			$con->commit();
			return $affectedRows;
		} catch (Exception $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Performs the work of inserting or updating the row in the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All related objects are also updated in this method.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        save()
	 */
	protected function doSave(PropelPDO $con)
	{
		$affectedRows = 0; // initialize var to track total num of affected rows
		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;

			if ($this->isNew() || $this->isModified()) {
				// persist changes
				if ($this->isNew()) {
					$this->doInsert($con);
				} else {
					$this->doUpdate($con);
				}
				$affectedRows += 1;
				$this->resetModified();
			}

			$this->alreadyInSave = false;

		}
		return $affectedRows;
	} // doSave()

	/**
	 * Insert the row in the database.
	 *
	 * @param      PropelPDO $con
	 *
	 * @throws     PropelException
	 * @see        doSave()
	 */
	protected function doInsert(PropelPDO $con)
	{
		$modifiedColumns = array();
		$index = 0;

		$this->modifiedColumns[] = EmpleadoPeer::IDEMPLEADO;
		if (null !== $this->idempleado) {
			throw new PropelException('Cannot insert a value for auto-increment primary key (' . EmpleadoPeer::IDEMPLEADO . ')');
		}

		 // check the columns in natural order for more readable SQL queries
		if ($this->isColumnModified(EmpleadoPeer::IDEMPLEADO)) {
			$modifiedColumns[':p' . $index++]  = '`IDEMPLEADO`';
		}
		if ($this->isColumnModified(EmpleadoPeer::NOMBRE)) {
			$modifiedColumns[':p' . $index++]  = '`NOMBRE`';
		}
		if ($this->isColumnModified(EmpleadoPeer::APELLIDO)) {
			$modifiedColumns[':p' . $index++]  = '`APELLIDO`';
		}
		if ($this->isColumnModified(EmpleadoPeer::DNI)) {
			$modifiedColumns[':p' . $index++]  = '`DNI`';
		}
		if ($this->isColumnModified(EmpleadoPeer::DIRECCION)) {
			$modifiedColumns[':p' . $index++]  = '`DIRECCION`';
		}
		if ($this->isColumnModified(EmpleadoPeer::FECHANAC)) {
			$modifiedColumns[':p' . $index++]  = '`FECHANAC`';
		}
		if ($this->isColumnModified(EmpleadoPeer::TELCEL)) {
			$modifiedColumns[':p' . $index++]  = '`TELCEL`';
		}
		if ($this->isColumnModified(EmpleadoPeer::USUARIO)) {
			$modifiedColumns[':p' . $index++]  = '`USUARIO`';
		}
		if ($this->isColumnModified(EmpleadoPeer::PASSWORD)) {
			$modifiedColumns[':p' . $index++]  = '`PASSWORD`';
		}
		if ($this->isColumnModified(EmpleadoPeer::EMAIL)) {
			$modifiedColumns[':p' . $index++]  = '`EMAIL`';
		}

		$sql = sprintf(
			'INSERT INTO `empleado` (%s) VALUES (%s)',
			implode(', ', $modifiedColumns),
			implode(', ', array_keys($modifiedColumns))
		);

		try {
			$stmt = $con->prepare($sql);
			foreach ($modifiedColumns as $identifier => $columnName) {
				switch ($columnName) {
					case '`IDEMPLEADO`':
						$stmt->bindValue($identifier, $this->idempleado, PDO::PARAM_INT);
						break;
					case '`NOMBRE`':
						$stmt->bindValue($identifier, $this->nombre, PDO::PARAM_STR);
						break;
					case '`APELLIDO`':
						$stmt->bindValue($identifier, $this->apellido, PDO::PARAM_STR);
						break;
					case '`DNI`':
						$stmt->bindValue($identifier, $this->dni, PDO::PARAM_STR);
						break;
					case '`DIRECCION`':
						$stmt->bindValue($identifier, $this->direccion, PDO::PARAM_STR);
						break;
					case '`FECHANAC`':
						$stmt->bindValue($identifier, $this->fechanac, PDO::PARAM_STR);
						break;
					case '`TELCEL`':
						$stmt->bindValue($identifier, $this->telcel, PDO::PARAM_STR);
						break;
					case '`USUARIO`':
						$stmt->bindValue($identifier, $this->usuario, PDO::PARAM_STR);
						break;
					case '`PASSWORD`':
						$stmt->bindValue($identifier, $this->password, PDO::PARAM_STR);
						break;
					case '`EMAIL`':
						$stmt->bindValue($identifier, $this->email, PDO::PARAM_STR);
						break;
				}
			}
			$stmt->execute();
		} catch (Exception $e) {
			Propel::log($e->getMessage(), Propel::LOG_ERR);
			throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), $e);
		}

		try {
			$pk = $con->lastInsertId();
		} catch (Exception $e) {
			throw new PropelException('Unable to get autoincrement id.', $e);
		}
		$this->setIdempleado($pk);

		$this->setNew(false);
	}

	/**
	 * Update the row in the database.
	 *
	 * @param      PropelPDO $con
	 *
	 * @see        doSave()
	 */
	protected function doUpdate(PropelPDO $con)
	{
		$selectCriteria = $this->buildPkeyCriteria();
		$valuesCriteria = $this->buildCriteria();
		BasePeer::doUpdate($selectCriteria, $valuesCriteria, $con);
	}

	/**
	 * Array of ValidationFailed objects.
	 * @var        array ValidationFailed[]
	 */
	protected $validationFailures = array();

	/**
	 * Gets any ValidationFailed objects that resulted from last call to validate().
	 *
	 *
	 * @return     array ValidationFailed[]
	 * @see        validate()
	 */
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	/**
	 * Validates the objects modified field values and all objects related to this table.
	 *
	 * If $columns is either a column name or an array of column names
	 * only those columns are validated.
	 *
	 * @param      mixed $columns Column name or an array of column names.
	 * @return     boolean Whether all columns pass validation.
	 * @see        doValidate()
	 * @see        getValidationFailures()
	 */
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	/**
	 * This function performs the validation work for complex object models.
	 *
	 * In addition to checking the current object, all related objects will
	 * also be validated.  If all pass then <code>true</code> is returned; otherwise
	 * an aggreagated array of ValidationFailed objects will be returned.
	 *
	 * @param      array $columns Array of column names to validate.
	 * @return     mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objets otherwise.
	 */
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


			if (($retval = EmpleadoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	/**
	 * Retrieves a field from the object by name passed in as a string.
	 *
	 * @param      string $name name
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     mixed Value of field.
	 */
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = EmpleadoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		$field = $this->getByPosition($pos);
		return $field;
	}

	/**
	 * Retrieves a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @return     mixed Value of field at $pos
	 */
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getIdempleado();
				break;
			case 1:
				return $this->getNombre();
				break;
			case 2:
				return $this->getApellido();
				break;
			case 3:
				return $this->getDni();
				break;
			case 4:
				return $this->getDireccion();
				break;
			case 5:
				return $this->getFechanac();
				break;
			case 6:
				return $this->getTelcel();
				break;
			case 7:
				return $this->getUsuario();
				break;
			case 8:
				return $this->getPassword();
				break;
			case 9:
				return $this->getEmail();
				break;
			default:
				return null;
				break;
		} // switch()
	}

	/**
	 * Exports the object as an array.
	 *
	 * You can specify the key type of the array by passing one of the class
	 * type constants.
	 *
	 * @param     string  $keyType (optional) One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
	 *                    BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
	 *                    Defaults to BasePeer::TYPE_PHPNAME.
	 * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
	 * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
	 *
	 * @return    array an associative array containing the field names (as keys) and field values
	 */
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array())
	{
		if (isset($alreadyDumpedObjects['Empleado'][$this->getPrimaryKey()])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['Empleado'][$this->getPrimaryKey()] = true;
		$keys = EmpleadoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getIdempleado(),
			$keys[1] => $this->getNombre(),
			$keys[2] => $this->getApellido(),
			$keys[3] => $this->getDni(),
			$keys[4] => $this->getDireccion(),
			$keys[5] => $this->getFechanac(),
			$keys[6] => $this->getTelcel(),
			$keys[7] => $this->getUsuario(),
			$keys[8] => $this->getPassword(),
			$keys[9] => $this->getEmail(),
		);
		return $result;
	}

	/**
	 * Sets a field from the object by name passed in as a string.
	 *
	 * @param      string $name peer name
	 * @param      mixed $value field value
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     void
	 */
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = EmpleadoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	/**
	 * Sets a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @param      mixed $value field value
	 * @return     void
	 */
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setIdempleado($value);
				break;
			case 1:
				$this->setNombre($value);
				break;
			case 2:
				$this->setApellido($value);
				break;
			case 3:
				$this->setDni($value);
				break;
			case 4:
				$this->setDireccion($value);
				break;
			case 5:
				$this->setFechanac($value);
				break;
			case 6:
				$this->setTelcel($value);
				break;
			case 7:
				$this->setUsuario($value);
				break;
			case 8:
				$this->setPassword($value);
				break;
			case 9:
				$this->setEmail($value);
				break;
		} // switch()
	}

	/**
	 * Populates the object using an array.
	 *
	 * This is particularly useful when populating an object from one of the
	 * request arrays (e.g. $_POST).  This method goes through the column
	 * names, checking to see whether a matching key exists in populated
	 * array. If so the setByName() method is called for that column.
	 *
	 * You can specify the key type of the array by additionally passing one
	 * of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
	 * BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
	 * The default key type is the column's phpname (e.g. 'AuthorId')
	 *
	 * @param      array  $arr     An array to populate the object from.
	 * @param      string $keyType The type of keys the array uses.
	 * @return     void
	 */
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = EmpleadoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setIdempleado($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNombre($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setApellido($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDni($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDireccion($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFechanac($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setTelcel($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setUsuario($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setPassword($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setEmail($arr[$keys[9]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(EmpleadoPeer::DATABASE_NAME);

		if ($this->isColumnModified(EmpleadoPeer::IDEMPLEADO)) $criteria->add(EmpleadoPeer::IDEMPLEADO, $this->idempleado);
		if ($this->isColumnModified(EmpleadoPeer::NOMBRE)) $criteria->add(EmpleadoPeer::NOMBRE, $this->nombre);
		if ($this->isColumnModified(EmpleadoPeer::APELLIDO)) $criteria->add(EmpleadoPeer::APELLIDO, $this->apellido);
		if ($this->isColumnModified(EmpleadoPeer::DNI)) $criteria->add(EmpleadoPeer::DNI, $this->dni);
		if ($this->isColumnModified(EmpleadoPeer::DIRECCION)) $criteria->add(EmpleadoPeer::DIRECCION, $this->direccion);
		if ($this->isColumnModified(EmpleadoPeer::FECHANAC)) $criteria->add(EmpleadoPeer::FECHANAC, $this->fechanac);
		if ($this->isColumnModified(EmpleadoPeer::TELCEL)) $criteria->add(EmpleadoPeer::TELCEL, $this->telcel);
		if ($this->isColumnModified(EmpleadoPeer::USUARIO)) $criteria->add(EmpleadoPeer::USUARIO, $this->usuario);
		if ($this->isColumnModified(EmpleadoPeer::PASSWORD)) $criteria->add(EmpleadoPeer::PASSWORD, $this->password);
		if ($this->isColumnModified(EmpleadoPeer::EMAIL)) $criteria->add(EmpleadoPeer::EMAIL, $this->email);

		return $criteria;
	}

	/**
	 * Builds a Criteria object containing the primary key for this object.
	 *
	 * Unlike buildCriteria() this method includes the primary key values regardless
	 * of whether or not they have been modified.
	 *
	 * @return     Criteria The Criteria object containing value(s) for primary key(s).
	 */
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(EmpleadoPeer::DATABASE_NAME);
		$criteria->add(EmpleadoPeer::IDEMPLEADO, $this->idempleado);

		return $criteria;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return     int
	 */
	public function getPrimaryKey()
	{
		return $this->getIdempleado();
	}

	/**
	 * Generic method to set the primary key (idempleado column).
	 *
	 * @param      int $key Primary key.
	 * @return     void
	 */
	public function setPrimaryKey($key)
	{
		$this->setIdempleado($key);
	}

	/**
	 * Returns true if the primary key for this object is null.
	 * @return     boolean
	 */
	public function isPrimaryKeyNull()
	{
		return null === $this->getIdempleado();
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of Empleado (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setNombre($this->getNombre());
		$copyObj->setApellido($this->getApellido());
		$copyObj->setDni($this->getDni());
		$copyObj->setDireccion($this->getDireccion());
		$copyObj->setFechanac($this->getFechanac());
		$copyObj->setTelcel($this->getTelcel());
		$copyObj->setUsuario($this->getUsuario());
		$copyObj->setPassword($this->getPassword());
		$copyObj->setEmail($this->getEmail());
		if ($makeNew) {
			$copyObj->setNew(true);
			$copyObj->setIdempleado(NULL); // this is a auto-increment column, so set to default value
		}
	}

	/**
	 * Makes a copy of this object that will be inserted as a new row in table when saved.
	 * It creates a new object filling in the simple attributes, but skipping any primary
	 * keys that are defined for the table.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @return     Empleado Clone of current object.
	 * @throws     PropelException
	 */
	public function copy($deepCopy = false)
	{
		// we use get_class(), because this might be a subclass
		$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	/**
	 * Returns a peer instance associated with this om.
	 *
	 * Since Peer classes are not to have any instance attributes, this method returns the
	 * same instance for all member of this class. The method could therefore
	 * be static, but this would prevent one from overriding the behavior.
	 *
	 * @return     EmpleadoPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new EmpleadoPeer();
		}
		return self::$peer;
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->idempleado = null;
		$this->nombre = null;
		$this->apellido = null;
		$this->dni = null;
		$this->direccion = null;
		$this->fechanac = null;
		$this->telcel = null;
		$this->usuario = null;
		$this->password = null;
		$this->email = null;
		$this->alreadyInSave = false;
		$this->alreadyInValidation = false;
		$this->clearAllReferences();
		$this->resetModified();
		$this->setNew(true);
		$this->setDeleted(false);
	}

	/**
	 * Resets all references to other model objects or collections of model objects.
	 *
	 * This method is a user-space workaround for PHP's inability to garbage collect
	 * objects with circular references (even in PHP 5.3). This is currently necessary
	 * when using Propel in certain daemon or large-volumne/high-memory operations.
	 *
	 * @param      boolean $deep Whether to also clear the references on all referrer objects.
	 */
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
		} // if ($deep)

	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->exportTo(EmpleadoPeer::DEFAULT_STRING_FORMAT);
	}

	/**
	 * Catches calls to virtual methods
	 */
	public function __call($name, $params)
	{
		
		// symfony_behaviors behavior
		if ($callable = sfMixer::getCallable('BaseEmpleado:' . $name))
		{
		  array_unshift($params, $this);
		  return call_user_func_array($callable, $params);
		}

		return parent::__call($name, $params);
	}

} // BaseEmpleado
