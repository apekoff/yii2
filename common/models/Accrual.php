<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "accrual".
 *
 * @property integer $id
 * @property integer $debtor_id
 * @property string $accrual_date
 * @property string $accrual
 * @property string $single
 * @property string $additional_adjustment
 * @property string $subsidies
 *
 * @property Debtor $debtor
 */
class Accrual extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'accrual';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['debtor_id'], 'integer'],
            [['accrual_date'], 'safe'],
            [['accrual', 'single', 'additional_adjustment', 'subsidies'], 'number'],
            [['debtor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Debtor::className(), 'targetAttribute' => ['debtor_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'debtor_id' => Yii::t('app', 'Debtor ID'),
            'accrual_date' => Yii::t('app', 'Дата начисления'),
            'accrual' => Yii::t('app', 'Начислено'),
            'single' => Yii::t('app', 'Разовые'),
            'additional_adjustment' => Yii::t('app', 'Доп. корректировка'),
            'subsidies' => Yii::t('app', 'Субсидии'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDebtor()
    {
        return $this->hasOne(Debtor::className(), ['id' => 'debtor_id'])->inverseOf('accruals');
    }

    /**
     * @inheritdoc
     * @return AccrualQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AccrualQuery(get_called_class());
    }
}
