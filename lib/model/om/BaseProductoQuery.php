<?php


/**
 * Base class that represents a query for the 'producto' table.
 *
 * 
 *
 * @method     ProductoQuery orderByIdproducto($order = Criteria::ASC) Order by the idproducto column
 * @method     ProductoQuery orderByCodigo($order = Criteria::ASC) Order by the codigo column
 * @method     ProductoQuery orderByDescripcion($order = Criteria::ASC) Order by the descripcion column
 * @method     ProductoQuery orderByModelo($order = Criteria::ASC) Order by the modelo column
 * @method     ProductoQuery orderByTamanio($order = Criteria::ASC) Order by the tamanio column
 * @method     ProductoQuery orderByPrecio($order = Criteria::ASC) Order by the precio column
 * @method     ProductoQuery orderByStock($order = Criteria::ASC) Order by the stock column
 * @method     ProductoQuery orderByCategoriaid($order = Criteria::ASC) Order by the categoriaid column
 *
 * @method     ProductoQuery groupByIdproducto() Group by the idproducto column
 * @method     ProductoQuery groupByCodigo() Group by the codigo column
 * @method     ProductoQuery groupByDescripcion() Group by the descripcion column
 * @method     ProductoQuery groupByModelo() Group by the modelo column
 * @method     ProductoQuery groupByTamanio() Group by the tamanio column
 * @method     ProductoQuery groupByPrecio() Group by the precio column
 * @method     ProductoQuery groupByStock() Group by the stock column
 * @method     ProductoQuery groupByCategoriaid() Group by the categoriaid column
 *
 * @method     ProductoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ProductoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ProductoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ProductoQuery leftJoinCategoria($relationAlias = null) Adds a LEFT JOIN clause to the query using the Categoria relation
 * @method     ProductoQuery rightJoinCategoria($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Categoria relation
 * @method     ProductoQuery innerJoinCategoria($relationAlias = null) Adds a INNER JOIN clause to the query using the Categoria relation
 *
 * @method     ProductoQuery leftJoinCompra($relationAlias = null) Adds a LEFT JOIN clause to the query using the Compra relation
 * @method     ProductoQuery rightJoinCompra($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Compra relation
 * @method     ProductoQuery innerJoinCompra($relationAlias = null) Adds a INNER JOIN clause to the query using the Compra relation
 *
 * @method     Producto findOne(PropelPDO $con = null) Return the first Producto matching the query
 * @method     Producto findOneOrCreate(PropelPDO $con = null) Return the first Producto matching the query, or a new Producto object populated from the query conditions when no match is found
 *
 * @method     Producto findOneByIdproducto(int $idproducto) Return the first Producto filtered by the idproducto column
 * @method     Producto findOneByCodigo(int $codigo) Return the first Producto filtered by the codigo column
 * @method     Producto findOneByDescripcion(string $descripcion) Return the first Producto filtered by the descripcion column
 * @method     Producto findOneByModelo(string $modelo) Return the first Producto filtered by the modelo column
 * @method     Producto findOneByTamanio(string $tamanio) Return the first Producto filtered by the tamanio column
 * @method     Producto findOneByPrecio(string $precio) Return the first Producto filtered by the precio column
 * @method     Producto findOneByStock(string $stock) Return the first Producto filtered by the stock column
 * @method     Producto findOneByCategoriaid(int $categoriaid) Return the first Producto filtered by the categoriaid column
 *
 * @method     array findByIdproducto(int $idproducto) Return Producto objects filtered by the idproducto column
 * @method     array findByCodigo(int $codigo) Return Producto objects filtered by the codigo column
 * @method     array findByDescripcion(string $descripcion) Return Producto objects filtered by the descripcion column
 * @method     array findByModelo(string $modelo) Return Producto objects filtered by the modelo column
 * @method     array findByTamanio(string $tamanio) Return Producto objects filtered by the tamanio column
 * @method     array findByPrecio(string $precio) Return Producto objects filtered by the precio column
 * @method     array findByStock(string $stock) Return Producto objects filtered by the stock column
 * @method     array findByCategoriaid(int $categoriaid) Return Producto objects filtered by the categoriaid column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseProductoQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseProductoQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'Producto', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ProductoQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    ProductoQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof ProductoQuery) {
			return $criteria;
		}
		$query = new ProductoQuery();
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
	 * @return    Producto|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = ProductoPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(ProductoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Producto A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `IDPRODUCTO`, `CODIGO`, `DESCRIPCION`, `MODELO`, `TAMANIO`, `PRECIO`, `STOCK`, `CATEGORIAID` FROM `producto` WHERE `IDPRODUCTO` = :p0';
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
			$obj = new Producto();
			$obj->hydrate($row);
			ProductoPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    Producto|array|mixed the result, formatted by the current formatter
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
	 * @return    ProductoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(ProductoPeer::IDPRODUCTO, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    ProductoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(ProductoPeer::IDPRODUCTO, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the idproducto column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByIdproducto(1234); // WHERE idproducto = 1234
	 * $query->filterByIdproducto(array(12, 34)); // WHERE idproducto IN (12, 34)
	 * $query->filterByIdproducto(array('min' => 12)); // WHERE idproducto > 12
	 * </code>
	 *
	 * @param     mixed $idproducto The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProductoQuery The current query, for fluid interface
	 */
	public function filterByIdproducto($idproducto = null, $comparison = null)
	{
		if (is_array($idproducto) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(ProductoPeer::IDPRODUCTO, $idproducto, $comparison);
	}

	/**
	 * Filter the query on the codigo column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCodigo(1234); // WHERE codigo = 1234
	 * $query->filterByCodigo(array(12, 34)); // WHERE codigo IN (12, 34)
	 * $query->filterByCodigo(array('min' => 12)); // WHERE codigo > 12
	 * </code>
	 *
	 * @param     mixed $codigo The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProductoQuery The current query, for fluid interface
	 */
	public function filterByCodigo($codigo = null, $comparison = null)
	{
		if (is_array($codigo)) {
			$useMinMax = false;
			if (isset($codigo['min'])) {
				$this->addUsingAlias(ProductoPeer::CODIGO, $codigo['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($codigo['max'])) {
				$this->addUsingAlias(ProductoPeer::CODIGO, $codigo['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ProductoPeer::CODIGO, $codigo, $comparison);
	}

	/**
	 * Filter the query on the descripcion column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDescripcion('fooValue');   // WHERE descripcion = 'fooValue'
	 * $query->filterByDescripcion('%fooValue%'); // WHERE descripcion LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $descripcion The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProductoQuery The current query, for fluid interface
	 */
	public function filterByDescripcion($descripcion = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($descripcion)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $descripcion)) {
				$descripcion = str_replace('*', '%', $descripcion);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ProductoPeer::DESCRIPCION, $descripcion, $comparison);
	}

	/**
	 * Filter the query on the modelo column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByModelo('fooValue');   // WHERE modelo = 'fooValue'
	 * $query->filterByModelo('%fooValue%'); // WHERE modelo LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $modelo The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProductoQuery The current query, for fluid interface
	 */
	public function filterByModelo($modelo = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($modelo)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $modelo)) {
				$modelo = str_replace('*', '%', $modelo);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ProductoPeer::MODELO, $modelo, $comparison);
	}

	/**
	 * Filter the query on the tamanio column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByTamanio('fooValue');   // WHERE tamanio = 'fooValue'
	 * $query->filterByTamanio('%fooValue%'); // WHERE tamanio LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $tamanio The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProductoQuery The current query, for fluid interface
	 */
	public function filterByTamanio($tamanio = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($tamanio)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $tamanio)) {
				$tamanio = str_replace('*', '%', $tamanio);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ProductoPeer::TAMANIO, $tamanio, $comparison);
	}

	/**
	 * Filter the query on the precio column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByPrecio(1234); // WHERE precio = 1234
	 * $query->filterByPrecio(array(12, 34)); // WHERE precio IN (12, 34)
	 * $query->filterByPrecio(array('min' => 12)); // WHERE precio > 12
	 * </code>
	 *
	 * @param     mixed $precio The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProductoQuery The current query, for fluid interface
	 */
	public function filterByPrecio($precio = null, $comparison = null)
	{
		if (is_array($precio)) {
			$useMinMax = false;
			if (isset($precio['min'])) {
				$this->addUsingAlias(ProductoPeer::PRECIO, $precio['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($precio['max'])) {
				$this->addUsingAlias(ProductoPeer::PRECIO, $precio['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ProductoPeer::PRECIO, $precio, $comparison);
	}

	/**
	 * Filter the query on the stock column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByStock('fooValue');   // WHERE stock = 'fooValue'
	 * $query->filterByStock('%fooValue%'); // WHERE stock LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $stock The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProductoQuery The current query, for fluid interface
	 */
	public function filterByStock($stock = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($stock)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $stock)) {
				$stock = str_replace('*', '%', $stock);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ProductoPeer::STOCK, $stock, $comparison);
	}

	/**
	 * Filter the query on the categoriaid column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCategoriaid(1234); // WHERE categoriaid = 1234
	 * $query->filterByCategoriaid(array(12, 34)); // WHERE categoriaid IN (12, 34)
	 * $query->filterByCategoriaid(array('min' => 12)); // WHERE categoriaid > 12
	 * </code>
	 *
	 * @see       filterByCategoria()
	 *
	 * @param     mixed $categoriaid The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProductoQuery The current query, for fluid interface
	 */
	public function filterByCategoriaid($categoriaid = null, $comparison = null)
	{
		if (is_array($categoriaid)) {
			$useMinMax = false;
			if (isset($categoriaid['min'])) {
				$this->addUsingAlias(ProductoPeer::CATEGORIAID, $categoriaid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($categoriaid['max'])) {
				$this->addUsingAlias(ProductoPeer::CATEGORIAID, $categoriaid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ProductoPeer::CATEGORIAID, $categoriaid, $comparison);
	}

	/**
	 * Filter the query by a related Categoria object
	 *
	 * @param     Categoria|PropelCollection $categoria The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProductoQuery The current query, for fluid interface
	 */
	public function filterByCategoria($categoria, $comparison = null)
	{
		if ($categoria instanceof Categoria) {
			return $this
				->addUsingAlias(ProductoPeer::CATEGORIAID, $categoria->getIdcategoria(), $comparison);
		} elseif ($categoria instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(ProductoPeer::CATEGORIAID, $categoria->toKeyValue('PrimaryKey', 'Idcategoria'), $comparison);
		} else {
			throw new PropelException('filterByCategoria() only accepts arguments of type Categoria or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Categoria relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ProductoQuery The current query, for fluid interface
	 */
	public function joinCategoria($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Categoria');

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
			$this->addJoinObject($join, 'Categoria');
		}

		return $this;
	}

	/**
	 * Use the Categoria relation Categoria object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CategoriaQuery A secondary query class using the current class as primary query
	 */
	public function useCategoriaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinCategoria($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Categoria', 'CategoriaQuery');
	}

	/**
	 * Filter the query by a related Compra object
	 *
	 * @param     Compra $compra  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProductoQuery The current query, for fluid interface
	 */
	public function filterByCompra($compra, $comparison = null)
	{
		if ($compra instanceof Compra) {
			return $this
				->addUsingAlias(ProductoPeer::IDPRODUCTO, $compra->getProductoid(), $comparison);
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
	 * @return    ProductoQuery The current query, for fluid interface
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
	 * @param     Producto $producto Object to remove from the list of results
	 *
	 * @return    ProductoQuery The current query, for fluid interface
	 */
	public function prune($producto = null)
	{
		if ($producto) {
			$this->addUsingAlias(ProductoPeer::IDPRODUCTO, $producto->getIdproducto(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseProductoQuery