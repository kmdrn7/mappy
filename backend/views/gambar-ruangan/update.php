<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\GambarRuangan */

$this->title = 'Update Gambar Ruangan: ' . $model->id_gambar_ruangan;
$this->params['breadcrumbs'][] = ['label' => 'Gambar Ruangans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_gambar_ruangan, 'url' => ['view', 'id' => $model->id_gambar_ruangan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="gambar-ruangan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
