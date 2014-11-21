<?php

namespace backend\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "tips".
 *
 * @property integer $id
 * @property integer $tips_class_id
 * @property string $title
 * @property string $intro
 * @property string $content
 * @property string $keyword
 * @property integer $status
 * @property string $created_at
 * @property string $updated_at
 */
class Tips extends ActiveRecord
{
    const STATUS_ENABLE      = 1;
    const STATUS_DISABLE     = 2;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tips';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tips_class_id', 'title', 'intro', 'content', 'keyword'], 'required'],
            [['tips_class_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['intro', 'content'], 'string'],
            [['title', 'keyword'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tips_class_id' => 'Tips Class',
            'title' => 'Title',
            'intro' => 'Intro',
            'content' => 'Content',
            'keyword' => 'Keyword',
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
