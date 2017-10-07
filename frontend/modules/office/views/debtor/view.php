<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Debtor */

$this->title = Yii::t('app', 'Данные должника');    //$model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Должники'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="debtor-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (!Yii::$app->request->isAjax): ?>
    <p>
        <?= Html::a(Yii::t('app', 'Обновить'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Удалить'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Вы уверены что хотите удалить этот элемент?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?php endif; ?>

    <?php

    $ownershipTypeName = $model->ownershipType ? $model->ownershipType->name : Yii::t('app', '(не задано)');

    echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'phone',
            'LS_EIRC',
            //'LS_IKU_provider',
            [
                'label' => '№ личного счета',
                'value' => $model->LS_IKU_provider,
            ],
            'IKU',
            'space_common',
            'space_living',
            //'ownership_type_id',
            //'ownershipType.name',
            [                      // the owner name of the model
                'label' => 'Форма собственности',
                'value' => $ownershipTypeName,
            ],
            //'name_id',
            'name.first_name',
            'name.second_name',
            'name.patronymic',
            'name.full_name',
            'location_id',
        ],
    ]) ?>

</div>
