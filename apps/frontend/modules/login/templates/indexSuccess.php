<?php slot('entrar') ?>
<a id="format" class="Pisado" href="<?php echo url_for('alquileres/index') ?>">Entrar</a>	
<?php end_slot() ?>

<div class="contenido1" style="text-align: left">
<form id="formulario" method="post" action="<?php echo url_for('login/index');?>">
        <h2>Ingreso</h2><br/>
        <label>Usuario</label><br/>
        <input type="text" name="usuario" id="usuario" class="required" /><br/>
        <label>Contrase&ntilde;a</label><br/>
        <input type="password" name="pass" id="pass1" class="required"/><br/>
        <input id="button" name="button" type="submit" value="Enviar" /> <a href="Registro.php">Registrarse</a>
</form>
<?php echo $msj ?>
</div>