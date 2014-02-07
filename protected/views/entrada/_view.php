<?php
/* @var $this EntradaController */
/* @var $data Entrada */
?>

<div class="well">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idEntrada')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->codEntrada), array('view', 'id'=>$data->idEntrada)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idFactura')); ?>:</b>
	<?php echo factura::LinkToFactura($data->idFactura);?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idProducto')); ?>:</b>
	<?php echo producto::linkToProductoCompleto($data->idProducto);?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />

	<ul class="nav nav-pills nav-stacked" style="max-width: 200px;">
	  <li class="active">
	    <a href="#">
	      <span class="badge pull-right"><?php echo CHtml::encode($data->cEntrada); ?></span>
	      <?php echo CHtml::encode($data->getAttributeLabel('cEntrada')); ?>:
	    </a>
	  </li>
	</ul>

	<b><?php echo CHtml::encode($data->getAttributeLabel('ubicacion')); ?>:</b>
	<?php echo CHtml::encode($data->ubicacion); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('docEntrada')); ?>:</b>
	<?php echo CHtml::encode($data->docEntrada); ?>
	<br />

	*/ ?>

</div>