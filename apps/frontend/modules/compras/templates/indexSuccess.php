<?php slot('compras', 'Pisado') ?>
<? /* @var $fila Categoria */?>
<div class="contenido1">

     <div id="accordion">
        <?php 
       
        

        foreach($arreglo as $fila):?>

            <h3><a href="#"><?php echo $fila->getNombre();?></a></h3>
            <div class="divTabla">
            <?php $results2= $fila->getProductos();?>
    <div style="font-size:12px; color: white; overflow: auto; width: 450px; height: 200px">
        <table border="1">
            <tr>
              <td>Codigo</td><td>Descripcion</td><td>Modelo</td><td>Tamanio</td><td>Precio</td>
              <td>Stock</td>
            </tr>
            <?php foreach($results2 as $fila):?>
                <tr>
                  <td><?php echo $fila->getCodigo();?></td>
                  <td><?php echo $fila->getDescripcion();?></td>
                  <td><?php echo $fila->getModelo();?></td>
                  <td><?php echo $fila->getTamanio();?></td>
                  <td><?php echo $fila->getPrecio();?></td>
                  <td><?php echo $fila->getStock();?></td>

                  <?php if($sf_user->isAuthenticated()):?>
                      <td><a href="funciones/compra/alta.php?prod=
                      <?php echo $fila->getIdproducto();?>"> Comprar </a></td>
                  <?php endif;?>


                </tr>
            <?php endforeach;?>
        </table>
     </div>

            </div>
        <?php endforeach;?>

    </div>
</div>