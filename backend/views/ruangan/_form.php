<?php

use backend\models\Bangunan;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model backend\models\Ruangan */
/* @var $form yii\widgets\ActiveForm */

$bangunan = Bangunan::find()->all();
$bangunan = ArrayHelper::map($bangunan, 'id_bangunan', 'bangunan');

?>

<div class="ruangan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_bangunan')->widget(Select2::classname(), [
        'data' => $bangunan,
        'language' => 'en',
        'options' => ['placeholder' => 'Pilih bangunan ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'ruangan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'deskripsi')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'lat')->textInput() ?>

    <?= $form->field($model, 'long')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
