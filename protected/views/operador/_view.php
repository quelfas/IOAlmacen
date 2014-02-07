<?php
/* @var $this OperadorController */
/* @var $data Operador */
?>

<div class="well">

	
	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idfactura')); ?>:</b>
	<?php  echo factura::LinkToFactura($data->idfactura);	?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idProducto')); ?>:</b>
	<?php //echo CHtml::encode($data->idProducto); 
		$claveProducto = CHtml::encode($data->idProducto); 
		$dataProductoArreglo = CHtml::listData(Producto::model()->findAll(),'idproducto','ProductoCompleto');

		foreach ($dataProductoArreglo as $key1 => $value1) {
			if($claveProducto==$key1)
				echo $value1;
		}
	?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cantidad')); ?>:</b>
	<?php echo CHtml::encode($data->cantidad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('precio')); ?>:</b>
	<?php echo CHtml::encode($data->precio); ?>
	<br />


</div>