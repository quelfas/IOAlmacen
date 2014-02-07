<?php
/* @var $this FacturaController */
/* @var $data Factura */
?>

<div class="well well-sm">

	<b><?php echo "Proveedor"; ?>:</b>
	<?php 
	$claveProveedor = CHtml::encode($data->idProveedor); 
	$dataProveedorArreglo = CHtml::listData(Proveedor::model()->findAll(),'idProveedor','proveedor');

		foreach ($dataProveedorArreglo as $key => $value) {
			if($claveProveedor==$key)
				echo $value;
		}

	?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nFactura')); ?>:</b>
	<?php //echo CHtml::encode($data->nFactura); 
	echo CHtml::link(CHtml::encode($data->nFactura), array('view', 'id'=>$data->idFactura));

	?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('eFecha')); ?>:</b>
	<?php echo CHtml::encode($data->eFecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('monto')); ?>:</b>
	<?php echo CHtml::encode($data->monto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado')); ?>:</b>
	
	<?php if(CHtml::encode($data->estado)==1)
	{
		echo"<span class='label label-success'>Si</span>";
	}
	elseif(CHtml::encode($data->estado)==2)
	{
		echo"<span class='label label-important'>No</span>";
	}
	
	 ?>
	<br />


</div>
