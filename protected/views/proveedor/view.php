<?php
/* @var $this ProveedorController */
/* @var $model Proveedor */

$this->breadcrumbs=array(
	'Proveedores'=>array('index'),
	$model->proveedor,
);

$this->menu=array(
	array('label'=>'Lista de Proveedores', 'url'=>array('index')),
	array('label'=>'Crear Proveedor', 'url'=>array('create')),
	array('label'=>'Actualizar Proveedor', 'url'=>array('update', 'id'=>$model->idProveedor)),
	array('label'=>'Eliminar este Proveedor', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idProveedor),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Proveedores', 'url'=>array('admin')),
);
?>

<h2>Proveedor: <?php echo $model->proveedor; ?></h2>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'idProveedor',
		'fecha',
		'rif',
		'proveedor',
		'telefono',
		/*'activo',*/
		array(
			'name'=>'activo',
			'value'=>Proveedor::getPActivos($model->activo),
			'type'=>'raw',
			),
		'codigoProveedor',
	),
)); ?>
