<?php


/**
 * Base class that represents a row from the 'producto' table.
 *
 * 
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseProducto extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'ProductoPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        ProductoPeer
	 */
	protected static $peer;

	/**
	 * The flag var to prevent infinit loop in deep copy
	 * @var       boolean
	 */
	protected $startCopy = false;

	/**
	 * The value for the idproducto field.
	 * @var        int
	 */
	protected $idproducto;

	/**
	 * The value for the codigo field.
	 * @var        int
	 */
	protected $codigo;

	/**
	 * The value for the descripcion field.
	 * @var        string
	 */
	protected $descripcion;

	/**
	 * The value for the modelo field.
	 * @var        string
	 */
	protected $modelo;

	/**
	 * The value for the tamanio field.
	 * @var        string
	 */
	protected $tamanio;

	/**
	 * The value for the precio field.
	 * @var        string
	 */
	protected $precio;

	/**
	 * The value for the stock field.
	 * @var        string
	 */
	protected $stock;

	/**
	 * The value for the categoriaid field.
	 * @var        int
	 */
	protected $categoriaid;

	/**
	 * @var        Categoria
	 */
	protected $aCategoria;

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
	protected $comprasScheduledForDeletion = null;

	/**
	 * Get the [idproducto] column value.
	 * 
	 * @return     int
	 */
	public function getIdproducto()
	{
		return $this->idproducto;
	}

	/**
	 * Get the [codigo] column value.
	 * 
	 * @return     int
	 */
	public function getCodigo()
	{
		return $this->codigo;
	}

	/**
	 * Get the [descripcion] column value.
	 * 
	 * @return     string
	 */
	public function getDescripcion()
	{
		return $this->descripcion;
	}

	/**
	 * Get the [modelo] column value.
	 * 
	 * @return     string
	 */
	public function getModelo()
	{
		return $this->modelo;
	}

	/**
	 * Get the [tamanio] column value.
	 * 
	 * @return     string
	 */
	public function getTamanio()
	{
		return $this->tamanio;
	}

	/**
	 * Get the [precio] column value.
	 * 
	 * @return     string
	 */
	public function getPrecio()
	{
		return $this->precio;
	}

	/**
	 * Get the [stock] column value.
	 * 
	 * @return     string
	 */
	public function getStock()
	{
		return $this->stock;
	}

	/**
	 * Get the [categoriaid] column value.
	 * 
	 * @return     int
	 */
	public function getCategoriaid()
	{
		return $this->categoriaid;
	}

	/**
	 * Set the value of [idproducto] column.
	 * 
	 * @param      int $v new value
	 * @return     Producto The current object (for fluent API support)
	 */
	public function setIdproducto($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->idproducto !== $v) {
			$this->idproducto = $v;
			$this->modifiedColumns[] = ProductoPeer::IDPRODUCTO;
		}

		return $this;
	} // setIdproducto()

	/**
	 * Set the value of [codigo] column.
	 * 
	 * @param      int $v new value
	 * @return     Producto The current object (for fluent API support)
	 */
	public function setCodigo($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->codigo !== $v) {
			$this->codigo = $v;
			$this->modifiedColumns[] = ProductoPeer::CODIGO;
		}

		return $this;
	} // setCodigo()

	/**
	 * Set the value of [descripcion] column.
	 * 
	 * @param      string $v new value
	 * @return     Producto The current object (for fluent API support)
	 */
	public function setDescripcion($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->descripcion !== $v) {
			$this->descripcion = $v;
			$this->modifiedColumns[] = ProductoPeer::DESCRIPCION;
		}

		return $this;
	} // setDescripcion()

	/**
	 * Set the value of [modelo] column.
	 * 
	 * @param      string $v new value
	 * @return     Producto The current object (for fluent API support)
	 */
	public function setModelo($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->modelo !== $v) {
			$this->modelo = $v;
			$this->modifiedColumns[] = ProductoPeer::MODELO;
		}

		return $this;
	} // setModelo()

	/**
	 * Set the value of [tamanio] column.
	 * 
	 * @param      string $v new value
	 * @return     Producto The current object (for fluent API support)
	 */
	public function setTamanio($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->tamanio !== $v) {
			$this->tamanio = $v;
			$this->modifiedColumns[] = ProductoPeer::TAMANIO;
		}

		return $this;
	} // setTamanio()

	/**
	 * Set the value of [precio] column.
	 * 
	 * @param      string $v new value
	 * @return     Producto The current object (for fluent API support)
	 */
	public function setPrecio($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->precio !== $v) {
			$this->precio = $v;
			$this->modifiedColumns[] = ProductoPeer::PRECIO;
		}

		return $this;
	} // setPrecio()

	/**
	 * Set the value of [stock] column.
	 * 
	 * @param      string $v new value
	 * @return     Producto The current object (for fluent API support)
	 */
	public function setStock($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->stock !== $v) {
			$this->stock = $v;
			$this->modifiedColumns[] = ProductoPeer::STOCK;
		}

		return $this;
	} // setStock()

	/**
	 * Set the value of [categoriaid] column.
	 * 
	 * @param      int $v new value
	 * @return     Producto The current object (for fluent API support)
	 */
	public function setCategoriaid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->categoriaid !== $v) {
			$this->categoriaid = $v;
			$this->modifiedColumns[] = ProductoPeer::CATEGORIAID;
		}

		if ($this->aCategoria !== null && $this->aCategoria->getIdcategoria() !== $v) {
			$this->aCategoria = null;
		}

		return $this;
	} // setCategoriaid()

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

			$this->idproducto = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->codigo = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->descripcion = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->modelo = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->tamanio = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->precio = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->stock = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->categoriaid = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 8; // 8 = ProductoPeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating Producto object", $e);
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

		if ($this->aCategoria !== null && $this->categoriaid !== $this->aCategoria->getIdcategoria()) {
			$this->aCategoria = null;
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
			$con = Propel::getConnection(ProductoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = ProductoPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aCategoria = null;
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
			$con = Propel::getConnection(ProductoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$deleteQuery = ProductoQuery::create()
				->filterByPrimaryKey($this->getPrimaryKey());
			$ret = $this->preDelete($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseProducto:delete:pre') as $callable)
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
				foreach (sfMixer::getCallables('BaseProducto:delete:post') as $callable)
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
			$con = Propel::getConnection(ProductoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		$isInsert = $this->isNew();
		try {
			$ret = $this->preSave($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseProducto:save:pre') as $callable)
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
				foreach (sfMixer::getCallables('BaseProducto:save:post') as $callable)
				{
				  call_user_func($callable, $this, $con, $affectedRows);
				}

				ProductoPeer::addInstanceToPool($this);
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

			if ($this->aCategoria !== null) {
				if ($this->aCategoria->isModified() || $this->aCategoria->isNew()) {
					$affectedRows += $this->aCategoria->save($con);
				}
				$this->setCategoria($this->aCategoria);
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

		$this->modifiedColumns[] = ProductoPeer::IDPRODUCTO;
		if (null !== $this->idproducto) {
			throw new PropelException('Cannot insert a value for auto-increment primary key (' . ProductoPeer::IDPRODUCTO . ')');
		}

		 // check the columns in natural order for more readable SQL queries
		if ($this->isColumnModified(ProductoPeer::IDPRODUCTO)) {
			$modifiedColumns[':p' . $index++]  = '`IDPRODUCTO`';
		}
		if ($this->isColumnModified(ProductoPeer::CODIGO)) {
			$modifiedColumns[':p' . $index++]  = '`CODIGO`';
		}
		if ($this->isColumnModified(ProductoPeer::DESCRIPCION)) {
			$modifiedColumns[':p' . $index++]  = '`DESCRIPCION`';
		}
		if ($this->isColumnModified(ProductoPeer::MODELO)) {
			$modifiedColumns[':p' . $index++]  = '`MODELO`';
		}
		if ($this->isColumnModified(ProductoPeer::TAMANIO)) {
			$modifiedColumns[':p' . $index++]  = '`TAMANIO`';
		}
		if ($this->isColumnModified(ProductoPeer::PRECIO)) {
			$modifiedColumns[':p' . $index++]  = '`PRECIO`';
		}
		if ($this->isColumnModified(ProductoPeer::STOCK)) {
			$modifiedColumns[':p' . $index++]  = '`STOCK`';
		}
		if ($this->isColumnModified(ProductoPeer::CATEGORIAID)) {
			$modifiedColumns[':p' . $index++]  = '`CATEGORIAID`';
		}

		$sql = sprintf(
			'INSERT INTO `producto` (%s) VALUES (%s)',
			implode(', ', $modifiedColumns),
			implode(', ', array_keys($modifiedColumns))
		);

		try {
			$stmt = $con->prepare($sql);
			foreach ($modifiedColumns as $identifier => $columnName) {
				switch ($columnName) {
					case '`IDPRODUCTO`':						
						$stmt->bindValue($identifier, $this->idproducto, PDO::PARAM_INT);
						break;
					case '`CODIGO`':						
						$stmt->bindValue($identifier, $this->codigo, PDO::PARAM_INT);
						break;
					case '`DESCRIPCION`':						
						$stmt->bindValue($identifier, $this->descripcion, PDO::PARAM_STR);
						break;
					case '`MODELO`':						
						$stmt->bindValue($identifier, $this->modelo, PDO::PARAM_STR);
						break;
					case '`TAMANIO`':						
						$stmt->bindValue($identifier, $this->tamanio, PDO::PARAM_STR);
						break;
					case '`PRECIO`':						
						$stmt->bindValue($identifier, $this->precio, PDO::PARAM_STR);
						break;
					case '`STOCK`':						
						$stmt->bindValue($identifier, $this->stock, PDO::PARAM_STR);
						break;
					case '`CATEGORIAID`':						
						$stmt->bindValue($identifier, $this->categoriaid, PDO::PARAM_INT);
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
		$this->setIdproducto($pk);

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

			if ($this->aCategoria !== null) {
				if (!$this->aCategoria->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCategoria->getValidationFailures());
				}
			}


			if (($retval = ProductoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
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
		$pos = ProductoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getIdproducto();
				break;
			case 1:
				return $this->getCodigo();
				break;
			case 2:
				return $this->getDescripcion();
				break;
			case 3:
				return $this->getModelo();
				break;
			case 4:
				return $this->getTamanio();
				break;
			case 5:
				return $this->getPrecio();
				break;
			case 6:
				return $this->getStock();
				break;
			case 7:
				return $this->getCategoriaid();
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
		if (isset($alreadyDumpedObjects['Producto'][$this->getPrimaryKey()])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['Producto'][$this->getPrimaryKey()] = true;
		$keys = ProductoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getIdproducto(),
			$keys[1] => $this->getCodigo(),
			$keys[2] => $this->getDescripcion(),
			$keys[3] => $this->getModelo(),
			$keys[4] => $this->getTamanio(),
			$keys[5] => $this->getPrecio(),
			$keys[6] => $this->getStock(),
			$keys[7] => $this->getCategoriaid(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aCategoria) {
				$result['Categoria'] = $this->aCategoria->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
		$pos = ProductoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setIdproducto($value);
				break;
			case 1:
				$this->setCodigo($value);
				break;
			case 2:
				$this->setDescripcion($value);
				break;
			case 3:
				$this->setModelo($value);
				break;
			case 4:
				$this->setTamanio($value);
				break;
			case 5:
				$this->setPrecio($value);
				break;
			case 6:
				$this->setStock($value);
				break;
			case 7:
				$this->setCategoriaid($value);
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
		$keys = ProductoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setIdproducto($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodigo($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDescripcion($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setModelo($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTamanio($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setPrecio($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setStock($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCategoriaid($arr[$keys[7]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(ProductoPeer::DATABASE_NAME);

		if ($this->isColumnModified(ProductoPeer::IDPRODUCTO)) $criteria->add(ProductoPeer::IDPRODUCTO, $this->idproducto);
		if ($this->isColumnModified(ProductoPeer::CODIGO)) $criteria->add(ProductoPeer::CODIGO, $this->codigo);
		if ($this->isColumnModified(ProductoPeer::DESCRIPCION)) $criteria->add(ProductoPeer::DESCRIPCION, $this->descripcion);
		if ($this->isColumnModified(ProductoPeer::MODELO)) $criteria->add(ProductoPeer::MODELO, $this->modelo);
		if ($this->isColumnModified(ProductoPeer::TAMANIO)) $criteria->add(ProductoPeer::TAMANIO, $this->tamanio);
		if ($this->isColumnModified(ProductoPeer::PRECIO)) $criteria->add(ProductoPeer::PRECIO, $this->precio);
		if ($this->isColumnModified(ProductoPeer::STOCK)) $criteria->add(ProductoPeer::STOCK, $this->stock);
		if ($this->isColumnModified(ProductoPeer::CATEGORIAID)) $criteria->add(ProductoPeer::CATEGORIAID, $this->categoriaid);

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
		$criteria = new Criteria(ProductoPeer::DATABASE_NAME);
		$criteria->add(ProductoPeer::IDPRODUCTO, $this->idproducto);

		return $criteria;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return     int
	 */
	public function getPrimaryKey()
	{
		return $this->getIdproducto();
	}

	/**
	 * Generic method to set the primary key (idproducto column).
	 *
	 * @param      int $key Primary key.
	 * @return     void
	 */
	public function setPrimaryKey($key)
	{
		$this->setIdproducto($key);
	}

	/**
	 * Returns true if the primary key for this object is null.
	 * @return     boolean
	 */
	public function isPrimaryKeyNull()
	{
		return null === $this->getIdproducto();
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of Producto (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setCodigo($this->getCodigo());
		$copyObj->setDescripcion($this->getDescripcion());
		$copyObj->setModelo($this->getModelo());
		$copyObj->setTamanio($this->getTamanio());
		$copyObj->setPrecio($this->getPrecio());
		$copyObj->setStock($this->getStock());
		$copyObj->setCategoriaid($this->getCategoriaid());

		if ($deepCopy && !$this->startCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);
			// store object hash to prevent cycle
			$this->startCopy = true;

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
			$copyObj->setIdproducto(NULL); // this is a auto-increment column, so set to default value
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
	 * @return     Producto Clone of current object.
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
	 * @return     ProductoPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new ProductoPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Categoria object.
	 *
	 * @param      Categoria $v
	 * @return     Producto The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setCategoria(Categoria $v = null)
	{
		if ($v === null) {
			$this->setCategoriaid(NULL);
		} else {
			$this->setCategoriaid($v->getIdcategoria());
		}

		$this->aCategoria = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Categoria object, it will not be re-added.
		if ($v !== null) {
			$v->addProducto($this);
		}

		return $this;
	}


	/**
	 * Get the associated Categoria object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Categoria The associated Categoria object.
	 * @throws     PropelException
	 */
	public function getCategoria(PropelPDO $con = null)
	{
		if ($this->aCategoria === null && ($this->categoriaid !== null)) {
			$this->aCategoria = CategoriaQuery::create()->findPk($this->categoriaid, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aCategoria->addProductos($this);
			 */
		}
		return $this->aCategoria;
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
		if ('Compra' == $relationName) {
			return $this->initCompras();
		}
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
	 * If this Producto is new, it will return
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
					->filterByProducto($this)
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
				$compra->setProducto($this);
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
					->filterByProducto($this)
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
	 * @return     Producto The current object (for fluent API support)
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
		$compra->setProducto($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Producto is new, it will return
	 * an empty collection; or if this Producto has previously
	 * been saved, it will retrieve related Compras from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Producto.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Compra[] List of Compra objects
	 */
	public function getComprasJoinCliente($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = CompraQuery::create(null, $criteria);
		$query->joinWith('Cliente', $join_behavior);

		return $this->getCompras($query, $con);
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->idproducto = null;
		$this->codigo = null;
		$this->descripcion = null;
		$this->modelo = null;
		$this->tamanio = null;
		$this->precio = null;
		$this->stock = null;
		$this->categoriaid = null;
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
			if ($this->collCompras) {
				foreach ($this->collCompras as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		if ($this->collCompras instanceof PropelCollection) {
			$this->collCompras->clearIterator();
		}
		$this->collCompras = null;
		$this->aCategoria = null;
	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->exportTo(ProductoPeer::DEFAULT_STRING_FORMAT);
	}

	/**
	 * Catches calls to virtual methods
	 */
	public function __call($name, $params)
	{
		
		// symfony_behaviors behavior
		if ($callable = sfMixer::getCallable('BaseProducto:' . $name))
		{
		  array_unshift($params, $this);
		  return call_user_func_array($callable, $params);
		}

		return parent::__call($name, $params);
	}

} // BaseProducto
