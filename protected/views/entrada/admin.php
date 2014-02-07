<?php
/* @var $this EntradaController */
/* @var $model Entrada */

$this->breadcrumbs=array(
	'Entradas'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Entrada', 'url'=>array('index')),
	array('label'=>'Create Entrada', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#entrada-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Entradas</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'type'=>'striped bordered condensed',
	'id'=>'entrada-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'ubicacion',
		array(
			'header'=>'Producto',
			'name'=>'idProducto',
			'value'=>'$data->idProducto0->nParte." ".$data->idProducto0->nombre',
			'type'=>'raw',
			'filter'=>CHtml::listData(Producto::model()->findAll(),'idproducto','nParte'),
			),
		array(
			'header'=>'Factura',
			'name' =>'idFactura',
			'value'=>'factura::LinkToFactura($data->idFactura0->idFactura)',
			'type'=>'raw',
			'filter'=>CHtml::listData(factura::model()->findAll(),'idFactura','nFactura'),

		 ),
		'fecha',
		'cEntrada',
		'codEntrada',
		/*
		'ubicacion',
		'docEntrada',
		*/
		array(
			//'class'=>'CButtonColumn',
			'class'=>'bootstrap.widgets.TbButtonColumn',
            'htmlOptions'=>array('style'=>'width: 50px'),
		),
	),
)); ?>
