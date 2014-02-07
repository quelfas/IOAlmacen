<?php
/* @var $this DevolucionController */
/* @var $model Devolucion */

$this->breadcrumbs=array(
	'Devolucions'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Devolucion', 'url'=>array('index')),
	array('label'=>'Create Devolucion', 'url'=>array('create')),
	array('label'=>'Update Devolucion', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Devolucion', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Devolucion', 'url'=>array('admin')),
);
?>

<h1>View Devolucion #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'fecha',
		'DocEntrada',
		'productoID',
		'salidaID',
		'cantidad',
		'Orden',
		'AutoEntrada',
	),
)); ?>
