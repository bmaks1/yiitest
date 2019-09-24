<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "positions".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 */
class Position extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'positions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['name','required'],

            [['description'], 'string'],
            [['name'], 'string', 'max' => 255],
            [
                ['name','description'],
                'filter',
                'filter' => function ($value) {
                    return trim(strip_tags($value));
                }
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorkers()
    {
        return $this->hasMany(Worker::class, ['position_id' => 'id']);
    }

}
