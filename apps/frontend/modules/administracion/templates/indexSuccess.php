<?php slot('administracion', 'Pisado') ?>
<? /* @var $fila Categoria */?>
<? /* @var $prod Producto */?>
<? /* @var $user Cliente*/?>
<? /* @var $pedidos Compra*/?>
<? /* @var $alquiler Alquiler*/?>
<!------------------------------MOSTRAR TABLA PRODUCTO------------------------------>


<fieldset style="width: 500px">
    <legend><h2>Tabla Productos!-----<a href="<?php echo url_for('modifProd/new')?>">Nuevo</a>------</h2></legend>
    <div style="font-size:12px; color: white; overflow: auto; width: 500px; height: 100px">
        <table border="1" >
        <tr>
            <td>Id</td><td>codigo</td><td>descripcion</td><td>modelo</td><td>tamanio</td>
          <td>precio</td><td>stock</td><td>categoria</td>
        </tr>
        <?php foreach($results as $prod):?>
        <tr>
            <td><?php echo $prod->getIdproducto();?></td>
            <?php $idX = $prod->getIdproducto();?>
            <td><?php echo $prod->getCodigo();?></td>
            <td><?php echo $prod->getDescripcion();?></td>
            <td><?php echo $prod->getModelo();?></td>
            <td><?php echo $prod->getTamanio();?></td>
            <td><?php echo $prod->getPrecio();?></td>
            <td><?php echo $prod->getStock();?></td>
            <td><?php echo $prod->getCategoria()->getNombre();?></td>
          <td><a href="<?php echo url_for('administracion/borrar').'?idp='.$idX?>">Borrar</a></td>
          <td><a href="<?php echo url_for('modifProd/edit').'?idproducto='.$idX?>">Modificar</a></td>
        </tr>
        <?php endforeach;?>
        </table>
    </div>
</fieldset>
</br>

<!--===============================================================================-->
<!-----------------------------------------USUARIOS---------------------------------->
<fieldset>
    <legend><h2>Tabla Usuario!-----<a href="<?php echo url_for('modifUser/new')?>">Nuevo</a>----</h2></legend>
     <div style="font-size:12px; color: white; overflow: auto; width: 800px; height: 100px">
        <table border="1">
            <tr>
              <td>Id</td><td>user</td><td>Nombre</td><td>Apellido</td><td>Dni</td>
              <td>fechanac</td><td>direccion</td><td>localidad</td><td>telcel</td>
              <td>email</td><td>password</td>
            </tr>
            <?php foreach($user as $useraux):?>
                <tr>
                    <td><?php echo $useraux->getIdcliente();?></td>
                    <? $idX = $useraux->getIdcliente()?>
                    <td><?php echo $useraux->getUser();?></td>
                    <td><?php echo $useraux->getNombre();?></td>
                    <td><?php echo $useraux->getApellido();?></td>
                    <td><?php echo $useraux->getDni()?></td>
                    <td><?php echo $useraux->getFechanac('d-m-Y');?></td>
                    <td><?php echo $useraux->getDireccion();?></td>
                    <td><?php echo $useraux->getLocalidad();?></td>
                    <td><?php echo $useraux->getTelcel();?></td>
                    <td><?php echo $useraux->getEmail();?></td>
                  <td><?php echo "****";?></td>
                  <td><a href="<?php echo url_for('modifUser/delete').'?idcliente='.$idX?>">Borrar</a></td>
                  <td><a href="<?php echo url_for('modifUser/edit').'?idcliente='.$idX?>">Modificar</a></td>
                </tr>
            <?php endforeach;?>
        </table>
     </div>
 </fieldset>
</br>

<!--===============================================================================-->
<!---------------------------------TABLA DE COMPRAS---------------------------------->

<fieldset style="width: 430px">
    <legend><h2>Tabla Compras!</h2></legend>
    <div style="font-size:12px; color: white; overflow: auto; width: 420px; height: 100px">
        <table border="1" >
        <tr>
            <td>Compra</td><td>Cliente</td><td>Fecha</td><td>Descripcion</td><td>Modelo</td>
          <td>Tamanio</td>
        </tr>
        <?php foreach($compras as $pedidos):?>
        <tr> 

            <td><?php echo $pedidos->getIdcompra() ?></td>
            <td><?php echo $pedidos->getCliente()->getUser()?></td>
            <td><?php echo $pedidos->getFecha()?></td>
            <td><?php echo $pedidos->getProducto()->getDescripcion();?></td>
            <td><?php echo $pedidos->getProducto()->getModelo()?></td>
            <td><?php echo $pedidos->getProducto()->getTamanio()?></td>

        </tr>
        <?php endforeach;?>
        </table>
    </div>
</fieldset>        

<!--===============================================================================-->
<!-------------------------------TABLA DE PRODUCTOS---------------------------------->


</br>
<fieldset style="width: 475px">
    <legend><h2>Tabla Alquileres!</h2></legend>
    <div style="font-size:12px; color: white; overflow: auto; width: 480px; height: 100px">
        <table border="1">
        <tr>
            <td>Id</td><td>cancha</td><td>fecha</td><td>indumentaria</td><td>duchas</td>
          <td>confiteria</td><td>usuario</td>
        </tr>
        <?php foreach($alquileres as $alquiler):?>
        <tr>
            <td><?php echo $alquiler->getIdalquiler();?></td>
            <?php $idA = $alquiler->getIdalquiler() ?>
            <td><?php echo $alquiler->getCancha()?></td>
            <td><?php echo $alquiler->getFecha()?></td>
            <td><?php echo $alquiler->getIndumentaria()?></td>
            <td><?php echo $alquiler->getDuchas()?></td>
            <td><?php echo $alquiler->getConfiteria()?></td>          
            <td><?php echo $alquiler->getCliente()->getUser()?></td>
              <td><a href="<?php echo url_for('administracion/cancelar').'?idA='.$idA?>">Cancelar</a></td>     
        </tr>
        <?php endforeach;?>
        </table>
    </div>
</fieldset>
</br>