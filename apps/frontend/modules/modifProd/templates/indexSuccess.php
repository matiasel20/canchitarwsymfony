<? /* @var $Producto Producto*/?>

<h1>Productos List</h1>


<table>
  <thead>
    <tr>
      <th>Idproducto</th>
      <th>Codigo</th>
      <th>Descripcion</th>
      <th>Modelo</th>
      <th>Tamanio</th>
      <th>Precio</th>
      <th>Stock</th>
      <th>Categoriaid</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Productos as $Producto): ?>
    <tr>
      <td><a href="<?php echo url_for('modifProd/edit?idproducto='.$Producto->getIdproducto()) ?>"><?php echo $Producto->getIdproducto() ?></a></td>
      <td><?php echo $Producto->getCodigo() ?></td>
      <td><?php echo $Producto->getDescripcion() ?></td>
      <td><?php echo $Producto->getModelo() ?></td>
      <td><?php echo $Producto->getTamanio() ?></td>
      <td><?php echo $Producto->getPrecio() ?></td>
      <td><?php echo $Producto->getStock() ?></td>
      <td><?php echo $Producto->getCategoria()->getNombre() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('modifProd/new') ?>">New</a>
