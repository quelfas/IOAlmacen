<?php
/* @var $this DevolucionController */
/* @var $data Devolucion */
?>

<div class="well">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DocEntrada')); ?>:</b>
	<?php echo CHtml::encode($data->DocEntrada); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('productoID')); ?>:</b>
	<?php echo CHtml::encode($data->productoID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('salidaID')); ?>:</b>
	<?php echo CHtml::encode($data->salidaID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cantidad')); ?>:</b>
	<?php echo CHtml::encode($data->cantidad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Orden')); ?>:</b>
	<?php echo CHtml::encode($data->Orden); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('AutoEntrada')); ?>:</b>
	<?php echo CHtml::encode($data->AutoEntrada); ?>
	<br />

	*/ ?>

</div>