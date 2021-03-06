<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\Payment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="payment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'debtor_id')->textInput(['readonly' => true]) ?>

    <? /*= $form->field($model, 'payment_date')->textInput() */ ?>

    <div class="form-group">
        <label class="control-label" for="accrual-accrual_date-kvdate"><?= Yii::t('app', 'Дата операции') ?></label>
        <?php
        echo DatePicker::widget([
            'model' => $model,
            'attribute' => 'payment_date',
            'options' => ['placeholder' => Yii::t('app', 'Введите дату операции ...')],
            'pluginOptions' => [
                'autoclose' => true,
                'startView' => 'year',
                'minViewMode' => 'months',
                'format' => 'yyyy-mm',
            ]
        ]);
        ?>
    </div>

    <?= $form->field($model, 'amount')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Создать') : Yii::t('app', 'Обновить'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
