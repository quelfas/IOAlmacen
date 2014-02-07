<?php

/**
 * This is the model class for table "devolucion".
 *
 * The followings are the available columns in table 'devolucion':
 * @property string $id
 * @property string $fecha
 * @property string $DocEntrada
 * @property string $productoID
 * @property integer $salidaID
 * @property integer $cantidad
 * @property string $Orden
 * @property integer $AutoEntrada
 */
class Devolucion extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public $Devolucion_salidaID;
	public function tableName()
	{
		return 'devolucion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fecha, DocEntrada, productoID, salidaID, cantidad, Orden, AutoEntrada', 'required'),
			array('salidaID, cantidad, AutoEntrada', 'numerical', 'integerOnly'=>true),
			array('DocEntrada', 'length', 'max'=>150),
			array('productoID', 'length', 'max'=>11),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, fecha, DocEntrada, productoID, salidaID, cantidad, Orden, AutoEntrada', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'fecha' => 'Fecha de Devolucion',
			'DocEntrada' => 'Documento de Entrada',
			'productoID' => 'Producto Devuelto',
			'salidaID' => 'Salida Asociada',
			'cantidad' => 'Cantidad Asociada',
			'Orden' => 'Orden Asociada',
			'AutoEntrada' => 'Cargar Entrada?',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('DocEntrada',$this->DocEntrada,true);
		$criteria->compare('productoID',$this->productoID,true);
		$criteria->compare('salidaID',$this->salidaID);
		$criteria->compare('cantidad',$this->cantidad);
		$criteria->compare('Orden',$this->Orden,true);
		$criteria->compare('AutoEntrada',$this->AutoEntrada);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Devolucion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
