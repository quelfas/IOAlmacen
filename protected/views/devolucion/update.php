<?php
/* @var $this DevolucionController */
/* @var $model Devolucion */

$this->breadcrumbs=array(
	'Devolucions'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Devolucion', 'url'=>array('index')),
	array('label'=>'Create Devolucion', 'url'=>array('create')),
	array('label'=>'View Devolucion', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Devolucion', 'url'=>array('admin')),
);
?>

<h1>Update Devolucion <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>