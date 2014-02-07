<table>
  <tr>
  	<td>Historico</td>
  	<td>Por Factura</td>
  	<td>Producto</td>
  	<td><?php
  	 $dataProductoArreglo = CHtml::listData(Producto::model()->findAll(),'idproducto','nParte');

		foreach ($dataProductoArreglo as $clave => $valor) {
			if($_GET["excel"]==$clave)
			 echo $valor;
		}
  	 ?></td>
  </tr>
  <tr>
    <th>Fecha</th>
    <th>Factura</th>
    <th>Precio</th>
    <th>Cantidad</th>
  </tr>
  <?php 
	foreach ($model as $key => $value) {
		//print_r($value);
		?>
	<tr>
	    <td><?php echo $value['fecha'];?></td>
	    <td><?php
	    $dataProveedorArreglo = CHtml::listData(Factura::model()->findAll(),'idFactura','nFactura');

		foreach ($dataProveedorArreglo as $key1 => $value1) {
			if($value['idfactura']==$key1)
			 echo $value1;
		}
	    ?></td>
	    <td><?php echo $value['precio'];?></td>
	    <td><?php echo $value['cantidad'];?></td>
  	</tr>
<?php 
}
?>	
  
</table>