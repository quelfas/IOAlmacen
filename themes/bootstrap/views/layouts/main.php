<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

	<?php Yii::app()->bootstrap->register(); ?>
</head>

<body>

<?php $this->widget('bootstrap.widgets.TbNavbar',array(
    'items'=>array(
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'items'=>array(
                array('label'=>'Home', 'url'=>array('/site/index')),
                //array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
                //array('label'=>'Contact', 'url'=>array('/site/contact')),
                array('label'=>'Usuarios', 'url'=>array('/user/'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Proveedor', 'url'=>array('/proveedor/'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Factura', 'url'=>array('/factura/'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Productos', 'url'=>array('/producto/'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Operacion', 'url'=>array('/operador/create'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Entradas', 'url'=>array('/entrada/'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Salidas', 'url'=>array('/salida/'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Devolucion', 'url'=>array('/devolucion/'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'NERV', 'url'=>array('/core/'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
            ),
        ),
    ),
)); ?>

<div class="container" id="page">
	<?php if(isset($this->breadcrumbs)):?>
	<div class="row">
		<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	</div>
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by Gilcar 2011 "Pasion por la Informatica".<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
