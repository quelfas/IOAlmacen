<?php

/**
 * This is the model class for table "proveedor".
 *
 * The followings are the available columns in table 'proveedor':
 * @property integer $idProveedor
 * @property string $fecha
 * @property string $rif
 * @property string $proveedor
 * @property string $telefono
 * @property integer $activo
 * @property string $codigoProveedor
 *
 * The followings are the available model relations:
 * @property Factura[] $facturas
 */
class Proveedor extends CActiveRecord
{
	public static $Pactivos=array('1'=>'Activo','2'=>'Inactivo');
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'proveedor';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// '/(J|)(-)(\\d+){8}(-)(\\d){1}/is'
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fecha, rif, proveedor, telefono, activo, codigoProveedor', 'required'),
			array('proveedor, rif','unique'),
			//array('rif','match','pattern'=>' ^/J{1}$# ','message'=>'El Rif debe ser J-00000000-0'),
			array('proveedor','filter','filter'=>'strtoupper'),
			array('activo', 'numerical', 'integerOnly'=>true),
			array('rif, telefono', 'length', 'max'=>45),
			array('rif','unique','attributeName'=>'rif'),
			array('proveedor', 'length', 'max'=>100),
			array('codigoProveedor', 'length', 'max'=>6),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idProveedor, fecha, rif, proveedor, telefono, activo, codigoProveedor', 'safe', 'on'=>'search'),
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
			'facturas' => array(self::HAS_MANY, 'Factura', 'idProveedor'),
		);
	}

	public static function getPActivos($key=null)
	{
		if($key!==null)
			return self::$Pactivos[$key];
		return self::$Pactivos;
	}

	public static function getProveedor()
	{
		return CHtml::encode(model()->findAll(),'$key','proveedor');
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idProveedor' => 'Id Proveedor',
			'fecha' => 'Fecha de Registro',
			'rif' => 'RIF',
			'proveedor' => 'Razon Social',
			'telefono' => 'Telefono de Contacto (0261-7325662)',
			'activo' => 'Estado (Activo - Inactivo)',
			'codigoProveedor' => 'Codigo Proveedor',
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

		$criteria->compare('idProveedor',$this->idProveedor);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('rif',$this->rif,true);
		$criteria->compare('proveedor',$this->proveedor,true);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('activo',$this->activo);
		$criteria->compare('codigoProveedor',$this->codigoProveedor,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Proveedor the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
}
