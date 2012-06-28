    
<? /* @var $fila Alquiler */?>
<div style="text-align: left; color: white">
<h2 style="text-align:left">Reservas</h2>
</div>
<br>
      <table border="1" style="color:white">
        <tr>
          <td>IdAlquiler</td><td>Cancha</td><td>Fecha</td><td>Indumentaria</td><td>Duchas</td>
          <td>Confiteria</td>
        </tr>
        <?php foreach($results as $fila):?>
            <tr>
                <td><?php echo $fila->getIdalquiler();?></td>
                <td><?php echo $fila->getCancha();?></td>
                <td><?php echo $fila->getFecha();?></td>
			  
			  <?php if ($fila->getIndumentaria()):?>
				<td align="center"><img src="<?php echo image_path('ok.png')?>"/></td>
			  <?php else:?>
			    <td></td>
			  <?php endif;?>
			  
			  <?php if ($fila->getDuchas()):?>
				<td align="center"><img src="<?php echo image_path('ok.png')?>"/></td>
			  <?php else:?>
			    <td></td>
			  <?php endif;?>
			  
			  <?php if ($fila->getConfiteria()):?>
				<td align="center"><img src="<?php echo image_path('ok.png')?>"/></td>
			  <?php else:?>
			    <td></td>
			  <?php endif;?>
			              
            </tr>
         <?php endforeach;?>
      </table>     
