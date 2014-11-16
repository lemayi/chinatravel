<?php

namespace backend\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "city".
 *
 * @property integer $id
 * @property integer $province_id
 * @property string $name
 * @property integer $status
 * @property string $seo_title
 * @property string $seo_keyword
 * @property string $seo_desc
 * @property string $created_at
 * @property string $updated_at
 */
class City extends ActiveRecord
{
    const STATUS_ENABLE      = 1;
    const STATUS_DISABLE     = 2;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'city';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['province_id', 'status'], 'integer'],
            [['name', 'province_id', 'seo_title', 'seo_keyword', 'seo_desc'], 'required'],
            [['seo_desc'], 'string'],
            [['name', 'seo_title', 'seo_keyword'], 'string', 'max' => 255],
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
            'name' => 'Name',
            'status' => 'Status',
            'seo_title' => 'Seo Title',
            'seo_keyword' => 'Seo Keyword',
            'seo_desc' => 'Seo Description',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        return array(
            'province' => array(self::BELONGS_TO, 'Province', 'province_id'),
        );
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

    // status array
    public static function getStatusById($status)
    {
        switch($status){
            case self::STATUS_ENABLE: 
                return 'Enable';
            case self::STATUS_DISABLE:
                return 'Disable';
        }
    }

    // get city list by provinceId
    public static function getCityList($provinceId)
    {
        return self::find()->select(['id', 'name'])
                        ->where(['status' => 1, 'province_id' => $provinceId])
                        ->orderBy(['name' => 'DESC'])
                        ->asArray()
                        ->all();
    }

    // get default city option
    public static function getDefaultCityOption($id)
    {
        $city = self::findOne($id);

        if(empty($city))    return ['0' => 'Please Choose Province'];
        
        return [$id => $city->name];
    }

}
