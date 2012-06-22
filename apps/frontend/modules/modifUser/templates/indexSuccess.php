<h1>Clientes List</h1>

<table>
  <thead>
    <tr>
      <th>Idcliente</th>
      <th>User</th>
      <th>Nombre</th>
      <th>Apellido</th>
      <th>Dni</th>
      <th>Fechanac</th>
      <th>Direccion</th>
      <th>Localidad</th>
      <th>Telcel</th>
      <th>Email</th>
      <th>Password</th>
      <th>Equipoid</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Clientes as $Cliente): ?>
    <tr>
      <td><a href="<?php echo url_for('modifUser/edit?idcliente='.$Cliente->getIdcliente()) ?>"><?php echo $Cliente->getIdcliente() ?></a></td>
      <td><?php echo $Cliente->getUser() ?></td>
      <td><?php echo $Cliente->getNombre() ?></td>
      <td><?php echo $Cliente->getApellido() ?></td>
      <td><?php echo $Cliente->getDni() ?></td>
      <td><?php echo $Cliente->getFechanac() ?></td>
      <td><?php echo $Cliente->getDireccion() ?></td>
      <td><?php echo $Cliente->getLocalidad() ?></td>
      <td><?php echo $Cliente->getTelcel() ?></td>
      <td><?php echo $Cliente->getEmail() ?></td>
      <td><?php echo $Cliente->getPassword() ?></td>
      <td><?php echo $Cliente->getEquipoid() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('modifUser/new') ?>">New</a>
