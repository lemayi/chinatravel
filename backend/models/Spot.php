<?php

namespace backend\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "spot".
 *
 * @property integer $id
 * @property integer $province_id
 * @property integer $city_id
 * @property integer $town_id
 * @property integer $location_id
 * @property integer $status
 * @property string $seo_title
 * @property string $seo_keyword
 * @property string $seo_desc
 * @property string $created_at
 * @property string $updated_at
 */
class Spot extends ActiveRecord
{
    const STATUS_ENABLE      = 1;
    const STATUS_DISABLE     = 2;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'spot';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['province_id', 'city_id', 'town_id', 'location_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['seo_title', 'seo_keyword', 'seo_desc', 'created_at', 'updated_at'], 'required'],
            [['seo_desc'], 'string'],
            [['seo_title', 'seo_keyword'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'province_id' => 'Province ID',
            'city_id' => 'City ID',
            'town_id' => 'Town ID',
            'location_id' => 'Location ID',
            'status' => 'Status',
            'seo_title' => 'Seo Title',
            'seo_keyword' => 'Seo Keyword',
            'seo_desc' => 'Seo Desc',
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
    public static function getStatusArray(){
        return [
            self::STATUS_ENABLE    => 'Enable',
            self::STATUS_DISABLE   => 'Disable'
        ];
    }

    // status array
    public static function getStatusById($status){
        switch($status){
            case self::STATUS_ENABLE: 
                return 'Enable';
            case self::STATUS_DISABLE:
                return 'Disable';
        }
    }
}
