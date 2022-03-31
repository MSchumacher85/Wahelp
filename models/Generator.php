<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "generator".
 *
 * @property int $id
 * @property int|null $generate_key Сгенерированное число
 * @property string $created_at Дата создания ключа
 */
class Generator extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'generator';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['generate_key'], 'integer'],
            [['generate_key'], 'required'],
            [['created_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'generate_key' => 'Сгенерированное число',
            'created_at' => 'Дата создания ключа',
        ];
    }
}
