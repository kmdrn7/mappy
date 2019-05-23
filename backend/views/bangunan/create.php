<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Bangunan */

$this->title = 'Create Bangunan';
$this->params['breadcrumbs'][] = ['label' => 'Bangunans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bangunan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
