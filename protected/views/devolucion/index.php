<?php
/* @var $this DevolucionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Devolucions',
);

$this->menu=array(
	array('label'=>'Create Devolucion', 'url'=>array('create')),
	array('label'=>'Manage Devolucion', 'url'=>array('admin')),
);
?>

<h1>Devolucions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
