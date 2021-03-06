<?php

/**
 * This is the model class for table "BarometricPayload".
 *
 * The followings are the available columns in table 'BarometricPayload':
 * @property string $barometricPayloadId
 * @property string $date
 * @property double $pressure
 * @property double $reportedLatitude
 * @property double $reportedLongitude
 * @property double $temperature
 * @property string $gatewayId
 *
 * The followings are the available model relations:
 * @property Gateway $gateway
 * @property ReportingUserMoodRating[] $reportingUserMoodRatings
 * @property ReportingUserPhysicalRating[] $reportingUserPhysicalRatings
 */
class BarometricPayload extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return BarometricPayload the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'BarometricPayload';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('date, pressure, reportedLatitude, reportedLongitude, temperature, gatewayId', 'required'),
			array('pressure, reportedLatitude, reportedLongitude, temperature', 'numerical'),
			array('gatewayId', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('barometricPayloadId, date, pressure, reportedLatitude, reportedLongitude, temperature, gatewayId', 'safe', 'on'=>'search'),
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
			'gateway' => array(self::BELONGS_TO, 'Gateway', 'gatewayId'),
			'reportingUserMoodRatings' => array(self::HAS_MANY, 'ReportingUserMoodRating', 'barometricPayloadId'),
			'reportingUserPhysicalRatings' => array(self::HAS_MANY, 'ReportingUserPhysicalRating', 'barometricPayloadId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'barometricPayloadId' => 'Barometric Payload',
			'date' => 'Date',
			'pressure' => 'Pressure',
			'reportedLatitude' => 'Reported Latitude',
			'reportedLongitude' => 'Reported Longitude',
			'temperature' => 'Temperature',
			'gatewayId' => 'Gateway',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('barometricPayloadId',$this->barometricPayloadId,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('pressure',$this->pressure);
		$criteria->compare('reportedLatitude',$this->reportedLatitude);
		$criteria->compare('reportedLongitude',$this->reportedLongitude);
		$criteria->compare('temperature',$this->temperature);
		$criteria->compare('gatewayId',$this->gatewayId,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}