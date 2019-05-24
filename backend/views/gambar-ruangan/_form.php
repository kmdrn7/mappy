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

    <style>
        .geocoder {
            position:absolute;
            z-index:1;
            width:50%;
            left:50%;
            margin-left:-25%;
            top:10px;
        }

        .coordinates {
            background: rgba(0,0,0,0.5);
            color: #fff;
            position: absolute;
            bottom: 10px;
            left: 10px;
            padding:5px 10px;
            margin: 0;
            font-size: 11px;
            line-height: 18px;
            border-radius: 3px;
            display: none;
        }

        .mapboxgl-ctrl-geocoder { min-width:100%; }
    </style>

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

    <?php
        if ($model->gambar){
            $options = [
                'data-default-file' => '/images/gambar-ruangan/'.$model->gambar
            ];
        } else {
            $options = [
                'data-default-file' => '/images/ruangan.png'
            ];
        }
    ?>

    <?= $form->field($model, 'gambar')->widget(Dropify::className(), [
        'options' => $options
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
