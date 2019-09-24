<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "workers".
 *
 * @property int $id
 * @property int $position_id
 * @property string $name
 * @property string $soname
 * @property string $characteristic
 * @property string $salary
 *
 * @property Position $position
 */
class Worker extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'workers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['position_id'], 'integer'],
            [['characteristic'], 'string'],
            [['salary'], 'number','max' => 10000000,'min'=>100],
            [['name', 'soname'], 'string', 'max' => 255],
            [['name', 'soname','salary','position_id'], 'required'],
            [['position_id'], 'exist', 'skipOnError' => true, 'targetClass' => Position::class, 'targetAttribute' => ['position_id' => 'id']],
            [
                ['name','soname','characteristic'],
                'filter',
                'filter' => function ($value) {
                    return trim(strip_tags($value));
                }
            ],
            [
                ['salary'],
                'filter',
                'filter' => function ($value) {
                    return abs($value);
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
            'position_id' => 'Position ID',
            'name' => 'Name',
            'soname' => 'Soname',
            'characteristic' => 'Characteristic',
            'salary' => 'Salary',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosition()
    {
        return $this->hasOne(Position::class, ['id' => 'position_id']);
    }

    public function getPositionName()
    {
        return $this->position->name;
    }
}
