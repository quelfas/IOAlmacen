<?php
/* @var $this DevolucionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Devoluciones',
);

$this->menu=array(
	array('label'=>'Crear Devolucion', 'url'=>array('create')),
	array('label'=>'Administrar Devoluciones', 'url'=>array('admin')),
);
?>

<h1>Devolucions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
