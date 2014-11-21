<?php

namespace backend\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "tips_class".
 *
 * @property integer $id
 * @property integer $province_id
 * @property integer $city_id
 * @property integer $town_id
 * @property integer $location_id
 * @property integer $spot_id
 * @property string $name
 * @property integer $status
 * @property integer $created_at
 * @property string $updated_at
 */
class TipsClass extends ActiveRecord
{
    const STATUS_ENABLE      = 1;
    const STATUS_DISABLE     = 2;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tips_class';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['province_id', 'city_id', 'town_id', 'location_id', 'spot_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['name', 'status'], 'required'],
            [['name'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'province_id' => 'Province',
            'city_id' => 'City',
            'town_id' => 'Town',
            'location_id' => 'Location',
            'spot_id' => 'Spot',
            'name' => 'Name',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    // status array
    public static function getStatusArray()
    {
        return [
            self::STATUS_ENABLE    => 'Enable',
            self::STATUS_DISABLE   => 'Disable'
        ];
    }
}
