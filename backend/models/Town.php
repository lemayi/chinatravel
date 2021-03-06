<?php

namespace backend\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "town".
 *
 * @property integer $id
 * @property integer $province_id
 * @property integer $city_id
 * @property string $name
 * @property integer $status
 * @property string $seo_title
 * @property string $seo_keyword
 * @property string $seo_desc
 * @property string $created_at
 * @property string $updated_at
 */
class Town extends ActiveRecord
{
    const STATUS_ENABLE      = 1;
    const STATUS_DISABLE     = 2;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'town';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['province_id', 'city_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['name', 'province_id', 'city_id', 'seo_title', 'seo_keyword', 'seo_desc'], 'required'],
            [['seo_desc'], 'string'],
            [['name', 'seo_title', 'seo_keyword'], 'string', 'max' => 255]
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
            'name' => 'Name',
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

    // get town list by city id
    public static function getTownList($cityId)
    {
        $data =  self::find()->select(['id', 'name'])
                        ->where(['status' => 1, 'city_id' => $cityId])
                        ->orderBy(['name' => 'DESC'])
                        ->asArray()
                        ->all();
        $array[0] = 'Please Select the Town';
        foreach($data as $val){
            $array[$val['id']] = $val['name'];
        }

        return $array;
    }
}
