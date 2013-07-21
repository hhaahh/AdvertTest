<?php
/* @var $this AdvertController */
/* @var $model Advert */

$this->breadcrumbs = array(
    'Manage',
);

$this->menu = array(
    array('label' => 'Create Advert', 'url' => array('create')),
);
?>

    <h1>Управление объявлениями</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'advert-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array(
            'name' => 'main_image',
            'type' => 'raw',
            'filter' => false,
            'value' => function($data) {
                return CHtml::image($data->getImageUrl(), $data->title, array('style' => 'height: 100px;'));
            }
        ),
        'title',
        'text',
        'created_date',
        array(
            'class' => 'CButtonColumn',
        ),
    ),
)); ?>