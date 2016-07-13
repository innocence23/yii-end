<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "company".
 *
 * @property integer $id
 * @property string $title
 * @property string $phone
 * @property integer $mobile
 * @property string $fax
 * @property string $image
 * @property string $sina
 * @property string $webchat
 * @property string $QQ
 * @property string $email
 * @property string $addr
 * @property string $copyright
 * @property integer $add_user_id
 * @property integer $updated_user_id
 * @property string $created_at
 * @property string $updated_at
 * @property string $status
 * @property string $info
 */
class Company extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'company';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'phone', 'mobile', 'sina', 'webchat', 'QQ', 'email', 'addr', 'copyright', 'add_user_id', 'status'], 'required'],
            [['mobile', 'add_user_id', 'updated_user_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['status'], 'string'],
            [['title', 'copyright'], 'string', 'max' => 60],
            [['phone'], 'string', 'max' => 30],
            [['fax'], 'string', 'max' => 20],
            [['image'], 'string', 'max' => 100],
            [['sina', 'webchat', 'QQ', 'email', 'addr'], 'string', 'max' => 50],
            [['info'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'phone' => 'Phone',
            'mobile' => 'Mobile',
            'fax' => 'Fax',
            'image' => 'Image',
            'sina' => 'Sina',
            'webchat' => 'Webchat',
            'QQ' => 'Qq',
            'email' => 'Email',
            'addr' => 'Addr',
            'copyright' => 'Copyright',
            'add_user_id' => 'Add User ID',
            'updated_user_id' => 'Updated User ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Status',
            'info' => 'Info',
        ];
    }
}
