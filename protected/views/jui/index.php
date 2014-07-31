<a href="<?= $this->createUrl('getForm'); ?>" class="getJuiForm">Открыть модалку!</a>

<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id' => 'juiDialog',
    'options' => array(
        'title' => 'Тестовый CJuiDialog',
        'autoOpen' => false,
    ),
));
?>

<div id="dialog-body"></div>

<?php $this->endWidget('zii.widgets.jui.CJuiDialog'); ?>