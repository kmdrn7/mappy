<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Ruangan;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use AprSoft\Dropify\Dropify;

/* @var $this yii\web\View */
/* @var $model backend\models\GambarRuangan */
/* @var $form yii\widgets\ActiveForm */

$ruangan = Ruangan::find()->all();
$ruangan = ArrayHelper::map($ruangan, 'id_ruangan', 'ruangan');

?>

<div class="gambar-ruangan-form">

    <?php $form = ActiveForm::begin([
            'options' => [
                'enctype' => 'multipart/form-data'
            ]
        ]
    ); ?>

    <?= $form->field($model, 'id_ruangan')->widget(Select2::classname(), [
        'data' => $ruangan,
        'language' => 'en',
        'options' => ['placeholder' => 'Pilih ruangan ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'gambar')->widget(Dropify::className(), [
        'options' => [
            'data-default-file' => 'images/gambar-ruangan/'.$model->gambar
        ]
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
