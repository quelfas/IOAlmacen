<?php
/* @var $this SalidaController */
/* @var $model Salida */

$this->breadcrumbs=array(
	'Salidas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Salida', 'url'=>array('index')),
	array('label'=>'Manage Salida', 'url'=>array('admin')),
);
?>

<h1>Create Salida</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>