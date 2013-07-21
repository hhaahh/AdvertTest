<?php
/* @var $this AdvertController */
/* @var $model Advert */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'advert-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => array(
            'enctype' => 'multipart/form-data'
        ),
    )); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'title'); ?>
        <?php echo $form->textField($model, 'title', array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'title'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'text'); ?>
        <?php echo $form->textArea($model, 'text', array('rows' => 6, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'text'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'main_image'); ?>
        <?php echo $form->fileField($model, 'main_image'); ?>
        <?php echo $form->error($model, 'main_image'); ?>
        <?php
        if(!$model->isNewRecord) {
            echo '<br/>'.CHtml::image($model->getImageUrl(), $model->title, array('style' => 'height: 200px'));
        }
        ?>
    </div>

    <div class="row">
        <?php
        echo $form->labelEx($model, 'images');
        $this->widget('CMultiFileUpload', array(
            'model' => $model,
            'attribute' => 'images',
            'accept' => 'jpg',
            'duplicate' => 'Этот файл уже выбран!',
            'denied' => 'Недопустимый тип файла',
        ));
        if ($model->advertImages) {
            $this->renderPartial('_imageGrid', array('model' => $model));
        }
        ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->