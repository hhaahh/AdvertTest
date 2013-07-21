<?php
/* @var $this AdvertController */
/* @var $model Advert */

$this->breadcrumbs=array(
    'Adverts'=>array('admin'),
    'Create',
);

$this->menu=array(
    array('label'=>'Manage Advert', 'url'=>array('admin')),
);
?>

    <h1>Create Advert</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>