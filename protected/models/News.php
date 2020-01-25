<?php

/**
 * This is the model class for table "news".
 *
 * The followings are the available columns in table 'news':
 * @property integer $n_id
 * @property string $n_title
 * @property string $n_datetime
 * @property integer $n_views
 * @property integer $n_ispin
 * @property string $n_thumbnail
 * @property string $n_body
 * @property string $n_last_update
 * @property integer $n_status
 * @property integer $c_id
 * @property integer $u_id
 *
 * The followings are the available model relations:
 * @property Attachment[] $attachments
 * @property Category $c
 * @property User $u
 */
class News extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'news';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('n_title, n_body', 'required'),
			array('n_views, n_ispin, n_status, c_id, u_id', 'numerical', 'integerOnly'=>true),
			array('n_title', 'length', 'max'=>512),
			array('n_thumbnail', 'length', 'max'=>255),
			array('n_datetime, n_last_update', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('n_id, n_title, n_datetime, n_views, n_ispin, n_thumbnail, n_body, n_last_update, n_status, c_id, u_id', 'safe', 'on'=>'search'),
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
			'attachments' => array(self::HAS_MANY, 'Attachment', 'n_id'),
			'c' => array(self::BELONGS_TO, 'Category', 'c_id'),
			'u' => array(self::BELONGS_TO, 'User', 'u_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'n_id' => 'รหัส',
			'n_title' => 'หัวข้อ/เรื่อง',
			'n_datetime' => 'วันที่',
			'n_views' => 'จำนวนเข้าชม',
			'n_ispin' => 'ปักหมุด',
			'n_thumbnail' => 'ภาพประกอบ',
			'n_body' => 'เนื้อหา',
			'n_last_update' => 'แก้ไขล่าสุด',
			'n_status' => 'สถานะ',
			'c_id' => 'หมวดหมู่ข่าว',
			'u_id' => 'ผู้เขียน',
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

		$criteria->compare('n_id',$this->n_id);
		$criteria->compare('n_title',$this->n_title,true);
		$criteria->compare('n_datetime',$this->n_datetime,true);
		$criteria->compare('n_views',$this->n_views);
		$criteria->compare('n_ispin',$this->n_ispin);
		$criteria->compare('n_thumbnail',$this->n_thumbnail,true);
		$criteria->compare('n_body',$this->n_body,true);
		$criteria->compare('n_last_update',$this->n_last_update,true);
		$criteria->compare('n_status',$this->n_status);
		$criteria->compare('c_id',$this->c_id);
		$criteria->compare('u_id',$this->u_id);

		$criteria->order = 'n_ispin ASC, n_id DESC';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return News the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	protected function beforeSave()
	{
		if ($this->isNewRecord) {
			$this->n_datetime = date("Y-m-d H:i:s");
		} else {
			$this->n_last_update = date("Y-m-d H:i:s");
		}
		$this->u_id = Yii::app()->user->id;
		return parent::beforeSave();
	}
}
