<div class="modal-dialog">
    <?= CHtml::beginForm('', 'post', ['class' => 'form-horizontal']); ?>
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">
                <span aria-hidden="true">&times;</span><span class="sr-only">Закрыть</span>
            </button>
            <h4 class="modal-title">Тестовая форма</h4>
        </div>
        <div class="modal-body">
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
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
            <button type="button" class="btn btn-primary sendForm">Сохранить</button>
        </div>
    </div>
    <?= CHtml::endForm(); ?>
</div>