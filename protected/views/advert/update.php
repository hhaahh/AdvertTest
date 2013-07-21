
<?php
/* @var $this AdvertController */
/* @var $model Advert */

$this->breadcrumbs=array(
    'Adverts'=>array('admin'),
    $model->title=>array('view','id'=>$model->id),
    'Update',
);

$this->menu=array(
    array('label'=>'Create Advert', 'url'=>array('create')),
    array('label'=>'View Advert', 'url'=>array('view', 'id'=>$model->id)),
    array('label'=>'Manage Advert', 'url'=>array('admin')),
);
?>

<h1>Update Advert <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>