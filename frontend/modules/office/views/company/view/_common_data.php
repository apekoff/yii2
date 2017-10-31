<?php

/* @var $this yii\web\View */
/* @var $model common\models\info\Company */
/* @var $filesUploading array */
/* @var $edit integer */

use kartik\detail\DetailView;
use common\models\info\CompanyType;
use kartik\helpers\Html;
use yii\helpers\ArrayHelper;
use common\models\info\OKOPF;
use common\models\info\TaxSystem;
use common\models\Location;
use yii\bootstrap\Modal;
use yii\helpers\Url;

$attributes = [
    [
        'group' => true,
        'label' => Yii::t('app', 'Название'),
        'rowOptions' => ['class' => 'info'],
    ],
    'full_name',
    'short_name',
    [
        'group' => true,
        'label' => Yii::t('app', 'Деятельность'),
        'rowOptions' => ['class' => 'info'],
    ],
    [
        'attribute' => 'company_type_id',
        'label' => Yii::t('app', 'Тип организации'),
        'value' => $model->companyType->name,
        //'format'=>['decimal', 2],
        //'inputContainer' => ['class' => 'col-sm-6'],
        'format' => 'raw',
        'type' => DetailView::INPUT_SELECT2,
        'widgetOptions' => [
            'data' => ArrayHelper::map(CompanyType::find()->asArray()->all(), 'id', 'name'),
            'options' => ['placeholder' => Yii::t('app', 'Выберите тип ...')],
            //'pluginOptions' => ['allowClear' => true, 'width' => '100%'],
        ],
        //'valueColOptions' => ['style' => 'width:30%']
    ],
    [
        'attribute' => 'OKOPF_id',
        'label' => Yii::t('app', 'ОКОПФ'),
        'value' => $model->oKOPF ? $model->oKOPF->name : '-',
        'format' => 'raw',
        'type' => DetailView::INPUT_SELECT2,
        'widgetOptions' => [
            'data' => ArrayHelper::map(OKOPF::find()->asArray()->all(), 'id', 'name'),
            'options' => ['placeholder' => Yii::t('app', 'Выберите ОКОПФ ...')],
            'pluginOptions' => ['allowClear' => true],
        ],
    ],
    [
        'attribute' => 'tax_system_id',
        'label' => Yii::t('app', 'Система налогообложения'),
        'value' => $model->taxSystem->name,
        'format' => 'raw',
        'type' => DetailView::INPUT_SELECT2,
        'widgetOptions' => [
            'data' => ArrayHelper::map(TaxSystem::find()->asArray()->all(), 'id', 'name'),
            'options' => ['placeholder' => Yii::t('app', 'Выберите систему ...')],
        ],
    ],
    [
        'group' => true,
        'label' => Yii::t('app', 'Контакты'),
        'rowOptions' => ['class' => 'info'],
    ],
    'phone',
    'fax',
    'email:email',
    'site',
    [
        'group' => true,
        'label' => Yii::t('app', 'Исполнительный директор'),
        'rowOptions' => ['class' => 'info'],
    ],
    [
        'columns' => [
            [
                'attribute' => 'CEO_last_name',
                'label' => Yii::t('app', 'Фамилия'),
                'value' => $model->cEO ? $model->cEO->second_name : '',
                'valueColOptions' => ['style' => 'width:13.3%'],
                //'format' => 'raw',
            ],
            [
                'attribute' => 'CEO_first_name',
                'label' => Yii::t('app', 'Имя'),
                'value' => $model->cEO ? $model->cEO->first_name : '',
                'valueColOptions' => ['style' => 'width:13.3%'],
                //'format' => 'raw',
            ],
            [
                'attribute' => 'CEO_patronymic',
                'label' => Yii::t('app', 'Отчество'),
                'value' => $model->cEO ? $model->cEO->patronymic : $model->cEO,
                'valueColOptions' => ['style' => 'width:13.3%'],
                //'format' => 'raw',
            ],
        ],
    ],
    [
        'group' => true,
        'label' => Yii::t('app', 'Адреса'),
        'rowOptions' => ['class' => 'info'],
    ],
    [
        //'attribute' => 'legal_address_location_id',
        'attribute' => 'legalAddressLocation',
        'label' => Yii::t('app', 'Юридический адрес'),
        'value' => $model->legalAddressLocation ? $model->legalAddressLocation->createFullAddress() : '',   //'<button>Изменить</button>',
        'type' => DetailView::INPUT_TEXT,
        'options' => [
            'readonly' => 'readonly',
        ],
    ],
    [
        'attribute' => 'actual_address_location_id',
        'label' => Yii::t('app', 'Фактический адрес'),
        'format' => 'raw',
        'type' => DetailView::INPUT_TEXT,
        'widgetOptions' => [
            'data' => $model->actualAddressLocation ? $model->actualAddressLocation->createFullAddress() : '',
        ],
    ],
    [
        'attribute' => 'postal_address_location_id',
        'label' => Yii::t('app', 'Почтовый адрес'),
        'format' => 'raw',
        'type' => DetailView::INPUT_TEXT,
        'widgetOptions' => [
            'data' => $model->postalAddressLocation ? $model->postalAddressLocation->createFullAddress() : '',
        ],
    ],
    [
        'group' => true,
        'label' => Yii::t('app', 'Реквизиты'),
        'rowOptions' => ['class' => 'info'],
    ],
    'INN',
    'KPP',
    'OGRN',
    /*[
        'attribute' => 'OGRN',
        'label' => 'ОГРН',
    ],*/
    'checking_account',
    'BIK',
    'full_bank_name',
    'correspondent_account',
    [
        'attribute' => 'company_files',
        'label' => Yii::t('app', 'Файлы ЕГРЮЛ'),
        'value' => $filesUploading['companyFilesNames'],
        'type' => DetailView::INPUT_FILEINPUT,
        'widgetOptions' => $filesUploading['fileUploadConfig'],
    ],
    /*[
        'group' => true,
        'label' => Yii::t('app', 'ОГРН / ОГРНИП'),
        'rowOptions' => ['class' => 'info'],
    ],
    [
        'attribute' => 'OGRN_IP_type',
        'label' => Yii::t('app', 'Тип'),
        'format' => 'raw',
        'type' => DetailView::INPUT_RADIO_BUTTON_GROUP,
        'items' => [0 => 'ОГРН', 1 => 'ОГРНИП'],
    ],
    [
        'attribute' => 'OGRN_IP_number',
        'label' => Yii::t('app', 'Номер'),
    ],
    [
        'attribute' => 'OGRN_IP_date',
        'label' => Yii::t('app', 'Дата регистрации'),
        'format' => 'date',
        'type' => DetailView::INPUT_DATE,
        'widgetOptions' => [
            'pluginOptions' => ['format' => 'yyyy-mm-dd']
        ],
        //'valueColOptions' => ['style' => 'width:30%']
    ],
    [
        'attribute' => 'OGRN_IP_registered_company',
        'label' => Yii::t('app', 'Наименование зарегистрировавшей организации'),
    ],*/
    //'BIK',
    //'OGRN',
    //'checking_account',
    //'correspondent_account',
    //'full_bank_name',
    //'CEO',
    //'operates_on_the_basis_of',

];

echo DetailView::widget([
    'model' => $model,
    'attributes' => $attributes,
    'mode' => !$edit ? DetailView::MODE_EDIT : DetailView::MODE_VIEW,
    'bordered' => true,
    'striped' => false,
    'condensed' => false,
    'responsive' => true,
    'hover' => true,
    'hAlign' => 'left',
    'vAlign' => 'middle',
    'panel' => [
        'heading' => 'Общие данные организации',
        'type' => DetailView::TYPE_INFO,
    ],
    //'buttons1' => '{update}',
    'container' => ['id' => 'company-common-data'],
]);

$locationUrl = Url::to(['/office/location/update', 'id' => $model->legal_address_location_id]);

$this->registerJs(<<<JS
$("#company-legal_address_location_id").click(function(e) {
  e.preventDefault();
  var pModal = $('#pModal-company-legal_address_location_id');
  pModal.find('.modal-content').html('<div style="text-align: center"><img src="/img/loading.gif" alt="Загрузка..." style="margin:1em"></div>');
  //pModal.modal('show').find('.modal-content').load($(this).attr('href'));
  pModal.modal('show').find('.modal-content').load('$locationUrl');
});
JS
);

$this->registerCss('.modal-content {padding: 1em;}');

Modal::begin([
    'id' => 'pModal-company-legal_address_location_id',
    'size' => 'modal-lg',
]);
Modal::end();
