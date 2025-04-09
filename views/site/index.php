<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use \yii\helpers\Url;

/** @var yii\web\View $this */

$this->title = 'Конвертер';
?>
    <div class="site-index">

        <div class="jumbotron text-center bg-transparent mt-5 mb-5">
            <h1>Конвертер URL в QR и короткую ссылку</h1>

            <?php $form = ActiveForm::begin([
                'id' => 'url-form',
                'options' => ['class' => 'form-inline'],
                'action' => Url::to(['site/create-link']),
                'enableAjaxValidation' => true,
            ]); ?>

            <?= $form->field($model, 'url')->textInput(['placeholder' => 'Введите URL-ссылку'])->label(false) ?>

            <div class="form-group">
                <?= Html::submitButton('ОК', ['class' => 'btn btn-primary', 'id' => 'submit-btn']) ?>
            </div>

            <?php ActiveForm::end(); ?>
            <div class="loader hide">
                <div class="lds-spinner">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
            <div id="result"></div>

        </div>

        <div class="body-content">


        </div>
    </div>
<?php
$script = <<< JS
    $('#url-form').on('beforeSubmit', function(e) {
        var form = $(this);
        
        $('.loader').removeClass('hide');
        $.ajax({
            url: form.attr('action'),
            type: 'POST',
            data: form.serialize(),
            success: function(response) {
                $('.loader').addClass('hide');
                if (response.status == 'success') {
                    $('#result').html('<h3>QR-код:</h3><img src="' + response.qrCode + '" alt="QR код"><br><h4>Короткая ссылка: <a href="' + response.shortUrl + '">' + response.shortUrl + '</a></h4>');
                } else {
                    $('#result').html('<div class="alert alert-danger">Ошибка: ' + response.message + '</div>');
                }
            }
        });
        return false;  // предотвращаем отправку формы
    });
JS;
$this->registerJs($script);
?>