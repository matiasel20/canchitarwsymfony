<?php


/**
 * Base class that represents a row from the 'cliente' table.
 *
 * 
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseCliente extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'ClientePeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        ClientePeer
	 */
	protected static $peer;

	/**
	 * The flag var to prevent infinit loop in deep copy
	 * @var       boolean
	 */
	protected $startCopy = false;

	/**
	 * The value for the idcliente field.
	 * @var        int
	 */
	protected $idcliente;

	/**
	 * The value for the user field.
	 * @var        string
	 */
	protected $user;

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
	 * The value for the fechanac field.
	 * @var        string
	 */
	protected $fechanac;

	/**
	 * The value for the direccion field.
	 * @var        string
	 */
	protected $direccion;

	/**
	 * The value for the localidad field.
	 * @var        string
	 */
	protected $localidad;

	/**
	 * The value for the telcel field.
	 * @var        string
	 */
	protected $telcel;

	/**
	 * The value for the email field.
	 * @var        string
	 */
	protected $email;

	/**
	 * The value for the password field.
	 * @var        string
	 */
	protected $password;

	/**
	 * The value for the equipoid field.
	 * @var        int
	 */
	protected $equipoid;

	/**
	 * @var        Equipo
	 */
	protected $aEquipo;

	/**
	 * @var        array Alquiler[] Collection to store aggregation of Alquiler objects.
	 */
	protected $collAlquilers;

	/**
	 * @var        array Compra[] Collection to store aggregation of Compra objects.
	 */
	protected $collCompras;

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
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $alquilersScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $comprasScheduledForDeletion = null;

	/**
	 * Get the [idcliente] column value.
	 * 
	 * @return     int
	 */
	public function getIdcliente()
	{
		return $this->idcliente;
	}

	/**
	 * Get the [user] column value.
	 * 
	 * @return     string
	 */
	public function getUser()
	{
		return $this->user;
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
	 * Get the [direccion] column value.
	 * 
	 * @return     string
	 */
	public function getDireccion()
	{
		return $this->direccion;
	}

	/**
	 * Get the [localidad] column value.
	 * 
	 * @return     string
	 */
	public function getLocalidad()
	{
		return $this->localidad;
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
	 * Get the [email] column value.
	 * 
	 * @return     string
	 */
	public function getEmail()
	{
		return $this->email;
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
	 * Get the [equipoid] column value.
	 * 
	 * @return     int
	 */
	public function getEquipoid()
	{
		return $this->equipoid;
	}

	/**
	 * Set the value of [idcliente] column.
	 * 
	 * @param      int $v new value
	 * @return     Cliente The current object (for fluent API support)
	 */
	public function setIdcliente($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->idcliente !== $v) {
			$this->idcliente = $v;
			$this->modifiedColumns[] = ClientePeer::IDCLIENTE;
		}

		return $this;
	} // setIdcliente()

	/**
	 * Set the value of [user] column.
	 * 
	 * @param      string $v new value
	 * @return     Cliente The current object (for fluent API support)
	 */
	public function setUser($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->user !== $v) {
			$this->user = $v;
			$this->modifiedColumns[] = ClientePeer::USER;
		}

		return $this;
	} // setUser()

	/**
	 * Set the value of [nombre] column.
	 * 
	 * @param      string $v new value
	 * @return     Cliente The current object (for fluent API support)
	 */
	public function setNombre($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->nombre !== $v) {
			$this->nombre = $v;
			$this->modifiedColumns[] = ClientePeer::NOMBRE;
		}

		return $this;
	} // setNombre()

	/**
	 * Set the value of [apellido] column.
	 * 
	 * @param      string $v new value
	 * @return     Cliente The current object (for fluent API support)
	 */
	public function setApellido($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->apellido !== $v) {
			$this->apellido = $v;
			$this->modifiedColumns[] = ClientePeer::APELLIDO;
		}

		return $this;
	} // setApellido()

	/**
	 * Set the value of [dni] column.
	 * 
	 * @param      string $v new value
	 * @return     Cliente The current object (for fluent API support)
	 */
	public function setDni($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->dni !== $v) {
			$this->dni = $v;
			$this->modifiedColumns[] = ClientePeer::DNI;
		}

		return $this;
	} // setDni()

	/**
	 * Sets the value of [fechanac] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.
	 *               Empty strings are treated as NULL.
	 * @return     Cliente The current object (for fluent API support)
	 */
	public function setFechanac($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');
		if ($this->fechanac !== null || $dt !== null) {
			$currentDateAsString = ($this->fechanac !== null && $tmpDt = new DateTime($this->fechanac)) ? $tmpDt->format('Y-m-d') : null;
			$newDateAsString = $dt ? $dt->format('Y-m-d') : null;
			if ($currentDateAsString !== $newDateAsString) {
				$this->fechanac = $newDateAsString;
				$this->modifiedColumns[] = ClientePeer::FECHANAC;
			}
		} // if either are not null

		return $this;
	} // setFechanac()

	/**
	 * Set the value of [direccion] column.
	 * 
	 * @param      string $v new value
	 * @return     Cliente The current object (for fluent API support)
	 */
	public function setDireccion($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->direccion !== $v) {
			$this->direccion = $v;
			$this->modifiedColumns[] = ClientePeer::DIRECCION;
		}

		return $this;
	} // setDireccion()

	/**
	 * Set the value of [localidad] column.
	 * 
	 * @param      string $v new value
	 * @return     Cliente The current object (for fluent API support)
	 */
	public function setLocalidad($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->localidad !== $v) {
			$this->localidad = $v;
			$this->modifiedColumns[] = ClientePeer::LOCALIDAD;
		}

		return $this;
	} // setLocalidad()

	/**
	 * Set the value of [telcel] column.
	 * 
	 * @param      string $v new value
	 * @return     Cliente The current object (for fluent API support)
	 */
	public function setTelcel($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->telcel !== $v) {
			$this->telcel = $v;
			$this->modifiedColumns[] = ClientePeer::TELCEL;
		}

		return $this;
	} // setTelcel()

	/**
	 * Set the value of [email] column.
	 * 
	 * @param      string $v new value
	 * @return     Cliente The current object (for fluent API support)
	 */
	public function setEmail($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->email !== $v) {
			$this->email = $v;
			$this->modifiedColumns[] = ClientePeer::EMAIL;
		}

		return $this;
	} // setEmail()

	/**
	 * Set the value of [password] column.
	 * 
	 * @param      string $v new value
	 * @return     Cliente The current object (for fluent API support)
	 */
	public function setPassword($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->password !== $v) {
			$this->password = $v;
			$this->modifiedColumns[] = ClientePeer::PASSWORD;
		}

		return $this;
	} // setPassword()

	/**
	 * Set the value of [equipoid] column.
	 * 
	 * @param      int $v new value
	 * @return     Cliente The current object (for fluent API support)
	 */
	public function setEquipoid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->equipoid !== $v) {
			$this->equipoid = $v;
			$this->modifiedColumns[] = ClientePeer::EQUIPOID;
		}

		if ($this->aEquipo !== null && $this->aEquipo->getIdequipo() !== $v) {
			$this->aEquipo = null;
		}

		return $this;
	} // setEquipoid()

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

			$this->idcliente = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->user = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->nombre = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->apellido = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->dni = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->fechanac = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->direccion = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->localidad = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->telcel = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
			$this->email = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
			$this->password = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
			$this->equipoid = ($row[$startcol + 11] !== null) ? (int) $row[$startcol + 11] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 12; // 12 = ClientePeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating Cliente object", $e);
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

		if ($this->aEquipo !== null && $this->equipoid !== $this->aEquipo->getIdequipo()) {
			$this->aEquipo = null;
		}
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
			$con = Propel::getConnection(ClientePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = ClientePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aEquipo = null;
			$this->collAlquilers = null;

			$this->collCompras = null;

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
			$con = Propel::getConnection(ClientePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$deleteQuery = ClienteQuery::create()
				->filterByPrimaryKey($this->getPrimaryKey());
			$ret = $this->preDelete($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseCliente:delete:pre') as $callable)
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
				foreach (sfMixer::getCallables('BaseCliente:delete:post') as $callable)
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
			$con = Propel::getConnection(ClientePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		$isInsert = $this->isNew();
		try {
			$ret = $this->preSave($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseCliente:save:pre') as $callable)
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
				foreach (sfMixer::getCallables('BaseCliente:save:post') as $callable)
				{
				  call_user_func($callable, $this, $con, $affectedRows);
				}

				ClientePeer::addInstanceToPool($this);
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

			// We call the save method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.

			if ($this->aEquipo !== null) {
				if ($this->aEquipo->isModified() || $this->aEquipo->isNew()) {
					$affectedRows += $this->aEquipo->save($con);
				}
				$this->setEquipo($this->aEquipo);
			}

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

			if ($this->alquilersScheduledForDeletion !== null) {
				if (!$this->alquilersScheduledForDeletion->isEmpty()) {
					AlquilerQuery::create()
						->filterByPrimaryKeys($this->alquilersScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->alquilersScheduledForDeletion = null;
				}
			}

			if ($this->collAlquilers !== null) {
				foreach ($this->collAlquilers as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->comprasScheduledForDeletion !== null) {
				if (!$this->comprasScheduledForDeletion->isEmpty()) {
					CompraQuery::create()
						->filterByPrimaryKeys($this->comprasScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->comprasScheduledForDeletion = null;
				}
			}

			if ($this->collCompras !== null) {
				foreach ($this->collCompras as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
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

		$this->modifiedColumns[] = ClientePeer::IDCLIENTE;
		if (null !== $this->idcliente) {
			throw new PropelException('Cannot insert a value for auto-increment primary key (' . ClientePeer::IDCLIENTE . ')');
		}

		 // check the columns in natural order for more readable SQL queries
		if ($this->isColumnModified(ClientePeer::IDCLIENTE)) {
			$modifiedColumns[':p' . $index++]  = '`IDCLIENTE`';
		}
		if ($this->isColumnModified(ClientePeer::USER)) {
			$modifiedColumns[':p' . $index++]  = '`USER`';
		}
		if ($this->isColumnModified(ClientePeer::NOMBRE)) {
			$modifiedColumns[':p' . $index++]  = '`NOMBRE`';
		}
		if ($this->isColumnModified(ClientePeer::APELLIDO)) {
			$modifiedColumns[':p' . $index++]  = '`APELLIDO`';
		}
		if ($this->isColumnModified(ClientePeer::DNI)) {
			$modifiedColumns[':p' . $index++]  = '`DNI`';
		}
		if ($this->isColumnModified(ClientePeer::FECHANAC)) {
			$modifiedColumns[':p' . $index++]  = '`FECHANAC`';
		}
		if ($this->isColumnModified(ClientePeer::DIRECCION)) {
			$modifiedColumns[':p' . $index++]  = '`DIRECCION`';
		}
		if ($this->isColumnModified(ClientePeer::LOCALIDAD)) {
			$modifiedColumns[':p' . $index++]  = '`LOCALIDAD`';
		}
		if ($this->isColumnModified(ClientePeer::TELCEL)) {
			$modifiedColumns[':p' . $index++]  = '`TELCEL`';
		}
		if ($this->isColumnModified(ClientePeer::EMAIL)) {
			$modifiedColumns[':p' . $index++]  = '`EMAIL`';
		}
		if ($this->isColumnModified(ClientePeer::PASSWORD)) {
			$modifiedColumns[':p' . $index++]  = '`PASSWORD`';
		}
		if ($this->isColumnModified(ClientePeer::EQUIPOID)) {
			$modifiedColumns[':p' . $index++]  = '`EQUIPOID`';
		}

		$sql = sprintf(
			'INSERT INTO `cliente` (%s) VALUES (%s)',
			implode(', ', $modifiedColumns),
			implode(', ', array_keys($modifiedColumns))
		);

		try {
			$stmt = $con->prepare($sql);
			foreach ($modifiedColumns as $identifier => $columnName) {
				switch ($columnName) {
					case '`IDCLIENTE`':
						$stmt->bindValue($identifier, $this->idcliente, PDO::PARAM_INT);
						break;
					case '`USER`':
						$stmt->bindValue($identifier, $this->user, PDO::PARAM_STR);
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
					case '`FECHANAC`':
						$stmt->bindValue($identifier, $this->fechanac, PDO::PARAM_STR);
						break;
					case '`DIRECCION`':
						$stmt->bindValue($identifier, $this->direccion, PDO::PARAM_STR);
						break;
					case '`LOCALIDAD`':
						$stmt->bindValue($identifier, $this->localidad, PDO::PARAM_STR);
						break;
					case '`TELCEL`':
						$stmt->bindValue($identifier, $this->telcel, PDO::PARAM_STR);
						break;
					case '`EMAIL`':
						$stmt->bindValue($identifier, $this->email, PDO::PARAM_STR);
						break;
					case '`PASSWORD`':
						$stmt->bindValue($identifier, $this->password, PDO::PARAM_STR);
						break;
					case '`EQUIPOID`':
						$stmt->bindValue($identifier, $this->equipoid, PDO::PARAM_INT);
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
		$this->setIdcliente($pk);

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


			// We call the validate method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.

			if ($this->aEquipo !== null) {
				if (!$this->aEquipo->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aEquipo->getValidationFailures());
				}
			}


			if (($retval = ClientePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collAlquilers !== null) {
					foreach ($this->collAlquilers as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCompras !== null) {
					foreach ($this->collCompras as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
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
		$pos = ClientePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getIdcliente();
				break;
			case 1:
				return $this->getUser();
				break;
			case 2:
				return $this->getNombre();
				break;
			case 3:
				return $this->getApellido();
				break;
			case 4:
				return $this->getDni();
				break;
			case 5:
				return $this->getFechanac();
				break;
			case 6:
				return $this->getDireccion();
				break;
			case 7:
				return $this->getLocalidad();
				break;
			case 8:
				return $this->getTelcel();
				break;
			case 9:
				return $this->getEmail();
				break;
			case 10:
				return $this->getPassword();
				break;
			case 11:
				return $this->getEquipoid();
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
	 * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
	 *
	 * @return    array an associative array containing the field names (as keys) and field values
	 */
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
	{
		if (isset($alreadyDumpedObjects['Cliente'][$this->getPrimaryKey()])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['Cliente'][$this->getPrimaryKey()] = true;
		$keys = ClientePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getIdcliente(),
			$keys[1] => $this->getUser(),
			$keys[2] => $this->getNombre(),
			$keys[3] => $this->getApellido(),
			$keys[4] => $this->getDni(),
			$keys[5] => $this->getFechanac(),
			$keys[6] => $this->getDireccion(),
			$keys[7] => $this->getLocalidad(),
			$keys[8] => $this->getTelcel(),
			$keys[9] => $this->getEmail(),
			$keys[10] => $this->getPassword(),
			$keys[11] => $this->getEquipoid(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aEquipo) {
				$result['Equipo'] = $this->aEquipo->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->collAlquilers) {
				$result['Alquilers'] = $this->collAlquilers->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collCompras) {
				$result['Compras'] = $this->collCompras->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
		}
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
		$pos = ClientePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setIdcliente($value);
				break;
			case 1:
				$this->setUser($value);
				break;
			case 2:
				$this->setNombre($value);
				break;
			case 3:
				$this->setApellido($value);
				break;
			case 4:
				$this->setDni($value);
				break;
			case 5:
				$this->setFechanac($value);
				break;
			case 6:
				$this->setDireccion($value);
				break;
			case 7:
				$this->setLocalidad($value);
				break;
			case 8:
				$this->setTelcel($value);
				break;
			case 9:
				$this->setEmail($value);
				break;
			case 10:
				$this->setPassword($value);
				break;
			case 11:
				$this->setEquipoid($value);
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
		$keys = ClientePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setIdcliente($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setUser($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNombre($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setApellido($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDni($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFechanac($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setDireccion($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setLocalidad($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setTelcel($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setEmail($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setPassword($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setEquipoid($arr[$keys[11]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(ClientePeer::DATABASE_NAME);

		if ($this->isColumnModified(ClientePeer::IDCLIENTE)) $criteria->add(ClientePeer::IDCLIENTE, $this->idcliente);
		if ($this->isColumnModified(ClientePeer::USER)) $criteria->add(ClientePeer::USER, $this->user);
		if ($this->isColumnModified(ClientePeer::NOMBRE)) $criteria->add(ClientePeer::NOMBRE, $this->nombre);
		if ($this->isColumnModified(ClientePeer::APELLIDO)) $criteria->add(ClientePeer::APELLIDO, $this->apellido);
		if ($this->isColumnModified(ClientePeer::DNI)) $criteria->add(ClientePeer::DNI, $this->dni);
		if ($this->isColumnModified(ClientePeer::FECHANAC)) $criteria->add(ClientePeer::FECHANAC, $this->fechanac);
		if ($this->isColumnModified(ClientePeer::DIRECCION)) $criteria->add(ClientePeer::DIRECCION, $this->direccion);
		if ($this->isColumnModified(ClientePeer::LOCALIDAD)) $criteria->add(ClientePeer::LOCALIDAD, $this->localidad);
		if ($this->isColumnModified(ClientePeer::TELCEL)) $criteria->add(ClientePeer::TELCEL, $this->telcel);
		if ($this->isColumnModified(ClientePeer::EMAIL)) $criteria->add(ClientePeer::EMAIL, $this->email);
		if ($this->isColumnModified(ClientePeer::PASSWORD)) $criteria->add(ClientePeer::PASSWORD, $this->password);
		if ($this->isColumnModified(ClientePeer::EQUIPOID)) $criteria->add(ClientePeer::EQUIPOID, $this->equipoid);

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
		$criteria = new Criteria(ClientePeer::DATABASE_NAME);
		$criteria->add(ClientePeer::IDCLIENTE, $this->idcliente);

		return $criteria;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return     int
	 */
	public function getPrimaryKey()
	{
		return $this->getIdcliente();
	}

	/**
	 * Generic method to set the primary key (idcliente column).
	 *
	 * @param      int $key Primary key.
	 * @return     void
	 */
	public function setPrimaryKey($key)
	{
		$this->setIdcliente($key);
	}

	/**
	 * Returns true if the primary key for this object is null.
	 * @return     boolean
	 */
	public function isPrimaryKeyNull()
	{
		return null === $this->getIdcliente();
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of Cliente (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setUser($this->getUser());
		$copyObj->setNombre($this->getNombre());
		$copyObj->setApellido($this->getApellido());
		$copyObj->setDni($this->getDni());
		$copyObj->setFechanac($this->getFechanac());
		$copyObj->setDireccion($this->getDireccion());
		$copyObj->setLocalidad($this->getLocalidad());
		$copyObj->setTelcel($this->getTelcel());
		$copyObj->setEmail($this->getEmail());
		$copyObj->setPassword($this->getPassword());
		$copyObj->setEquipoid($this->getEquipoid());

		if ($deepCopy && !$this->startCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);
			// store object hash to prevent cycle
			$this->startCopy = true;

			foreach ($this->getAlquilers() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addAlquiler($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getCompras() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addCompra($relObj->copy($deepCopy));
				}
			}

			//unflag object copy
			$this->startCopy = false;
		} // if ($deepCopy)

		if ($makeNew) {
			$copyObj->setNew(true);
			$copyObj->setIdcliente(NULL); // this is a auto-increment column, so set to default value
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
	 * @return     Cliente Clone of current object.
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
	 * @return     ClientePeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new ClientePeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Equipo object.
	 *
	 * @param      Equipo $v
	 * @return     Cliente The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setEquipo(Equipo $v = null)
	{
		if ($v === null) {
			$this->setEquipoid(NULL);
		} else {
			$this->setEquipoid($v->getIdequipo());
		}

		$this->aEquipo = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Equipo object, it will not be re-added.
		if ($v !== null) {
			$v->addCliente($this);
		}

		return $this;
	}


	/**
	 * Get the associated Equipo object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Equipo The associated Equipo object.
	 * @throws     PropelException
	 */
	public function getEquipo(PropelPDO $con = null)
	{
		if ($this->aEquipo === null && ($this->equipoid !== null)) {
			$this->aEquipo = EquipoQuery::create()->findPk($this->equipoid, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aEquipo->addClientes($this);
			 */
		}
		return $this->aEquipo;
	}


	/**
	 * Initializes a collection based on the name of a relation.
	 * Avoids crafting an 'init[$relationName]s' method name
	 * that wouldn't work when StandardEnglishPluralizer is used.
	 *
	 * @param      string $relationName The name of the relation to initialize
	 * @return     void
	 */
	public function initRelation($relationName)
	{
		if ('Alquiler' == $relationName) {
			return $this->initAlquilers();
		}
		if ('Compra' == $relationName) {
			return $this->initCompras();
		}
	}

	/**
	 * Clears out the collAlquilers collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addAlquilers()
	 */
	public function clearAlquilers()
	{
		$this->collAlquilers = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collAlquilers collection.
	 *
	 * By default this just sets the collAlquilers collection to an empty array (like clearcollAlquilers());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initAlquilers($overrideExisting = true)
	{
		if (null !== $this->collAlquilers && !$overrideExisting) {
			return;
		}
		$this->collAlquilers = new PropelObjectCollection();
		$this->collAlquilers->setModel('Alquiler');
	}

	/**
	 * Gets an array of Alquiler objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Cliente is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Alquiler[] List of Alquiler objects
	 * @throws     PropelException
	 */
	public function getAlquilers($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collAlquilers || null !== $criteria) {
			if ($this->isNew() && null === $this->collAlquilers) {
				// return empty collection
				$this->initAlquilers();
			} else {
				$collAlquilers = AlquilerQuery::create(null, $criteria)
					->filterByCliente($this)
					->find($con);
				if (null !== $criteria) {
					return $collAlquilers;
				}
				$this->collAlquilers = $collAlquilers;
			}
		}
		return $this->collAlquilers;
	}

	/**
	 * Sets a collection of Alquiler objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $alquilers A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setAlquilers(PropelCollection $alquilers, PropelPDO $con = null)
	{
		$this->alquilersScheduledForDeletion = $this->getAlquilers(new Criteria(), $con)->diff($alquilers);

		foreach ($alquilers as $alquiler) {
			// Fix issue with collection modified by reference
			if ($alquiler->isNew()) {
				$alquiler->setCliente($this);
			}
			$this->addAlquiler($alquiler);
		}

		$this->collAlquilers = $alquilers;
	}

	/**
	 * Returns the number of related Alquiler objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Alquiler objects.
	 * @throws     PropelException
	 */
	public function countAlquilers(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collAlquilers || null !== $criteria) {
			if ($this->isNew() && null === $this->collAlquilers) {
				return 0;
			} else {
				$query = AlquilerQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByCliente($this)
					->count($con);
			}
		} else {
			return count($this->collAlquilers);
		}
	}

	/**
	 * Method called to associate a Alquiler object to this object
	 * through the Alquiler foreign key attribute.
	 *
	 * @param      Alquiler $l Alquiler
	 * @return     Cliente The current object (for fluent API support)
	 */
	public function addAlquiler(Alquiler $l)
	{
		if ($this->collAlquilers === null) {
			$this->initAlquilers();
		}
		if (!$this->collAlquilers->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddAlquiler($l);
		}

		return $this;
	}

	/**
	 * @param	Alquiler $alquiler The alquiler object to add.
	 */
	protected function doAddAlquiler($alquiler)
	{
		$this->collAlquilers[]= $alquiler;
		$alquiler->setCliente($this);
	}

	/**
	 * Clears out the collCompras collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addCompras()
	 */
	public function clearCompras()
	{
		$this->collCompras = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collCompras collection.
	 *
	 * By default this just sets the collCompras collection to an empty array (like clearcollCompras());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initCompras($overrideExisting = true)
	{
		if (null !== $this->collCompras && !$overrideExisting) {
			return;
		}
		$this->collCompras = new PropelObjectCollection();
		$this->collCompras->setModel('Compra');
	}

	/**
	 * Gets an array of Compra objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Cliente is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Compra[] List of Compra objects
	 * @throws     PropelException
	 */
	public function getCompras($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collCompras || null !== $criteria) {
			if ($this->isNew() && null === $this->collCompras) {
				// return empty collection
				$this->initCompras();
			} else {
				$collCompras = CompraQuery::create(null, $criteria)
					->filterByCliente($this)
					->find($con);
				if (null !== $criteria) {
					return $collCompras;
				}
				$this->collCompras = $collCompras;
			}
		}
		return $this->collCompras;
	}

	/**
	 * Sets a collection of Compra objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $compras A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setCompras(PropelCollection $compras, PropelPDO $con = null)
	{
		$this->comprasScheduledForDeletion = $this->getCompras(new Criteria(), $con)->diff($compras);

		foreach ($compras as $compra) {
			// Fix issue with collection modified by reference
			if ($compra->isNew()) {
				$compra->setCliente($this);
			}
			$this->addCompra($compra);
		}

		$this->collCompras = $compras;
	}

	/**
	 * Returns the number of related Compra objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Compra objects.
	 * @throws     PropelException
	 */
	public function countCompras(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collCompras || null !== $criteria) {
			if ($this->isNew() && null === $this->collCompras) {
				return 0;
			} else {
				$query = CompraQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByCliente($this)
					->count($con);
			}
		} else {
			return count($this->collCompras);
		}
	}

	/**
	 * Method called to associate a Compra object to this object
	 * through the Compra foreign key attribute.
	 *
	 * @param      Compra $l Compra
	 * @return     Cliente The current object (for fluent API support)
	 */
	public function addCompra(Compra $l)
	{
		if ($this->collCompras === null) {
			$this->initCompras();
		}
		if (!$this->collCompras->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddCompra($l);
		}

		return $this;
	}

	/**
	 * @param	Compra $compra The compra object to add.
	 */
	protected function doAddCompra($compra)
	{
		$this->collCompras[]= $compra;
		$compra->setCliente($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Cliente is new, it will return
	 * an empty collection; or if this Cliente has previously
	 * been saved, it will retrieve related Compras from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Cliente.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Compra[] List of Compra objects
	 */
	public function getComprasJoinProducto($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = CompraQuery::create(null, $criteria);
		$query->joinWith('Producto', $join_behavior);

		return $this->getCompras($query, $con);
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->idcliente = null;
		$this->user = null;
		$this->nombre = null;
		$this->apellido = null;
		$this->dni = null;
		$this->fechanac = null;
		$this->direccion = null;
		$this->localidad = null;
		$this->telcel = null;
		$this->email = null;
		$this->password = null;
		$this->equipoid = null;
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
			if ($this->collAlquilers) {
				foreach ($this->collAlquilers as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collCompras) {
				foreach ($this->collCompras as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		if ($this->collAlquilers instanceof PropelCollection) {
			$this->collAlquilers->clearIterator();
		}
		$this->collAlquilers = null;
		if ($this->collCompras instanceof PropelCollection) {
			$this->collCompras->clearIterator();
		}
		$this->collCompras = null;
		$this->aEquipo = null;
	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->exportTo(ClientePeer::DEFAULT_STRING_FORMAT);
	}

	/**
	 * Catches calls to virtual methods
	 */
	public function __call($name, $params)
	{
		
		// symfony_behaviors behavior
		if ($callable = sfMixer::getCallable('BaseCliente:' . $name))
		{
		  array_unshift($params, $this);
		  return call_user_func_array($callable, $params);
		}

		return parent::__call($name, $params);
	}

} // BaseCliente
