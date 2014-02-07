<?php
/* @var $this OperadorController */
/* @var $model Operador */

$this->breadcrumbs=array(
	'Operadors'=>array('index'),
	$model->idoperador=>array('view','id'=>$model->idoperador),
	'Update',
);

$this->menu=array(
	array('label'=>'List Operador', 'url'=>array('index')),
	array('label'=>'Create Operador', 'url'=>array('create')),
	array('label'=>'View Operador', 'url'=>array('view', 'id'=>$model->idoperador)),
	array('label'=>'Manage Operador', 'url'=>array('admin')),
);
?>

<h1>Update Operador <?php echo $model->idoperador; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>