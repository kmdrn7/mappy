<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Bangunan */

$this->title = 'Update Bangunan: ' . $model->id_bangunan;
$this->params['breadcrumbs'][] = ['label' => 'Bangunans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_bangunan, 'url' => ['view', 'id' => $model->id_bangunan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bangunan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
