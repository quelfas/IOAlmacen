<?php
/* @var $this ProveedorController */
/* @var $data Proveedor */
?>

<div class="well">

	<b><?php echo CHtml::encode($data->getAttributeLabel('proveedor')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->proveedor), array('view', 'id'=>$data->idProveedor)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rif')); ?>:</b>
	<?php echo CHtml::encode($data->rif); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />

	<b><?php echo substr(CHtml::encode($data->getAttributeLabel('telefono')),0,20); ?>:</b>
	<?php echo CHtml::encode($data->telefono); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('activo')); ?>:</b>
	<?php 
		if(CHtml::encode($data->activo)==1)
		{
			echo"Activo";
		}
		elseif(CHtml::encode($data->activo)==2)
		{
			echo"Inactivo";
		} 
	?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('codigoProveedor')); ?>:</b>
	<?php echo CHtml::encode($data->codigoProveedor); ?>
	<br />


</div>