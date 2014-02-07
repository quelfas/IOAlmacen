<?php
/* @var $this ProductoController */
/* @var $model Producto */

$this->breadcrumbs=array(
	'Productos'=>array('index'),
	$model->nParte." ".$model->nombre,
);

$this->menu=array(
	array('label'=>'List Producto', 'url'=>array('index')),
	array('label'=>'Create Producto', 'url'=>array('create')),
	array('label'=>'Update Producto', 'url'=>array('update', 'id'=>$model->idproducto)),
	array('label'=>'Delete Producto', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idproducto),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Producto', 'url'=>array('admin')),
);
?>

<h2>Producto N. parte <?php echo $model->nParte; ?></h2>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'idproducto',
		'nParte',
		'nombre',
		//'precio',
		array(
			'name'=>'precio',
			'label'=>'Precio Base',
			'value'=>number_format($model->precio,2),
			'type'=>'raw'

			),
		//'estado',
		array(
			'name'=>'estado',
			'label'=>'Estado del Producto',
			'value'=>producto::getActivos($model->estado),
			'type'=>'raw'
			),
	),
)); 
?>
<div class="well">
	<h3>Historico de Operaciones</h3>
	<small>Se muestran los 3 ultimos meses de operacion.</small>
</div>
<?php 
/***********************************/
$entrada_activa = Yii::app()
	->db
	->createCommand()
	->SELECT('*')
	->FROM('operador') 
	->WHERE('fecha BETWEEN DATE_SUB(CURDATE(), INTERVAL 3 MONTH) AND CURDATE() AND idProducto='.$model->idproducto.' ORDER BY idoperador DESC')
	->queryAll();
	//print_r($entrada_activa);
	if(empty($entrada_activa)){
	 echo "<div class='alert alert-warning alert-dismissable'>
  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
  <strong>Advertencia!</strong> No se encontraron registros dentro del rango de fechas solicitado, tambien es posible que el registro no tenga factura vinculada.
</div>";
	}else{
/***********************************/ 
$classAsignTask = "class='active'";
 ?>

 <ul class="nav nav-tabs nav-justified">
  <li <?php if($_GET['task'] == "F"){echo $classAsignTask;} ?> ><?php echo CHtml::link('Facturas',array('producto/view', 'id'=>$model->idproducto, 'task'=>'F')); ?></li>
  <li <?php if($_GET['task'] == "E"){echo $classAsignTask;} ?> ><?php echo CHtml::link('Entradas',array('producto/view', 'id'=>$model->idproducto, 'task'=>'E')); ?></li>
  <li <?php if($_GET['task'] == "S"){echo $classAsignTask;} ?> ><?php echo CHtml::link('Salidas',array('producto/view', 'id'=>$model->idproducto, 'task'=>'S')); ?></li>
 
</ul>
<?php 
	if($_GET['task'] == "F"){
		$data1 = 3;
		$data2 = 5;
		$data3 = 10;
		$resultante ="echo sinh($data1+$data2*1.12)/$data3;";
		producto::ejecutaString($resultante);
		///
 ?>
 <?php echo CHtml::link("Exportar Excel <i class='icon-download-alt icon-white'></i>",array("index","excel"=>$model->idproducto),array("class"=>"btn btn-success btn-xs")) ?>
 <hr>
<table class="table table-bordered">
  <tr>
    <th>Fecha</th>
    <th>Factura</th>
    <th>Precio</th>
    <th>Cantidad</th>
  </tr>
  <?php 
	foreach ($entrada_activa as $key => $value) {
		//print_r($value);
		?>
	<tr>
	    <td><?php echo $value['fecha'];?></td>
	    <td><?php echo factura::LinkToFactura($value['idfactura']); ?></td>
	    <td><?php echo $value['precio'];?></td>
	    <td><?php echo $value['cantidad'];?></td>
  	</tr>
	<?php }?>	
  
</table>
<?php  
	}else if($_GET['task'] == "E"){
	//Cargando entradas
		$consulta_entradas = Yii::app()
	->db
	->createCommand()
	->SELECT('*')
	->FROM('entrada') 
	->WHERE('fecha BETWEEN DATE_SUB(CURDATE(), INTERVAL 3 MONTH) AND CURDATE() AND idProducto='.$model->idproducto.' ORDER BY idEntrada DESC')
	->queryAll();
		//print_r($consulta_entradas);
		//no hay registro saco un aviso
		if(empty($consulta_entradas)){
			echo "<div class='alert alert-warning alert-dismissable'>
	  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
	  <strong>Advertencia!</strong> No se encontraron registros dentro del rango de fechas solicitado, tambien es posible que el registro no tenga entradas vinculada.
	</div>";
		}else{
			//construyo la tabla para recorrer el arreglo
		?>
		<table class="table table-bordered">
			<tr>
				<th>Fecha</th>
				<th>Factura</th>
				<th>Cant. Entrada</th>
				<th>Cod Entrada</th>
				<th>Ubicacion</th>
			</tr>
			<?php foreach ($consulta_entradas as $key => $value) {
				# code...
			?>
			<tr>
				<td><?php echo $value['fecha'];?></td>
				<td><?php echo factura::LinkToFactura($value['idFactura']);?></td>
				<td><h4><?php echo $value['cEntrada'];?></h4></td>
				<td>
					<?php
					$miSumaSalida = array();
					//$codEntrada = Salida::model()->find("codEntrada=".$value['idEntrada']);
					//calcular las cantidades de salida contra las entradas para establecer los comportamientos de los botones
					/*********************************************************************/
					//calculo de cantidades de entradas segun factura - producto en stored2.entrada 
					///en espera CHtml::listData(Salida::model()->findAll("codEntrada=".$value['idEntrada']),'codProducto','cantidad');
					$SumaSalida = Yii::app()
								->db
								->createCommand()
								->SELECT('cantidad')
								->FROM('salida') 
								->WHERE('codEntrada='.$value["idEntrada"].' AND codProducto='.$model->idproducto.' ORDER BY idSalida DESC')
								->queryAll();
						//foreach ($SumaSalida as $keyAlfa => $valueAlfa) {
							//if($keyAlfa==$model->idproducto){
								//$salidaA[]= $valueAlfa;
							//}		
						//}
					/*********************************************************************/
					//print_r($SumaSalida);
					foreach ($SumaSalida as $keyOscar => $valueOscar) {
						$miSumaSalida[] = $valueOscar['cantidad'];
					}
					$miFinalSalida = array_sum($miSumaSalida);
					if($value['cEntrada'] <= $miFinalSalida){$codEntrada = true;}else{$codEntrada = false;}
					echo CHtml::link($codEntrada?"Salida Creada para ".$value['codEntrada']:"Crear Salida para ".$value['codEntrada'],$codEntrada?array("producto/view","id"=>$model->idproducto,"task"=>"E"):array("salida/create","CodId"=>$value['idEntrada'],"prodId"=>$model->idproducto),array("class"=>$codEntrada?"btn disabled":"btn btn-primary"));?>
					<?php 
					unset($miSumaSalida);
					unset($miFinalSalida);
					?>
				</td>
				<td><?php echo $value['ubicacion'];?></td>
			</tr>
			<?php  } ?>
		</table>
		<?php
		}
	}else if($_GET['task'] == "S"){
	//Cargando Salidas
	echo"Salidas";
	$consulta_salidas = Yii::app()
	->db
	->createCommand()
	->SELECT('*')
	->FROM('salida') 
	->WHERE('fecha BETWEEN DATE_SUB(CURDATE(), INTERVAL 3 MONTH) AND CURDATE() AND codProducto='.$model->idproducto.' ORDER BY idSalida DESC')
	->queryAll();
		if(empty($consulta_salidas)){
			echo "<div class='alert alert-warning alert-dismissable'>
	  					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
	  					<strong>Advertencia!</strong> No se encontraron registros dentro del rango de fechas solicitado, tambien es posible que el registro no tenga salidas vinculada.
					</div>";
		}else{
			///ejecuto el html tabla para desplegar la informacion
	?>
	<table class="table table-bordered">
		<tr>
			<th>Fecha</th>
			<th>Cod Entrada</th>
			<th>Cantidad Salida</th>
			<th>Documento de Salida</th>
		</tr>
		<?php foreach ($consulta_salidas as $key => $value): ?>
		<tr>
			<td><?php echo $value['fecha']; ?></td>
			<td><?php echo entrada::LinkToEntradaCompleta($value['codEntrada']); ?></td>
			<td><?php echo $value['cantidad'];?></td>
			<td><?php echo $value['nEntrega']; ?></td>
		</tr>
		<?php endforeach ?>
	</table>
	<?php 
		}
	}
}
?>
