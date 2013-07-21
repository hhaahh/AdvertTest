<?php
/**
 * Class ImageUploadBehavior
 */
class ImageUploadBehavior extends CActiveRecordBehavior {
    public $imagePath = '';
    public $imageField = '';
    private $_logo;
    private $_old_logo;
    private $_fileName = null;

    public function beforeSave($event) {
        $this->_logo = CUploadedFile::getInstance($this->owner, $this->imageField);
        if ($this->_logo)
            $this->owner->{$this->imageField} = $this->getFileName() . '.jpg';
        else
            $this->owner->{$this->imageField} = $this->_old_logo;
    }

    public function afterSave($event) {
        $this->makeDefDir();

        if ($this->_logo) {
            $folder = $this->getFolderPath();
            $this->_logo->saveAs($folder . '/' . $this->getFileName() . '.jpg');
            /*Yii::app()->image->load($folder . '/' . $this->owner->{$this->imageField})->
                resize(300, 300, Image::WIDTH)->quality(80)->crop(300, 300)->
                save($folder . '/thumb_' . $this->owner->{$this->imageField});*/
            //$this->createWM($folder . '/' . $this->getFileName() . '.jpg');
        }
    }

    public function afterFind($event) {
        if (!$this->owner->isNewRecord)
            $this->_old_logo = $this->owner->{$this->imageField};
    }

    public function makeDefDir() {
        $folder = $this->getFolderPath();
        if (is_dir($folder) == false)
            mkdir($folder, 0755, true);
    }

    public function getFolderPath() {
        $folder = Yii::getPathOfAlias('webroot') . '/' . $this->imagePath . '/' . $this->owner->getPrimaryKey();
        return $folder;
    }

    // Генерируем случайное имя
    public function getFileName() {
        if($this->_fileName === null)
            $this->_fileName = md5(microtime());
        return $this->_fileName;
    }

    public function beforeDelete($event) {
        $this->deleteFile();
    }

    public function deleteFile() {
        $file = $this->getFolderPath() . '/' . $this->owner->{$this->imageField};
        if (file_exists($file) && !is_dir($file)) {
            unlink($file);
            $this->owner->{$this->imageField} = '';
        }
    }

    public function getImageUrl() {
        return $this->getBaseImagePath() . $this->owner->{$this->imageField};
    }

    public function getImageThumbUrl() {
        return $this->getBaseImagePath() . 'thumb_' . $this->owner->{$this->imageField};
    }

    private function getBaseImagePath() {
        $url = Yii::app()->baseUrl . '/' . $this->imagePath . '/' . $this->owner->getPrimaryKey() . '/';
        return $url;
    }

    public function createWM($image) {
        Yii::app()->ih
            ->load($image)
            ->watermark($_SERVER['DOCUMENT_ROOT'] . '/images/watermark.png', 10, 20, CImageHandler::CORNER_RIGHT_TOP)
            ->save($image);
    }
}