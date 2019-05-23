<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use AprSoft\Dropify\Dropify;

/* @var $this yii\web\View */
/* @var $model app\models\Bangunan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bangunan-form">

    <?php $form = ActiveForm::begin([
            'options' => [
                'enctype' => 'multipart/form-data'
            ]
        ]
    ); ?>

    <?= $form->field($model, 'bangunan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'deskripsi')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'gambar')->widget(Dropify::className(), [
        'options' => [
            'data-default-file' => 'images/bagunan/'.$model->gambar
        ]
    ]) ?>

    <?= $form->field($model, 'lat')->textInput() ?>

    <?= $form->field($model, 'long')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
