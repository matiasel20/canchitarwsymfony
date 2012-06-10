<?php


/**
 * Base class that represents a row from the 'torneo' table.
 *
 * 
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseTorneo extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'TorneoPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        TorneoPeer
	 */
	protected static $peer;

	/**
	 * The flag var to prevent infinit loop in deep copy
	 * @var       boolean
	 */
	protected $startCopy = false;

	/**
	 * The value for the idtorneo field.
	 * @var        int
	 */
	protected $idtorneo;

	/**
	 * The value for the temporada field.
	 * @var        string
	 */
	protected $temporada;

	/**
	 * The value for the torneo field.
	 * @var        string
	 */
	protected $torneo;

	/**
	 * The value for the campeon field.
	 * @var        string
	 */
	protected $campeon;

	/**
	 * The value for the subcampeon field.
	 * @var        string
	 */
	protected $subcampeon;

	/**
	 * @var        array Equipo[] Collection to store aggregation of Equipo objects.
	 */
	protected $collEquipos;

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
	protected $equiposScheduledForDeletion = null;

	/**
	 * Get the [idtorneo] column value.
	 * 
	 * @return     int
	 */
	public function getIdtorneo()
	{
		return $this->idtorneo;
	}

	/**
	 * Get the [optionally formatted] temporal [temporada] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getTemporada($format = 'Y-m-d H:i:s')
	{
		if ($this->temporada === null) {
			return null;
		}


		if ($this->temporada === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->temporada);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->temporada, true), $x);
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
	 * Get the [torneo] column value.
	 * 
	 * @return     string
	 */
	public function getTorneo()
	{
		return $this->torneo;
	}

	/**
	 * Get the [campeon] column value.
	 * 
	 * @return     string
	 */
	public function getCampeon()
	{
		return $this->campeon;
	}

	/**
	 * Get the [subcampeon] column value.
	 * 
	 * @return     string
	 */
	public function getSubcampeon()
	{
		return $this->subcampeon;
	}

	/**
	 * Set the value of [idtorneo] column.
	 * 
	 * @param      int $v new value
	 * @return     Torneo The current object (for fluent API support)
	 */
	public function setIdtorneo($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->idtorneo !== $v) {
			$this->idtorneo = $v;
			$this->modifiedColumns[] = TorneoPeer::IDTORNEO;
		}

		return $this;
	} // setIdtorneo()

	/**
	 * Sets the value of [temporada] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.
	 *               Empty strings are treated as NULL.
	 * @return     Torneo The current object (for fluent API support)
	 */
	public function setTemporada($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');
		if ($this->temporada !== null || $dt !== null) {
			$currentDateAsString = ($this->temporada !== null && $tmpDt = new DateTime($this->temporada)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
			if ($currentDateAsString !== $newDateAsString) {
				$this->temporada = $newDateAsString;
				$this->modifiedColumns[] = TorneoPeer::TEMPORADA;
			}
		} // if either are not null

		return $this;
	} // setTemporada()

	/**
	 * Set the value of [torneo] column.
	 * 
	 * @param      string $v new value
	 * @return     Torneo The current object (for fluent API support)
	 */
	public function setTorneo($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->torneo !== $v) {
			$this->torneo = $v;
			$this->modifiedColumns[] = TorneoPeer::TORNEO;
		}

		return $this;
	} // setTorneo()

	/**
	 * Set the value of [campeon] column.
	 * 
	 * @param      string $v new value
	 * @return     Torneo The current object (for fluent API support)
	 */
	public function setCampeon($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->campeon !== $v) {
			$this->campeon = $v;
			$this->modifiedColumns[] = TorneoPeer::CAMPEON;
		}

		return $this;
	} // setCampeon()

	/**
	 * Set the value of [subcampeon] column.
	 * 
	 * @param      string $v new value
	 * @return     Torneo The current object (for fluent API support)
	 */
	public function setSubcampeon($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->subcampeon !== $v) {
			$this->subcampeon = $v;
			$this->modifiedColumns[] = TorneoPeer::SUBCAMPEON;
		}

		return $this;
	} // setSubcampeon()

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

			$this->idtorneo = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->temporada = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->torneo = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->campeon = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->subcampeon = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 5; // 5 = TorneoPeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating Torneo object", $e);
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
			$con = Propel::getConnection(TorneoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = TorneoPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->collEquipos = null;

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
			$con = Propel::getConnection(TorneoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$deleteQuery = TorneoQuery::create()
				->filterByPrimaryKey($this->getPrimaryKey());
			$ret = $this->preDelete($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseTorneo:delete:pre') as $callable)
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
				foreach (sfMixer::getCallables('BaseTorneo:delete:post') as $callable)
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
			$con = Propel::getConnection(TorneoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		$isInsert = $this->isNew();
		try {
			$ret = $this->preSave($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseTorneo:save:pre') as $callable)
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
				foreach (sfMixer::getCallables('BaseTorneo:save:post') as $callable)
				{
				  call_user_func($callable, $this, $con, $affectedRows);
				}

				TorneoPeer::addInstanceToPool($this);
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

			if ($this->equiposScheduledForDeletion !== null) {
				if (!$this->equiposScheduledForDeletion->isEmpty()) {
					EquipoQuery::create()
						->filterByPrimaryKeys($this->equiposScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->equiposScheduledForDeletion = null;
				}
			}

			if ($this->collEquipos !== null) {
				foreach ($this->collEquipos as $referrerFK) {
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

		$this->modifiedColumns[] = TorneoPeer::IDTORNEO;
		if (null !== $this->idtorneo) {
			throw new PropelException('Cannot insert a value for auto-increment primary key (' . TorneoPeer::IDTORNEO . ')');
		}

		 // check the columns in natural order for more readable SQL queries
		if ($this->isColumnModified(TorneoPeer::IDTORNEO)) {
			$modifiedColumns[':p' . $index++]  = '`IDTORNEO`';
		}
		if ($this->isColumnModified(TorneoPeer::TEMPORADA)) {
			$modifiedColumns[':p' . $index++]  = '`TEMPORADA`';
		}
		if ($this->isColumnModified(TorneoPeer::TORNEO)) {
			$modifiedColumns[':p' . $index++]  = '`TORNEO`';
		}
		if ($this->isColumnModified(TorneoPeer::CAMPEON)) {
			$modifiedColumns[':p' . $index++]  = '`CAMPEON`';
		}
		if ($this->isColumnModified(TorneoPeer::SUBCAMPEON)) {
			$modifiedColumns[':p' . $index++]  = '`SUBCAMPEON`';
		}

		$sql = sprintf(
			'INSERT INTO `torneo` (%s) VALUES (%s)',
			implode(', ', $modifiedColumns),
			implode(', ', array_keys($modifiedColumns))
		);

		try {
			$stmt = $con->prepare($sql);
			foreach ($modifiedColumns as $identifier => $columnName) {
				switch ($columnName) {
					case '`IDTORNEO`':
						$stmt->bindValue($identifier, $this->idtorneo, PDO::PARAM_INT);
						break;
					case '`TEMPORADA`':
						$stmt->bindValue($identifier, $this->temporada, PDO::PARAM_STR);
						break;
					case '`TORNEO`':
						$stmt->bindValue($identifier, $this->torneo, PDO::PARAM_STR);
						break;
					case '`CAMPEON`':
						$stmt->bindValue($identifier, $this->campeon, PDO::PARAM_STR);
						break;
					case '`SUBCAMPEON`':
						$stmt->bindValue($identifier, $this->subcampeon, PDO::PARAM_STR);
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
		$this->setIdtorneo($pk);

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


			if (($retval = TorneoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collEquipos !== null) {
					foreach ($this->collEquipos as $referrerFK) {
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
		$pos = TorneoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getIdtorneo();
				break;
			case 1:
				return $this->getTemporada();
				break;
			case 2:
				return $this->getTorneo();
				break;
			case 3:
				return $this->getCampeon();
				break;
			case 4:
				return $this->getSubcampeon();
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
		if (isset($alreadyDumpedObjects['Torneo'][$this->getPrimaryKey()])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['Torneo'][$this->getPrimaryKey()] = true;
		$keys = TorneoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getIdtorneo(),
			$keys[1] => $this->getTemporada(),
			$keys[2] => $this->getTorneo(),
			$keys[3] => $this->getCampeon(),
			$keys[4] => $this->getSubcampeon(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->collEquipos) {
				$result['Equipos'] = $this->collEquipos->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
		$pos = TorneoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setIdtorneo($value);
				break;
			case 1:
				$this->setTemporada($value);
				break;
			case 2:
				$this->setTorneo($value);
				break;
			case 3:
				$this->setCampeon($value);
				break;
			case 4:
				$this->setSubcampeon($value);
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
		$keys = TorneoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setIdtorneo($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTemporada($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTorneo($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCampeon($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setSubcampeon($arr[$keys[4]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(TorneoPeer::DATABASE_NAME);

		if ($this->isColumnModified(TorneoPeer::IDTORNEO)) $criteria->add(TorneoPeer::IDTORNEO, $this->idtorneo);
		if ($this->isColumnModified(TorneoPeer::TEMPORADA)) $criteria->add(TorneoPeer::TEMPORADA, $this->temporada);
		if ($this->isColumnModified(TorneoPeer::TORNEO)) $criteria->add(TorneoPeer::TORNEO, $this->torneo);
		if ($this->isColumnModified(TorneoPeer::CAMPEON)) $criteria->add(TorneoPeer::CAMPEON, $this->campeon);
		if ($this->isColumnModified(TorneoPeer::SUBCAMPEON)) $criteria->add(TorneoPeer::SUBCAMPEON, $this->subcampeon);

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
		$criteria = new Criteria(TorneoPeer::DATABASE_NAME);
		$criteria->add(TorneoPeer::IDTORNEO, $this->idtorneo);

		return $criteria;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return     int
	 */
	public function getPrimaryKey()
	{
		return $this->getIdtorneo();
	}

	/**
	 * Generic method to set the primary key (idtorneo column).
	 *
	 * @param      int $key Primary key.
	 * @return     void
	 */
	public function setPrimaryKey($key)
	{
		$this->setIdtorneo($key);
	}

	/**
	 * Returns true if the primary key for this object is null.
	 * @return     boolean
	 */
	public function isPrimaryKeyNull()
	{
		return null === $this->getIdtorneo();
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of Torneo (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setTemporada($this->getTemporada());
		$copyObj->setTorneo($this->getTorneo());
		$copyObj->setCampeon($this->getCampeon());
		$copyObj->setSubcampeon($this->getSubcampeon());

		if ($deepCopy && !$this->startCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);
			// store object hash to prevent cycle
			$this->startCopy = true;

			foreach ($this->getEquipos() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addEquipo($relObj->copy($deepCopy));
				}
			}

			//unflag object copy
			$this->startCopy = false;
		} // if ($deepCopy)

		if ($makeNew) {
			$copyObj->setNew(true);
			$copyObj->setIdtorneo(NULL); // this is a auto-increment column, so set to default value
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
	 * @return     Torneo Clone of current object.
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
	 * @return     TorneoPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new TorneoPeer();
		}
		return self::$peer;
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
		if ('Equipo' == $relationName) {
			return $this->initEquipos();
		}
	}

	/**
	 * Clears out the collEquipos collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addEquipos()
	 */
	public function clearEquipos()
	{
		$this->collEquipos = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collEquipos collection.
	 *
	 * By default this just sets the collEquipos collection to an empty array (like clearcollEquipos());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initEquipos($overrideExisting = true)
	{
		if (null !== $this->collEquipos && !$overrideExisting) {
			return;
		}
		$this->collEquipos = new PropelObjectCollection();
		$this->collEquipos->setModel('Equipo');
	}

	/**
	 * Gets an array of Equipo objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Torneo is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Equipo[] List of Equipo objects
	 * @throws     PropelException
	 */
	public function getEquipos($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collEquipos || null !== $criteria) {
			if ($this->isNew() && null === $this->collEquipos) {
				// return empty collection
				$this->initEquipos();
			} else {
				$collEquipos = EquipoQuery::create(null, $criteria)
					->filterByTorneo($this)
					->find($con);
				if (null !== $criteria) {
					return $collEquipos;
				}
				$this->collEquipos = $collEquipos;
			}
		}
		return $this->collEquipos;
	}

	/**
	 * Sets a collection of Equipo objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $equipos A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setEquipos(PropelCollection $equipos, PropelPDO $con = null)
	{
		$this->equiposScheduledForDeletion = $this->getEquipos(new Criteria(), $con)->diff($equipos);

		foreach ($equipos as $equipo) {
			// Fix issue with collection modified by reference
			if ($equipo->isNew()) {
				$equipo->setTorneo($this);
			}
			$this->addEquipo($equipo);
		}

		$this->collEquipos = $equipos;
	}

	/**
	 * Returns the number of related Equipo objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Equipo objects.
	 * @throws     PropelException
	 */
	public function countEquipos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collEquipos || null !== $criteria) {
			if ($this->isNew() && null === $this->collEquipos) {
				return 0;
			} else {
				$query = EquipoQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByTorneo($this)
					->count($con);
			}
		} else {
			return count($this->collEquipos);
		}
	}

	/**
	 * Method called to associate a Equipo object to this object
	 * through the Equipo foreign key attribute.
	 *
	 * @param      Equipo $l Equipo
	 * @return     Torneo The current object (for fluent API support)
	 */
	public function addEquipo(Equipo $l)
	{
		if ($this->collEquipos === null) {
			$this->initEquipos();
		}
		if (!$this->collEquipos->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddEquipo($l);
		}

		return $this;
	}

	/**
	 * @param	Equipo $equipo The equipo object to add.
	 */
	protected function doAddEquipo($equipo)
	{
		$this->collEquipos[]= $equipo;
		$equipo->setTorneo($this);
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->idtorneo = null;
		$this->temporada = null;
		$this->torneo = null;
		$this->campeon = null;
		$this->subcampeon = null;
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
			if ($this->collEquipos) {
				foreach ($this->collEquipos as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		if ($this->collEquipos instanceof PropelCollection) {
			$this->collEquipos->clearIterator();
		}
		$this->collEquipos = null;
	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->exportTo(TorneoPeer::DEFAULT_STRING_FORMAT);
	}

	/**
	 * Catches calls to virtual methods
	 */
	public function __call($name, $params)
	{
		
		// symfony_behaviors behavior
		if ($callable = sfMixer::getCallable('BaseTorneo:' . $name))
		{
		  array_unshift($params, $this);
		  return call_user_func_array($callable, $params);
		}

		return parent::__call($name, $params);
	}

} // BaseTorneo
