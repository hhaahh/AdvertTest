<?= CHtml::beginForm('', 'post', ['class' => 'form-horizontal']); ?>
    <div class="form-group">
        <?= CHtml::label('Имя', 'firstName', ['class' => 'col-sm-2 control-label']); ?>
        <div class="col-sm-10">
            <?= CHtml::textField('firstName', '', ['class' => 'form-control', 'placeholder' => 'Имя']); ?>
        </div>
    </div>
    <div class="form-group">
        <?= CHtml::label('Фамилия', 'lastName', ['class' => 'col-sm-2 control-label']); ?>
        <div class="col-sm-10">
            <?= CHtml::textField('lastName', '', ['class' => 'form-control', 'placeholder' => 'Фамилия']); ?>
        </div>
    </div>
    <div class="form-group">
        <button type="button" class="btn btn-default">Закрыть</button>
        <button type="button" class="btn btn-primary sendJuiForm">Сохранить</button>
    </div>
<?= CHtml::endForm(); ?>