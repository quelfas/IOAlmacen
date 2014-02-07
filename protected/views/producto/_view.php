<?php
/* @var $this ProductoController */
/* @var $data Producto */
?>

<div class="well">

	<b><?php echo CHtml::encode($data->getAttributeLabel('nParte')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->nParte), array('view', 'id'=>$data->idproducto,'task'=>'F')); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />


</div>