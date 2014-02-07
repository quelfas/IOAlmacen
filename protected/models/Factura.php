<?php

/**
 * This is the model class for table "factura".
 *
 * The followings are the available columns in table 'factura':
 * @property integer $idFactura
 * @property integer $idProveedor
 * @property string $fecha
 * @property string $nFactura
 * @property string $eFecha
 * @property string $monto
 * @property integer $estado
 *
 * The followings are the available model relations:
 * @property Entrada[] $entradas
 * @property Proveedor $idProveedor0
 * @property Operador[] $operadors
 */
class Factura extends CActiveRecord
{



	public static $activos=array('1'=>'Si','2'=>'No');
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'factura';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idProveedor, fecha, nFactura, eFecha, monto, estado', 'required'),
			array('idProveedor, estado', 'numerical', 'integerOnly'=>true),
			array('nFactura', 'length', 'max'=>45),
			array('monto', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idFactura, idProveedor, fecha, nFactura, eFecha, monto, estado', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'entradas' => array(self::HAS_MANY, 'Entrada', 'idFactura'),
			'idProveedor0' => array(self::BELONGS_TO, 'Proveedor', 'idProveedor'),
			'operadors' => array(self::HAS_MANY, 'Operador', 'idfactura'),
		);
	}

	public static function getActivos($key=null)
	{
		if($key!==null)
			return self::$activos[$key];
		return self::$activos;
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idFactura' => 'Id Factura',
			'idProveedor' => 'Id Proveedor',
			'fecha' => 'Fecha de Ingreso al Sistema',
			'nFactura' => 'Numero de Factura',
			'eFecha' => 'Fecha de Creacion',
			'monto' => 'Total Factuda (sin IVA)',
			'estado' => 'Factura Completada? (Si - No)',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idFactura',$this->idFactura);
		$criteria->compare('idProveedor',$this->idProveedor);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('nFactura',$this->nFactura,true);
		$criteria->compare('eFecha',$this->eFecha,true);
		$criteria->compare('monto',$this->monto,true);
		$criteria->compare('estado',$this->estado);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Factura the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getFacturaCompleta()
    {
        return $this->idProveedor.'-'.$this->nFactura;
    }

   public function miFactura($modelData)
   {
   	$noData='No existe la Factura';
   	#consultando
   	$dataFacturaArreglo = CHtml::listData(Factura::model()->findAll("idFactura = ".$modelData),'idFactura','FacturaCompleta');
   	//recorriendo
	   	foreach ($dataFacturaArreglo as $key => $value) {
	   		#comparando
	   		if ($modelData==$key) {
	   			#true 
	   			$abreFactura = explode("-",$value);
	   			return $abreFactura[1];
	   		} else {
	   			#false
	   			return $noData;
	   		}
	   		
	   	}
   }

	public function LinkToFactura($modelData)
	{
		$dataFacturaArreglo = CHtml::listData(Factura::model()->findAll("idFactura = ".$modelData),'idFactura','FacturaCompleta');

		foreach ($dataFacturaArreglo as $key1 => $value1) {
			if($modelData==$key1)
				$Factura_Proveedor = array();
				$Factura_Proveedor = explode("-", $value1);
				//obteniendo informacion del proveedor
				$proveedorActivoFactura = Proveedor::model()->find("idProveedor = ".$Factura_Proveedor[0]);
			 return CHtml::link($Factura_Proveedor[1], array('factura/view', 'id'=>$modelData),array("class"=>"btn btn-mini btn-primary","data-toggle"=>"tooltip","data-placement"=>"right","title"=>$proveedorActivoFactura->proveedor));
			 unset($numeroFactura);
			 unset($proveedorFactura);
			 unset($Factura_Proveedor);
		}
	}
}
