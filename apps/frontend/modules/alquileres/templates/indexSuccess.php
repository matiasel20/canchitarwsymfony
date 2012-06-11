<?php slot('alquileres', 'Pisado') ?>

<div id="tabs">
		
  <ul>
    <li><a href="#tabs-1">Cancha 1</br>(Futbol 5)</a></li>
    <li><a href="#tabs-2">Cancha 2</br>(Futbol 5)</a></li>
    <li><a href="#tabs-3">Cancha 3</br>(Futbol 8)</a></li>
  </ul>
  
  <?php foreach ($valores_cancha as $c => $archivo) :?>
  <div id="tabs-<?php echo $c; ?>">
      
    <img class="cancha" src="<?php echo image_path($archivo)?>" alt="pp"/>
    
    <?php for($i=0;$i<$dia_limite;$i++): ?>
    <label style="color:yellow;margin-left:8em"><?php echo $dia[$i]." ".$fecha[$i];?></label>
    <table class="alq">
    
    <form name="formulario" method="post" action="LogIn.html">
        
    <input type="hidden" value="<?php echo $c ?>" name="cancha"/>
    <input type="hidden" value="<?php echo $fecha[$i] ?>" name="fecha"/>
      
    <tr>
        
      <td class="alq">
      <fieldset>
        <label class= "option" for="localidad" style="font-size:23px">Horario:</br></br></label>
        <select name="horarios" class="required">
          <?php foreach($horario[$c][$i] as $hora):?>                                          
          <option value='<?php echo $hora?>'> <?php echo $hora.':00 hs'?> </option>                                              
          <?php endforeach;?>
       </select>
     </fieldset>																
     </td>		

     <td class="alq">								
       <fieldset>									
          Servicios Adicionales<br>
          <div style="width: auto; float: left">
            <label class="opciones" for="op1">
              <input class="opciones" type="checkbox" name="s1" id="op1" value="1"/>
            </label>
	    <br>
	    <label class="opciones" for="op2">
	      <input class="alq" type="checkbox" name="s2" id="op2" value="2"/>
	    </label>
	    <br>
	    <label class="opciones" for="op3">
	      <input class="alq" type="checkbox" name="s3" id="op3" value="3"/>
	    </label>
	  </div>
	  <div style="text-align:left">-Indumentaria</div>
	  <div style="text-align:left">-Ducha</div>
	  <div style="text-align:left">-Confiteria</div>
        </fieldset>
      </td>	
    
      </tr>
  
      <td colspan="2" class="alq">					
        <input class="submit" type="submit" value="Alquilar" onclick="return validar();" />
      </td>
						
      </form>    
        
    </table>
    <?php endfor ?>
    
  </div>  
  <?php endforeach ?>
    
</div>