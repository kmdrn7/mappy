<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\GambarRuangan */

$this->title = 'Create Gambar Ruangan';
$this->params['breadcrumbs'][] = ['label' => 'Gambar Ruangans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gambar-ruangan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
