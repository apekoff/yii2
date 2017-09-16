<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\info\IndividualEntrepreneur */
/* @var $form ActiveForm */
?>
<div class="frontend-views-manager-individual_entrepreneur">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'user_info_id') ?>
        <?= $form->field($model, 'full_name') ?>
        <?= $form->field($model, 'OGRN') ?>
        <?= $form->field($model, 'INN') ?>
        <?= $form->field($model, 'BIC') ?>
        <?= $form->field($model, 'checking_account_num') ?>
    
        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- frontend-views-manager-individual_entrepreneur -->
