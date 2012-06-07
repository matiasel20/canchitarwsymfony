

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
			<?php if (isset($_SESSION['usuario'])):?>
				<label sytle="text-align: right"><?php echo $_SESSION['usuario']?> <a href="funciones/logout.php" >cerrar sesion</a></label>
            <?php elseif (isset($_SESSION['empleado'])):?>
				<label sytle="text-align: right"><?php echo $_SESSION['empleado']?> <a href="funciones/logout.php" >cerrar sesion</a></label>
			<?php endif;?>
        </div> 

		<div class="menu">
			<a id="format" class="Pisado" href="Index.php">Inicio</a>
			<?php if(!isset($_SESSION['usuario']) and !isset($_SESSION['empleado'])):?>
				<a id="format" class="link" href="LogIn.php">Entrar</a>
			<?php endif;?>
			<a id="format" class="link" href="Registro.php">Registrarse</a>	
			<a id="format" class="link" href="Torneos.php">Torneos</a>			
			<a id="format" class="link" href="Compras.php">Compras</a>
			<a id="format" class="link" href="Alquileres.php">Alquileres</a>
			<a id="format" class="link" href="Proveedores.php">Proveedores</a>
			<?php if(isset($_SESSION['empleado'])):?>
				<a id="format" class="link" href="Administracion.php">Administracion</a>
			<?php endif;?>	
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

