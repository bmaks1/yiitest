<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Worker;
use frontend\models\Position;

/**
 * WorkerSearch represents the model behind the search form of `frontend\models\Worker`.
 */
class WorkerSearch extends Worker
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'position_id'], 'integer'],
            [['name', 'soname', 'characteristic'], 'string'],
            [['salary'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Worker::find()
                ->from(self::tableName().' w')
                ->innerJoin(Position::tableName().' p','position_id = p.id');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $dataProvider->setSort([
            'attributes' => [
                'id',
                'name',
                'soname',
                'characteristic',
                'salary',
                'positionName' => [
                    'asc' => ['p.name' => SORT_ASC],
                    'desc' => ['p.name' => SORT_DESC ],
                    'label' => 'p.name',
                    'default' => SORT_ASC
                ],

            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'w.id' => $this->id,
            'w.position_id' => $this->position_id,
            'w.salary' => $this->salary,
        ]);

        $query->andFilterWhere(['like', 'w.name', $this->name])
            ->andFilterWhere(['like', 'w.soname', $this->soname])
            ->andFilterWhere(['like', 'w.characteristic', $this->characteristic]);

        return $dataProvider;
    }
}
