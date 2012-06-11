<?php slot('registrarse', 'Pisado') ?>

<div class="center">
		<div class="contenido1" style="text-align:left">
		   <form id="formulario" method="post" class="formulario">
			<h2>Registro</h2>
			</br>
			<label>Nombre</label></br>
			<input type="text" name="nomb" id="nomb" class="required" value= ""/>
			</br>
			<label>Apellido</label></br>
			<input type="text" name="ape" id="ape" class="required" value= ""/>
			</br>
                        <label>DNI</label></br>
                        <input type="text" name="dni" class="digits required"/>
                        </br>
			<label>Fecha</label></br>
			<input type="text" name="cuenta" id="cuenta" value= ""  class="required"/>
			</br></br>
			
			<label>Telefono</label></br>


			<input type="text" name="telnum" id="telnum" value= ""/>

			</br></br>
			<label class= "option" for="localidad">Localidad:</label>
			<select id="localidad"  name="localidad">
				<option value="">Seleccione...</option>
				<option value="1">Rawson</option>
				<option value="2">Trelew</option>
				<option value="3">P.Madryn</option>
			</select>
			</br>
			<label>direccion</label></br>
			<input type="text" name="dir" id="dir" class="required" />
			</br>
			<label>Usuario</label></br>
			<input type="text" name="usuario" id="usuario" class="required"/>
			</br>
			<label>E-mail</label></br>
			<input type="text" name="mail" id="mail" class="required email"/>
			</br>
			<label>Contrase&ntilde;a</label></br>
			<input type="password" name="pass1" id="pass1" class="required"/>
			</br>
			<label>Validar Contrase&ntilde;a</label></br>
			<input type="password" name="pass2" id="pass2" class="required"/>
			</br>
			<input type="checkbox" name="lelele" id="lololo"/>
			<label class= "option" for="nombre">Recibir Noticias de nuestra WEB</label></br>
			<input type="checkbox" name="lalala" id="lululu"/>
			<label class= "option" for="nombre">Recibir Catalogo de indumentaria y equipo</label></br>
			<input type="checkbox" name="lalala" id="lululu2"/>
			<label class= "option" for="nombre">Recibir Publicided de nuestros sponsors</label></br>
			
			</br>
<!--			<div style="height: 20px;" id="progressbar"></div>-->
			</br>
			<input id="button" name="button" type="submit" value="Enviar" />
		  </form>
                </div>
    </div>