<?php


/**
 * Base class that represents a row from the 'alquiler' table.
 *
 * 
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseAlquiler extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'AlquilerPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        AlquilerPeer
	 */
	protected static $peer;

	/**
	 * The flag var to prevent infinit loop in deep copy
	 * @var       boolean
	 */
	protected $startCopy = false;

	/**
	 * The value for the idalquiler field.
	 * @var        int
	 */
	protected $idalquiler;

	/**
	 * The value for the cancha field.
	 * @var        int
	 */
	protected $cancha;

	/**
	 * The value for the fecha field.
	 * Note: this column has a database default value of: (expression) CURRENT_TIMESTAMP
	 * @var        string
	 */
	protected $fecha;

	/**
	 * The value for the indumentaria field.
	 * Note: this column has a database default value of: false
	 * @var        boolean
	 */
	protected $indumentaria;

	/**
	 * The value for the duchas field.
	 * Note: this column has a database default value of: false
	 * @var        boolean
	 */
	protected $duchas;

	/**
	 * The value for the confiteria field.
	 * Note: this column has a database default value of: false
	 * @var        boolean
	 */
	protected $confiteria;

	/**
	 * The value for the clienteid field.
	 * @var        int
	 */
	protected $clienteid;

	/**
	 * @var        Cliente
	 */
	protected $aCliente;

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
	 * Applies default values to this object.
	 * This method should be called from the object's constructor (or
	 * equivalent initialization method).
	 * @see        __construct()
	 */
	public function applyDefaultValues()
	{
		$this->indumentaria = false;
		$this->duchas = false;
		$this->confiteria = false;
	}

	/**
	 * Initializes internal state of BaseAlquiler object.
	 * @see        applyDefaults()
	 */
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
	}

	/**
	 * Get the [idalquiler] column value.
	 * 
	 * @return     int
	 */
	public function getIdalquiler()
	{
		return $this->idalquiler;
	}

	/**
	 * Get the [cancha] column value.
	 * 
	 * @return     int
	 */
	public function getCancha()
	{
		return $this->cancha;
	}

	/**
	 * Get the [optionally formatted] temporal [fecha] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getFecha($format = 'Y-m-d H:i:s')
	{
		if ($this->fecha === null) {
			return null;
		}


		if ($this->fecha === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->fecha);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->fecha, true), $x);
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
	 * Get the [indumentaria] column value.
	 * 
	 * @return     boolean
	 */
	public function getIndumentaria()
	{
		return $this->indumentaria;
	}

	/**
	 * Get the [duchas] column value.
	 * 
	 * @return     boolean
	 */
	public function getDuchas()
	{
		return $this->duchas;
	}

	/**
	 * Get the [confiteria] column value.
	 * 
	 * @return     boolean
	 */
	public function getConfiteria()
	{
		return $this->confiteria;
	}

	/**
	 * Get the [clienteid] column value.
	 * 
	 * @return     int
	 */
	public function getClienteid()
	{
		return $this->clienteid;
	}

	/**
	 * Set the value of [idalquiler] column.
	 * 
	 * @param      int $v new value
	 * @return     Alquiler The current object (for fluent API support)
	 */
	public function setIdalquiler($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->idalquiler !== $v) {
			$this->idalquiler = $v;
			$this->modifiedColumns[] = AlquilerPeer::IDALQUILER;
		}

		return $this;
	} // setIdalquiler()

	/**
	 * Set the value of [cancha] column.
	 * 
	 * @param      int $v new value
	 * @return     Alquiler The current object (for fluent API support)
	 */
	public function setCancha($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->cancha !== $v) {
			$this->cancha = $v;
			$this->modifiedColumns[] = AlquilerPeer::CANCHA;
		}

		return $this;
	} // setCancha()

	/**
	 * Sets the value of [fecha] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.
	 *               Empty strings are treated as NULL.
	 * @return     Alquiler The current object (for fluent API support)
	 */
	public function setFecha($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');
		if ($this->fecha !== null || $dt !== null) {
			$currentDateAsString = ($this->fecha !== null && $tmpDt = new DateTime($this->fecha)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
			if ($currentDateAsString !== $newDateAsString) {
				$this->fecha = $newDateAsString;
				$this->modifiedColumns[] = AlquilerPeer::FECHA;
			}
		} // if either are not null

		return $this;
	} // setFecha()

	/**
	 * Sets the value of the [indumentaria] column.
	 * Non-boolean arguments are converted using the following rules:
	 *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * 
	 * @param      boolean|integer|string $v The new value
	 * @return     Alquiler The current object (for fluent API support)
	 */
	public function setIndumentaria($v)
	{
		if ($v !== null) {
			if (is_string($v)) {
				$v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
			} else {
				$v = (boolean) $v;
			}
		}

		if ($this->indumentaria !== $v) {
			$this->indumentaria = $v;
			$this->modifiedColumns[] = AlquilerPeer::INDUMENTARIA;
		}

		return $this;
	} // setIndumentaria()

	/**
	 * Sets the value of the [duchas] column.
	 * Non-boolean arguments are converted using the following rules:
	 *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * 
	 * @param      boolean|integer|string $v The new value
	 * @return     Alquiler The current object (for fluent API support)
	 */
	public function setDuchas($v)
	{
		if ($v !== null) {
			if (is_string($v)) {
				$v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
			} else {
				$v = (boolean) $v;
			}
		}

		if ($this->duchas !== $v) {
			$this->duchas = $v;
			$this->modifiedColumns[] = AlquilerPeer::DUCHAS;
		}

		return $this;
	} // setDuchas()

	/**
	 * Sets the value of the [confiteria] column.
	 * Non-boolean arguments are converted using the following rules:
	 *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * 
	 * @param      boolean|integer|string $v The new value
	 * @return     Alquiler The current object (for fluent API support)
	 */
	public function setConfiteria($v)
	{
		if ($v !== null) {
			if (is_string($v)) {
				$v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
			} else {
				$v = (boolean) $v;
			}
		}

		if ($this->confiteria !== $v) {
			$this->confiteria = $v;
			$this->modifiedColumns[] = AlquilerPeer::CONFITERIA;
		}

		return $this;
	} // setConfiteria()

	/**
	 * Set the value of [clienteid] column.
	 * 
	 * @param      int $v new value
	 * @return     Alquiler The current object (for fluent API support)
	 */
	public function setClienteid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->clienteid !== $v) {
			$this->clienteid = $v;
			$this->modifiedColumns[] = AlquilerPeer::CLIENTEID;
		}

		if ($this->aCliente !== null && $this->aCliente->getIdcliente() !== $v) {
			$this->aCliente = null;
		}

		return $this;
	} // setClienteid()

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
			if ($this->indumentaria !== false) {
				return false;
			}

			if ($this->duchas !== false) {
				return false;
			}

			if ($this->confiteria !== false) {
				return false;
			}

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

			$this->idalquiler = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->cancha = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->fecha = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->indumentaria = ($row[$startcol + 3] !== null) ? (boolean) $row[$startcol + 3] : null;
			$this->duchas = ($row[$startcol + 4] !== null) ? (boolean) $row[$startcol + 4] : null;
			$this->confiteria = ($row[$startcol + 5] !== null) ? (boolean) $row[$startcol + 5] : null;
			$this->clienteid = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 7; // 7 = AlquilerPeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating Alquiler object", $e);
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

		if ($this->aCliente !== null && $this->clienteid !== $this->aCliente->getIdcliente()) {
			$this->aCliente = null;
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
			$con = Propel::getConnection(AlquilerPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = AlquilerPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aCliente = null;
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
			$con = Propel::getConnection(AlquilerPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$deleteQuery = AlquilerQuery::create()
				->filterByPrimaryKey($this->getPrimaryKey());
			$ret = $this->preDelete($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseAlquiler:delete:pre') as $callable)
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
				foreach (sfMixer::getCallables('BaseAlquiler:delete:post') as $callable)
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
			$con = Propel::getConnection(AlquilerPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		$isInsert = $this->isNew();
		try {
			$ret = $this->preSave($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseAlquiler:save:pre') as $callable)
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
				foreach (sfMixer::getCallables('BaseAlquiler:save:post') as $callable)
				{
				  call_user_func($callable, $this, $con, $affectedRows);
				}

				AlquilerPeer::addInstanceToPool($this);
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

			if ($this->aCliente !== null) {
				if ($this->aCliente->isModified() || $this->aCliente->isNew()) {
					$affectedRows += $this->aCliente->save($con);
				}
				$this->setCliente($this->aCliente);
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

		$this->modifiedColumns[] = AlquilerPeer::IDALQUILER;
		if (null !== $this->idalquiler) {
			throw new PropelException('Cannot insert a value for auto-increment primary key (' . AlquilerPeer::IDALQUILER . ')');
		}

		 // check the columns in natural order for more readable SQL queries
		if ($this->isColumnModified(AlquilerPeer::IDALQUILER)) {
			$modifiedColumns[':p' . $index++]  = '`IDALQUILER`';
		}
		if ($this->isColumnModified(AlquilerPeer::CANCHA)) {
			$modifiedColumns[':p' . $index++]  = '`CANCHA`';
		}
		if ($this->isColumnModified(AlquilerPeer::FECHA)) {
			$modifiedColumns[':p' . $index++]  = '`FECHA`';
		}
		if ($this->isColumnModified(AlquilerPeer::INDUMENTARIA)) {
			$modifiedColumns[':p' . $index++]  = '`INDUMENTARIA`';
		}
		if ($this->isColumnModified(AlquilerPeer::DUCHAS)) {
			$modifiedColumns[':p' . $index++]  = '`DUCHAS`';
		}
		if ($this->isColumnModified(AlquilerPeer::CONFITERIA)) {
			$modifiedColumns[':p' . $index++]  = '`CONFITERIA`';
		}
		if ($this->isColumnModified(AlquilerPeer::CLIENTEID)) {
			$modifiedColumns[':p' . $index++]  = '`CLIENTEID`';
		}

		$sql = sprintf(
			'INSERT INTO `alquiler` (%s) VALUES (%s)',
			implode(', ', $modifiedColumns),
			implode(', ', array_keys($modifiedColumns))
		);

		try {
			$stmt = $con->prepare($sql);
			foreach ($modifiedColumns as $identifier => $columnName) {
				switch ($columnName) {
					case '`IDALQUILER`':
						$stmt->bindValue($identifier, $this->idalquiler, PDO::PARAM_INT);
						break;
					case '`CANCHA`':
						$stmt->bindValue($identifier, $this->cancha, PDO::PARAM_INT);
						break;
					case '`FECHA`':
						$stmt->bindValue($identifier, $this->fecha, PDO::PARAM_STR);
						break;
					case '`INDUMENTARIA`':
						$stmt->bindValue($identifier, (int) $this->indumentaria, PDO::PARAM_INT);
						break;
					case '`DUCHAS`':
						$stmt->bindValue($identifier, (int) $this->duchas, PDO::PARAM_INT);
						break;
					case '`CONFITERIA`':
						$stmt->bindValue($identifier, (int) $this->confiteria, PDO::PARAM_INT);
						break;
					case '`CLIENTEID`':
						$stmt->bindValue($identifier, $this->clienteid, PDO::PARAM_INT);
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
		$this->setIdalquiler($pk);

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

			if ($this->aCliente !== null) {
				if (!$this->aCliente->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCliente->getValidationFailures());
				}
			}


			if (($retval = AlquilerPeer::doValidate($this, $columns)) !== true) {
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
		$pos = AlquilerPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getIdalquiler();
				break;
			case 1:
				return $this->getCancha();
				break;
			case 2:
				return $this->getFecha();
				break;
			case 3:
				return $this->getIndumentaria();
				break;
			case 4:
				return $this->getDuchas();
				break;
			case 5:
				return $this->getConfiteria();
				break;
			case 6:
				return $this->getClienteid();
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
		if (isset($alreadyDumpedObjects['Alquiler'][$this->getPrimaryKey()])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['Alquiler'][$this->getPrimaryKey()] = true;
		$keys = AlquilerPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getIdalquiler(),
			$keys[1] => $this->getCancha(),
			$keys[2] => $this->getFecha(),
			$keys[3] => $this->getIndumentaria(),
			$keys[4] => $this->getDuchas(),
			$keys[5] => $this->getConfiteria(),
			$keys[6] => $this->getClienteid(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aCliente) {
				$result['Cliente'] = $this->aCliente->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
		$pos = AlquilerPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setIdalquiler($value);
				break;
			case 1:
				$this->setCancha($value);
				break;
			case 2:
				$this->setFecha($value);
				break;
			case 3:
				$this->setIndumentaria($value);
				break;
			case 4:
				$this->setDuchas($value);
				break;
			case 5:
				$this->setConfiteria($value);
				break;
			case 6:
				$this->setClienteid($value);
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
		$keys = AlquilerPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setIdalquiler($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCancha($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFecha($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setIndumentaria($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDuchas($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setConfiteria($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setClienteid($arr[$keys[6]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(AlquilerPeer::DATABASE_NAME);

		if ($this->isColumnModified(AlquilerPeer::IDALQUILER)) $criteria->add(AlquilerPeer::IDALQUILER, $this->idalquiler);
		if ($this->isColumnModified(AlquilerPeer::CANCHA)) $criteria->add(AlquilerPeer::CANCHA, $this->cancha);
		if ($this->isColumnModified(AlquilerPeer::FECHA)) $criteria->add(AlquilerPeer::FECHA, $this->fecha);
		if ($this->isColumnModified(AlquilerPeer::INDUMENTARIA)) $criteria->add(AlquilerPeer::INDUMENTARIA, $this->indumentaria);
		if ($this->isColumnModified(AlquilerPeer::DUCHAS)) $criteria->add(AlquilerPeer::DUCHAS, $this->duchas);
		if ($this->isColumnModified(AlquilerPeer::CONFITERIA)) $criteria->add(AlquilerPeer::CONFITERIA, $this->confiteria);
		if ($this->isColumnModified(AlquilerPeer::CLIENTEID)) $criteria->add(AlquilerPeer::CLIENTEID, $this->clienteid);

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
		$criteria = new Criteria(AlquilerPeer::DATABASE_NAME);
		$criteria->add(AlquilerPeer::IDALQUILER, $this->idalquiler);

		return $criteria;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return     int
	 */
	public function getPrimaryKey()
	{
		return $this->getIdalquiler();
	}

	/**
	 * Generic method to set the primary key (idalquiler column).
	 *
	 * @param      int $key Primary key.
	 * @return     void
	 */
	public function setPrimaryKey($key)
	{
		$this->setIdalquiler($key);
	}

	/**
	 * Returns true if the primary key for this object is null.
	 * @return     boolean
	 */
	public function isPrimaryKeyNull()
	{
		return null === $this->getIdalquiler();
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of Alquiler (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setCancha($this->getCancha());
		$copyObj->setFecha($this->getFecha());
		$copyObj->setIndumentaria($this->getIndumentaria());
		$copyObj->setDuchas($this->getDuchas());
		$copyObj->setConfiteria($this->getConfiteria());
		$copyObj->setClienteid($this->getClienteid());

		if ($deepCopy && !$this->startCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);
			// store object hash to prevent cycle
			$this->startCopy = true;

			//unflag object copy
			$this->startCopy = false;
		} // if ($deepCopy)

		if ($makeNew) {
			$copyObj->setNew(true);
			$copyObj->setIdalquiler(NULL); // this is a auto-increment column, so set to default value
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
	 * @return     Alquiler Clone of current object.
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
	 * @return     AlquilerPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new AlquilerPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Cliente object.
	 *
	 * @param      Cliente $v
	 * @return     Alquiler The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setCliente(Cliente $v = null)
	{
		if ($v === null) {
			$this->setClienteid(NULL);
		} else {
			$this->setClienteid($v->getIdcliente());
		}

		$this->aCliente = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Cliente object, it will not be re-added.
		if ($v !== null) {
			$v->addAlquiler($this);
		}

		return $this;
	}


	/**
	 * Get the associated Cliente object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Cliente The associated Cliente object.
	 * @throws     PropelException
	 */
	public function getCliente(PropelPDO $con = null)
	{
		if ($this->aCliente === null && ($this->clienteid !== null)) {
			$this->aCliente = ClienteQuery::create()->findPk($this->clienteid, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aCliente->addAlquilers($this);
			 */
		}
		return $this->aCliente;
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->idalquiler = null;
		$this->cancha = null;
		$this->fecha = null;
		$this->indumentaria = null;
		$this->duchas = null;
		$this->confiteria = null;
		$this->clienteid = null;
		$this->alreadyInSave = false;
		$this->alreadyInValidation = false;
		$this->clearAllReferences();
		$this->applyDefaultValues();
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

		$this->aCliente = null;
	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->exportTo(AlquilerPeer::DEFAULT_STRING_FORMAT);
	}

	/**
	 * Catches calls to virtual methods
	 */
	public function __call($name, $params)
	{
		
		// symfony_behaviors behavior
		if ($callable = sfMixer::getCallable('BaseAlquiler:' . $name))
		{
		  array_unshift($params, $this);
		  return call_user_func_array($callable, $params);
		}

		return parent::__call($name, $params);
	}

} // BaseAlquiler
