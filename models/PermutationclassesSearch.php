<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Permutationclasses;

/**
 * PermutationclassesSearch represents the model behind the search form about `app\models\Permutationclasses`.
 */
class PermutationclassesSearch extends Permutationclasses
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_permutation_class', 'permutation_name'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Permutationclasses::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_permutation_class' => $this->id_permutation_class,
            'permutation_name' => $this->permutation_name,
        ]);

        return $dataProvider;
    }
}
