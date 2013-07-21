<?php

/**
 * This is the model class for table "advert_image".
 *
 * The followings are the available columns in table 'advert_image':
 * @property string $id
 * @property string $advert_id
 * @property string $image
 *
 * The followings are the available model relations:
 * @property Advert $advert
 */
class AdvertImage extends CActiveRecord {
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return AdvertImage the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'advert_image';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('advert_id, image', 'required'),
            array('advert_id', 'length', 'max' => 11),
            array('image', 'length', 'max' => 255),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, advert_id, image', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'advert' => array(self::BELONGS_TO, 'Advert', 'advert_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'advert_id' => 'Advert',
            'image' => 'Image',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id, true);
        $criteria->compare('advert_id', $this->advert_id, true);
        $criteria->compare('image', $this->image, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function getImageUrl() {
        return Yii::app()->baseUrl . '/uploads/' . $this->advert->id . '/images/' . $this->image;
    }

    protected function afterDelete() {
        parent::afterDelete();
        $file = Yii::getPathOfAlias('webroot') . '/uploads/' . $this->advert->id . '/images/' . $this->image;
        if (file_exists($file) && !is_dir($file)) {
            unlink($file);
        }
    }
}