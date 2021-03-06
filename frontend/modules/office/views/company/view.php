<?php

/* @var $this yii\web\View */
/* @var $model common\models\info\Company */
/* @var $filesUploading array */
/* @var $filesUploadingHouses array */
/* @var $edit integer */

use yii\helpers\Html;
use kartik\tabs\TabsX;

$this->title = $model->full_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Организации'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-view hu-pane">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php

    $tabItems = [
        [
            'label' => '<i class="glyphicon glyphicon-list-alt"></i>' . Yii::t('app', 'Общие данные'),
            'content' => $this->render('view/_common_data', ['model' => $model, 'filesUploading' => $filesUploading, 'edit' => $edit]),
            'active' => true,
        ],
    ];
    if ($edit) {
        $tabItems = array_merge($tabItems, [
                [
                    'label' => '<i class="glyphicon glyphicon-folder-open"></i>' . Yii::t('app', 'Обслуживаемые дома'),
                    'content' => $this->render('view/_serviced_houses', ['model' => $model, 'filesUploadingHouses' => $filesUploadingHouses]),
                    //'active' => true,
                ],
                [
                    'label' => '<i class="glyphicon glyphicon-usd"></i>' . Yii::t('app', 'Отделы и должности'),
                    'content' => $this->render('view/_departments_and_positions', ['model' => $model]),
                    //'active' => true,
                ],
                [
                    'label' => '<i class="glyphicon glyphicon-usd"></i>' . Yii::t('app', 'Сотрудники'),
                    'content' => $this->render('view/_collaborators', ['model' => $model]),
                    //'active' => true,
                ],
            ]
        );
    }

    echo TabsX::widget([
        'items' => $tabItems,
        'position' => TabsX::POS_ABOVE,
        'encodeLabels' => false,
    ]);

    ?>

    <!--<p style="text-align: right">
        <? /*= Html::a(Yii::t('app', 'Удалить организацию'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Вы уверены что хотите удалить текущую организацию?'),
                'method' => 'post',
            ],
        ]) */ ?>
    </p>-->

</div>
