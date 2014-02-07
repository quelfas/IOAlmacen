<?php
/* @var $this FacturaController */
/* @var $model Factura */

$this->breadcrumbs=array(
	'Facturas'=>array('index'),
	$model->nFactura." - ".$model->idProveedor0->proveedor,
);

$this->menu=array(
	array('label'=>'Lista de Factura', 'url'=>array('index')),
	array('label'=>'Crear Factura', 'url'=>array('create')),
	array('label'=>'Modificar Factura', 'url'=>array('update', 'id'=>$model->idFactura)),
	array('label'=>'Eliminar Factura', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idFactura),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Factura', 'url'=>array('admin')),
);
?>

<h1>Factura #<?php echo $model->nFactura; ?></h1>

<?php echo CHtml::link("Al servidor JS","http://200.8.219.163:8080") ?>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idProveedor0.proveedor',
		/*'fecha',*/
		array(
			'name'=>'fecha',
			'label'=>'Ingresado el'
			),
		'nFactura',
		'eFecha',
		'monto',
		array(
			'name'=>'estado',
			'label'=>'Factura Completa',
			'value'=>factura::getActivos($model->estado),
			'type'=>'raw'
			),
		/*'estado'*/
	),
)); ?>
<hr />
<H2>Productos</H2>
<table class="table table-bordered">
	<tr>
		<th>Productos</th>
		<th>Cantidad</th>
		<th> Cant. Entrada</th>
		<th>Precio</th>
		<th>SubTotal</th>
	</tr>
<?php
/********************************/
$entrada_activa = Yii::app()
	->db
	->createCommand()
	->SELECT('*')
	->FROM('entrada') 
	->WHERE('idFactura='.$model->idFactura)
	->queryAll();
/*********************************/
$Mitotal = array();
$m = array();
$historical = array();
$Mitotal[]=0;
$idPF = $model->idFactura;
$ActiveProductQuery = CHtml::listData(Operador::model()->findAll("idfactura =  $model->idFactura"),'precio','idProducto');
$ActiveProductQuery1 = Yii::app()->db->createCommand("SELECT * FROM operador WHERE idfactura =  $model->idFactura")->queryAll();
/**/
/*Zona de desarrollo de productos*/

foreach ($ActiveProductQuery1 as $arreglo1 => $arreglo2) {
	echo"<tr>";
	//primer campo producto
	$ActiveProductReturn = CHtml::listData(Producto::model()->findAllByPK($arreglo2['idProducto']),'idproducto','ProductoCompleto');
	$productoID = $arreglo2['idProducto'];
	$facturaID = $arreglo2['idfactura'];
	echo "<td>";
	foreach ($ActiveProductReturn as $productoReturn) {
		//echo $productoReturn;
		echo CHtml::link($productoReturn,array('producto/view','id'=>$arreglo2['idProducto'],'task'=>'F'));
	}
	echo"</td>";
	//segundo campo cantidad
	echo "<td>".$arreglo2['cantidad']."</td>";
	//tercer campo entradas y salidas
	//calculando las entradas
	echo "<td>";
	#for
	for($i=0;$i < count($entrada_activa);$i++){
		if($entrada_activa[$i]['idProducto']==$arreglo2['idProducto']){
			$m[]=$entrada_activa[$i]['cEntrada'];
			$historical[] = "Fecha Entrada: ".$entrada_activa[$i]['fecha']."<br> Cantidad Entrada: ".$entrada_activa[$i]['cEntrada']."<br> Ubicacion: ".$entrada_activa[$i]['ubicacion'];
			/*************************correccion de bucle 04-01-2014******************************/
						if( array_sum($m) ==$arreglo2['cantidad']){
					echo"<div class='btn-group'>
						  <button type='button' class='btn btn-xs btn-success'>".array_sum($m)."</button>
						  <button type='button' class='btn btn-xs btn-success dropdown-toggle' data-toggle='dropdown'>
						    <span class='caret'></span>
						    <span class='sr-only'>Info</span>
						  </button>
						  <ul class='dropdown-menu' role='menu'>";
						  foreach ($historical as $value) {
						  		echo"<li>".CHtml::link($value,array("entrada/view","id"=>$entrada_activa[$i]['idEntrada']))."</li>";
						  }
						    echo"<li class='divider'></li>";
						    	//vista rapida consulta de salidas 11/01/2014
						    //arreglo para cargar el id correcto
						    $VistaSalida = CHtml::listData(salida::model()->findAll("codEntrada=".$entrada_activa[$i]['idEntrada']),'fecha','SalidaCompleta');
						    //print_r($VistaSalida);
						    if($VistaSalida){
						    	foreach ($VistaSalida as $keyVistaSalida => $valueVistaSalida) {
						    		$SalidaDescompuesta = explode("-",$valueVistaSalida);
						    		echo"<li><a href='#'>".CHtml::link("Salida registrada: ".$keyVistaSalida."<br>Cantidad Salida: ".$SalidaDescompuesta[1],array("salida/view","id"=>$SalidaDescompuesta[0]))."</li>";
						    	}	
						    }else{
						    	echo"<li><a href='#'>No se ha registrado salida</a></li>" ;
						    }
						    
						    echo"</ul>
						</div>";
				}else{
					if(array_sum($m)==0){
						echo"<span class='badge badge-important'>".array_sum($m)."</span>";
					}else{
						echo"<div class='btn-group'>
						  <button type='button' class='btn btn-xs btn-danger'>".array_sum($m)."</button>
						  <button type='button' class='btn btn-xs btn-danger dropdown-toggle' data-toggle='dropdown'>
						    <span class='caret'></span>
						    <span class='sr-only'>Info</span>
						  </button>
						  <ul class='dropdown-menu' role='menu'>";
						  foreach ($historical as $value) {
						  		echo"<li><a href='#'>".$value."</a></li>";
						  }
						  echo"<li class='divider'></li>";
						  if( array_sum($m) < $arreglo2['cantidad']){
						  		echo"<li><a href='#'>Existe Deficit en Entrada</a></li>";
						  }elseif(array_sum($m) > $arreglo2['cantidad']){
						  		echo"<li><a href='#'>Existe Sobreexistencia en Entrada</a></li>";
						  }
						    echo"</ul>
						</div>";
					}
					
				}
			/*************************correccion de bucle 04-01-2014******************************/
		}
		unset($m);//evita que la suma sea progresiva a lo largo del foreach l:72
		unset($historical);//evita la repeticion de microreportes a lo largo del foreach l:72
	}
	echo " </td>";
	//cuarto campo precio unitario
	echo "<td>".$arreglo2['precio']."</td>";
	//quinto campo subtotal precio por cantidad
	$Mitotal[]=$arreglo2['cantidad']*$arreglo2['precio'];
	//echo "<td>". number_format(round($arreglo2['cantidad']*$arreglo2['precio'],1),2,",",".")."</td>";
	if ($arreglo2['cantidad']==1) {
		echo "<td>".$arreglo2['precio']."</td>";
	} else {
		echo "<td>". number_format(round($arreglo2['cantidad']*$arreglo2['precio'],1),2,".","")."</td>";
	}
	
	echo"</tr>";
}

/*Zona de desarrollo de productos*/
 ?>
 <tr>
 	<th colspan="4"><div align="right">Total</div></th>
 	<th><div align="right"><?php echo number_format(array_sum($Mitotal),2,".","");?></div></th>
 </tr>
 </table>
  <?php
  /*******/
  if($model->monto != number_format(array_sum($Mitotal),2,".",""))
  {
?>
	<div class="alert alert-danger alert-dismissable">
	 	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	 	Algo esta mal. El monto total facturado no coincide con el monto total por producto.<br>
	 	Debe revisar el fisico de la factura <b><?php echo $model->nFactura;?> de <?php echo $model->idProveedor0->proveedor; ?></b>
	 </div>
<?php
  }
  /*******/
 if($model->estado==2)
 {
 ?>
 <div class="alert alert-warning alert-dismissable">
 	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
 	Atencion!!! Esta factura no se encuntra completada <br />
 	<?php echo CHtml::link("Completar",array("Factura/cerrarFactura","catruraID"=>$model->idFactura),array("class"=>"btn btn-danger")); ?>
 </div>
 <?php }
unset($ActiveProductQuery);
 ?>