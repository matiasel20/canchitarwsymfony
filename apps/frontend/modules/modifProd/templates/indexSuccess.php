<? /* @var $fila Producto */?>
<h2 style="text-align: left">Modificar Producto</h2>
<form action="midificUltimoP.php" method="post">
    Codigo</br>
    <input type="text" name="codigo" value="<?php echo $fila->getCodigo();?>"></br>
    Descripcion</br>
    <input type="text" name="descripcion" value="<?php echo $fila->getDescripcion()?>"></br>
    Modelo</br>
    <input type="text" name="modelo" value="<?php echo $fila->getModelo();?>"></br>
    Tamanio</br>
    <input type="text" name="tamanio" value="<?php echo $fila->getTamanio();?>"></br>
    Precio</br>
    <input type="text" name="precio" value="<?php echo $fila->getPrecio();?>"></br>
    Stock</br>
    <input type="text" name="stock" value="<?php echo $fila->getStock();?>"></br>
    Categoria</br>
    <input type="text" name="categoriaid" value="<?php echo $fila->getCategoriaid();?>"></br>

   <input type="submit" value="Modificar" >
</form>
</br>