
<?php
/* @var $this AdvertController */
/* @var $model Advert */

$this->breadcrumbs=array(
    'Adverts'=>array('admin'),
    $model->title,
);

$this->menu=array(
    array('label'=>'Create Advert', 'url'=>array('create')),
    array('label'=>'Update Advert', 'url'=>array('update', 'id'=>$model->id)),
    array('label'=>'Delete Advert', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
    array('label'=>'Manage Advert', 'url'=>array('admin')),
);
?>

<h1>View Advert #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
    'data'=>$model,
    'attributes'=>array(
        'id',
        'title',
        'text',
        'main_image',
        'created_date',
    ),
)); ?>