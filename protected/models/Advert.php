<?php

/**
 * This is the model class for table "advert".
 *
 * The followings are the available columns in table 'advert':
 * @property string $id
 * @property string $title
 * @property string $text
 * @property string $main_image
 * @property string $created_date
 *
 * The followings are the available model relations:
 * @property AdvertImage[] $advertImages
 */
class Advert extends CActiveRecord {
    public $images;
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Advert the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'advert';
    }

    public function behaviors() {
        return array(
            'imageUploadBehavior' => array(
                'class' => 'ext.ImageUploadBehavior',
                'imagePath' => 'uploads',
                'imageField' => 'main_image',
            ),
        );
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('title, text', 'required'),
            array('title', 'length', 'max' => 255),
            array('main_image, images', 'file', 'types' => 'jpg', 'allowEmpty' => true),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, title, text, main_image, created_date', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'advertImages' => array(self::HAS_MANY, 'AdvertImage', 'advert_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'title' => 'Название',
            'text' => 'Текст',
            'main_image' => 'Главное изображение',
            'created_date' => 'Дата создания',
            'images' => 'Изображения',
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
        $criteria->compare('title', $this->title, true);
        $criteria->compare('text', $this->text, true);
        $criteria->compare('main_image', $this->main_image, true);
        $criteria->compare('created_date', $this->created_date, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    protected function afterSave() {
        parent::afterSave();

        $images = CUploadedFile::getInstances($this, 'images');
        if (isset($images) && count($images) > 0) {
            foreach($images as $k => $img) {
                $imageName = md5(microtime()) . '.jpg';
                if($img->saveAs($this->getFolder().$imageName)) {
                    $advImg = new AdvertImage();
                    $advImg->advert_id = $this->getPrimaryKey();
                    $advImg->image = $imageName;
                    $advImg->save();
                }
            }
        }
    }

    protected function getFolder() {
        $folder = Yii::getPathOfAlias('webroot') . '/uploads/' . $this->getPrimaryKey() . '/images/';
        if (is_dir($folder) == false)
            mkdir($folder, 0755, true);
        return $folder;
    }
}