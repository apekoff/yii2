<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Court */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Courts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="court-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'address',
            'district',
            'districtId',
            'city',
            'cityId',
            'street',
            'streetId',
            'building',
            'buildingId',
            'phone',
            'name_of_payee',
            'BIC',
            'beneficiary_account_number',
            'INN',
            'KPP',
            'OKTMO',
            'beneficiary_bank_name',
            'KBK',
        ],
    ]) ?>

</div>
