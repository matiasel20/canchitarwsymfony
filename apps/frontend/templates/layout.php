

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">


<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">




<head>

				
<script type="text/javascript"> 
	
</script>
	<?php include_http_metas() ?>
        <?php include_metas() ?>
        <?php include_title() ?>
        <!--<link rel="shortcut icon" href="/favicon.ico" />-->
        <?php include_stylesheets() ?>
        <?php include_javascripts() ?>
	
</head>



<body>


		
		
<div class="logo">
   <div class="pelota">
       <img class="pelota" src="<?php echo image_path('photo.gif')?>" alt="Click to see enlarged image"/>
    </div>
    <div class="titulo"><h1>La Canchita de Rawson</h1></div>
    <div class="calendario" id="calendario" style="font-size:0.5em"></div>

</div>
<div class="principal">
	<div class="left">
		<div style="text-align: center">
			<?php if($sf_user->isAuthenticated()):?>
				<label sytle="text-align: right"><?php echo $sf_user->getAttribute('usuario')?> <a href="<?php echo url_for('login/logout') ?>" >cerrar sesion</a></label>
            <?php elseif (isset($_SESSION['empleado'])):?>
				<label sytle="text-align: right"><?php echo $_SESSION['empleado']?> <a href="funciones/logout.php" >cerrar sesion</a></label>
			<?php endif;?>
        </div> 

		<div class="menu">			
			<a id="format" class="<?php if (!include_slot('inicio')): ?>link<?php endif; ?>" href="Index.php">Inicio</a>							
			<a id="format" class="<?php if (!include_slot('entrar')): ?>link<?php endif; ?>" href="<?php echo url_for('login/index') ?>">Entrar</a>			
			<a id="format" class="<?php if (!include_slot('registrarse')): ?>link<?php endif; ?>" href="<?php echo url_for('registro/index') ?>">Registrarse</a>						
			<a id="format" class="<?php if (!include_slot('torneos')): ?>link<?php endif; ?>" href="<?php echo url_for('torneos/index') ?>">Torneos</a>					
			<a id="format" class="<?php if (!include_slot('compras')): ?>link<?php endif; ?>" href="<?php echo url_for('compras/index') ?>">Compras</a>						
			<a id="format" class="<?php if (!include_slot('alquileres')): ?>link<?php endif; ?>" href="<?php echo url_for('alquileres/index') ?>">Alquileres</a>						
			<a id="format" class="<?php if (!include_slot('proveedores')): ?>link<?php endif; ?>" href="Proveedores.php">Proveedores</a>			
			<a id="format" class="<?php if (!include_slot('administracion')): ?>link<?php endif; ?>" href="Administracion.php">Administracion</a>					
		</div>
      
    </div>

    <div class="center">

	
          <?php echo $sf_content ?>
          
          
        	
            
    
   </div>
</div>
    <div class="pie">
        <footer style="text-align: center">
           <p>&copy; Diseñado por Aspiroz, Figueroa, Gensana, Machado</p>
        </footer>
    </div>
</body>

</html>

