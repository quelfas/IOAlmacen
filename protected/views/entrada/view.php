<?php
/* @var $this EntradaController */
/* @var $model Entrada */

$this->breadcrumbs=array(
	'Entradas'=>array('index'),
	$model->idEntrada,
);

$this->menu=array(
	array('label'=>'List Entrada', 'url'=>array('index')),
	array('label'=>'Create Entrada', 'url'=>array('create')),
	array('label'=>'Update Entrada', 'url'=>array('update', 'id'=>$model->idEntrada)),
	array('label'=>'Delete Entrada', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idEntrada),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Entrada', 'url'=>array('admin')),
);
?>

<h1>View Entrada #<?php echo $model->idEntrada; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idEntrada',
		//'idFactura',
		array(
			'name'=>'idFactura',
			'label'=>'Factura',
			'value'=>factura::linkToFactura($model->idFactura),
			'type'=>'raw'
			),
		//'idProducto',
		array(
			'name'=>'idProducto',
			'label'=>'Producto',
			'value'=>Producto::LinkToProductoCompleto($model->idProducto),
			'type'=>'raw',
			),
		'fecha',
		'cEntrada',
		'codEntrada',
		'ubicacion',
		'docEntrada',
	),
)); ?>
