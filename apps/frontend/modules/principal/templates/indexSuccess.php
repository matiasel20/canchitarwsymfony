<?php slot('inicio', 'Pisado') ?>

<div class="contenido1">
        <b>Galeria de Imagenes</b>

        <table border="0" cellpadding="0" align="center">
          <tr>
                <td width="100%"><img src="<?php echo image_path("noticias/noticia1.JPG")?>" width="400" height="250" name="galeria"/></td>
          </tr>
          <tr>
                <td width="100%">
                <form method="POST" name="rotater">
                  <div align="center">
                   <input type="button" value="--Anterior" name="B2" onClick="window.clearTimeout(timeoutID);  backward()"/>
                   <input type="button" value="Play>|" name="B0" onClick="window.setTimeout('automatico()', 3000, true);"/>
                   <input type="button" value="Siguiente++" name="B1" onClick="window.clearTimeout(timeoutID);  forward()"/>
                   <br></br>


                  </div>
                 </form>
                </td>
          </tr>
        </table>
        <b>Quienes somos:</b>
        <div class="cuadro3">
                <p>En el año 2009 en la direccion rivadavia 666, nacio este club deportivo "La canchita de Rawson" de la mano del señor Gensana Matías.
                Con el apoyo de un pequeño capital financiero se pudo establecer esta institucion.
                Dicha institucion brinda el servicio de alquileres de espacios deportivos, especialmente para practicar
                futbol, ademas de diversos servicios extradeportivos para el esparcimiento del socio.
           </p> 
        </div>


</div>
