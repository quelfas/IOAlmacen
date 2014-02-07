<?php
/* @var $this SalidaController */
/* @var $data Salida */
?>

<div class="well">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idSalida')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idSalida), array('view', 'id'=>$data->idSalida), array('class'=>'btn btn-mini btn-primary')); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codEntrada')); ?>:</b>
	<?php echo entrada::LinkToEntradaCompleta($data->codEntrada); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codProducto')); ?>:</b>
	<?php echo Producto::LinkToProductoCompleto($data->codProducto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cantidad')); ?>:</b>
	<?php echo CHtml::encode($data->cantidad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nEntrega')); ?>:</b>
	<?php echo CHtml::encode($data->nEntrega); ?>
	<br />


</div>