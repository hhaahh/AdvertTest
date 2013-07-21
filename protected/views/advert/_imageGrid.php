<?php
$images = new CActiveDataProvider('AdvertImage', array(
    'criteria' => array(
        'condition' => 'advert_id=' . $model->id,
    ),
    'pagination' => array(
        'pageSize' => 20,
    ),
));

$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'image-grid',
    'dataProvider' => $images,
    'template' => "{items}",
    'columns' => array(
        array(
            'header' => 'Изображение',
            'type' => 'raw',
            'value' => function ($data) {
                return CHtml::image($data->getImageUrl(), $data->image, array('style' => 'height: 100px;'));
            }
        ),
        array(
            'header' => 'Название',
            'filter' => false,
            'value' => function ($data) {
                return $data->image;
            }
        ),
        array(
            'class' => 'CButtonColumn',
            'template' => '{delete}',
            'deleteButtonUrl' => 'Yii::app()->createUrl("/advert/deleteImage", array("id" => $data->id))',
        ),
    ),
));