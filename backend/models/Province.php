<?php

namespace backend\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "province".
 *
 * @property integer $id
 * @property string $name
 * @property integer $status
 * @property string $seo_title
 * @property string $seo_keyword
 * @property string $seo_desc
 * @property string $created_at
 * @property string $updated_at
 */
class Province extends ActiveRecord
{
    const STATUS_ENABLE      = 1;
    const STATUS_DISABLE     = 2;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'province';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'seo_title', 'seo_keyword', 'seo_desc'], 'required'],
            [['name'], 'unique'],
            [['name', 'seo_title'], 'trim'],
            [['status', 'created_at', 'updated_at'], 'integer'],
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
            'name' => 'Province',
            'status' => 'Status',
            'seo_title' => 'Seo Title',
            'seo_keyword' => 'Seo Keyword',
            'seo_desc' => 'Seo Description',
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
    
    // get province list
    public static function getProvinceList()
    {
        $data = self::find()->select(['id', 'name'])
                                ->where(['status' => 1])
                                ->orderBy(['name' => 'DESC'])
                                ->asArray()
                                ->all();
        
        $array[0] = 'Please Select the Province';
        foreach($data as $val){
            $array[$val['id']] = $val['name'];
        }

        return $array;
    }

    // get province name
    public static function getProvinceName($id)
    {
        if (($model = Province::findOne($id)) !== null) {
            return $model->name;
        } else {
            return '';
        }
    }

}
