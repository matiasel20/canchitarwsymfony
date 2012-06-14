<?php slot('administracion', 'Pisado') ?>
<? /* @var $fila Categoria */?>
<? /* @var $prod Producto */?>
<? /* @var $user Cliente*/?>
<? /* @var $pedidos Compra*/?>
<? /* @var $alquiler Alquiler*/?>
<!------------------------------MOSTRAR TABLA PRODUCTO------------------------------>


<fieldset style="width: 475px">
    <legend><h2>Tabla Productos!</h2></legend>
    <div style="font-size:12px; color: white; overflow: auto; width: 600px; height: 100px">
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
          <td>
              <a href="<?php echo url_for('administracion/borrar').'?idp='.$idX?>">Borrar</a>
          </td>
          <td><a href="funciones/abmProductos/modificaP.php?idX=<?php echo $prod->getIdproducto()?>">Modificar</a></td>
        </tr>
        <?php endforeach;?>
        </table>
    </div>
    <h2 style="color: orange">Arreglar borrar y modificar</h2>
</fieldset>
</br>

<!--===============================================================================-->
<!------------------------------INGRESO DE PRODUCTO---------------------------------->
<table border="1" style="color: white" >
<tr>
    <td style="text-align: center" colspan="2">Productos</td>
</tr>

    <td valign="top" rowspan="2">
    
    <font size="5"><u>Insertar</u></font>
        <form id="formulario5"action="funciones/abmProductos/insertarP.php" method="post">
            Codigo<br>
            <input type="text" name="codigo" class="required digits"><br>

                        Descripcion<br>
            <input type="text" name="descripcion" class="required"><br>
            
                        Modelo<br>
            <input type="text" name="modelo" class="required"><br>
            
                        Tamanio<br>
            <input type="text" name="tamanio" class="required"><br>
            
                        Precio<br>
            <input type="text" name="precio" class="required"><br>
 
                        Stock<br>
            <input type="text" name="stock" class="required digits"><br>

            <label class= "option" for="categoriaid">Categoria</label>
               <select id="categoriaid" name="categoriaid" class="required">
                       <option>Seleccione...</option>
                          <?php foreach($cats as $fila):?>
                       <option value=<?php echo $fila->getIdcategoria();?>><?php echo $fila->getNombre();?></option>

                          <?php endforeach; ?>
               </select><br>
            
            <input type="submit" value="ingresar">
            <h2 style="color: orange">Arreglar botones</h2>
        </form>
        <br>
        </td>


  <td valign="top">     
   
      <font size="5"><u>Eliminar</u></font>
        <form id="formulario4"action="funciones/abmProductos/borraP.php" method="post">
            ID<br>
            <input type="text" name="id" class="required digits"><br>
            
           <input type="submit" value="borrar">
        </form>
        <br>
  </td>
  <tr>
      <td valign="top">
    <font size="5"><u>Modificar</u></font> 
        <form id="formulario3" action="funciones/abmProductos/modificaP.php" method="post">
            ID<br>
            <input type="text" name="id" class="required digits"><br>
            
           <input type="submit" value="modifica">
        </form>


    </td>
    </tr>
</table>
<!--===============================================================================-->
<!-----------------------------------------USUARIOS---------------------------------->
<fieldset>
    <legend><h2>Tabla Usuario!</h2></legend>
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
                  <td><a href="funciones/abmUsuarios/borra.php?idX=<?php echo $useraux->getIdcliente()?>">Borrar</a></td>
                  <td><a href="funciones/abmUsuarios/modifica.php?idX=<?php echo $useraux->getIdcliente()?>">Modificar</a></td>
                </tr>
            <?php endforeach;?>
        </table>
     </div>
 </fieldset>
</br>

<!--===============================================================================-->
<!------------------------------INGRESO DE USUARIOS---------------------------------->
<table border="1" style="color: white" >
<tr>
    <td valign="top" rowspan="2">
    <font size="5"><u>Insertar</u></font>
        <form  id="formulario" action="funciones/abmUsuarios/insertar.php" method="post" >
            User<br>
            <input type="text" name="user" id="user" minlength="4" class="required"/><br>
            Nombre<br>
            <input type="text" name="nombre" class="required"><br>
            Apellido<br>
            <input type="text" name="apellido" class="required"><br>
            
                        DNI<br>
            <input type="text" name="dni" class="required digits"><br>
                        Fecha Nacimiento<br>
            <input type="text" name="fechanac" id="cuenta" value= ""  class="required"/><br>
                        Direccion<br>
            <input type="text" name="direccion" ><br>
            <label class= "option" for="localidad">Localidad:</label>
               <select id="localidad"  name="localidad" class="required">
                       <option value="">Seleccione...</option>
                       <option value="1">Rawson</option>
                       <option value="2">Trelew</option>
                       <option value="3">P.Madryn</option>
               </select><br>
                        Telcel<br>
            <input type="text" name="telcel"><br>
                        Email<br>
            <input type="text" name="email" id="mail" class="required email"><br>
                        Password<br>
            <input type="password" name="password" class="required"><br>
            
 
            <input type="submit" value="ingresar">
        </form>
        <br>
        </td>
<td valign="top">     
    <font size="5"><u>Eliminar</u></font>
        <form id="formulario1" action="funciones/abmUsuarios/borra.php" method="post" >
            ID<br>
            <input type="text" name="id" id="user" class="required digits"><br>
            
           <input type="submit" value="ingresar">
        </form>
        <br>
        
</td>
<tr>
    <td valign="top">
        <font size="5"><u>Modificar</u></font>
            <form id="formulario2" action="funciones/abmUsuarios/modifica.php" method="post" >
                ID<br>
                <input type="text" name="id" id="user" class="required digits"><br>

               <input type="submit" value="modifica">
            </form>
            <br>
    </td>
</tr>
</tr>

</table>

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
          <?php $i = $alquiler->getIdalquiler() ?>
            <td><?php echo $alquiler->getCancha()?></td>
            <td><?php echo $alquiler->getFecha()?></td>
            <td><?php echo $alquiler->getIndumentaria()?></td>
            <td><?php echo $alquiler->getDuchas()?></td>
            <td><?php echo $alquiler->getConfiteria()?></td>          
            <td><?php echo $alquiler->getCliente()->getUser()?></td>
          <td>
              <a href="funciones/abmAlquileres/borraA.php?idX=<?php echo $alquiler->getIdalquiler()?>">Cancelar</a>
          </td>          
        </tr>
        <?php endforeach;?>
        </table>
    </div>
</fieldset>
</br>