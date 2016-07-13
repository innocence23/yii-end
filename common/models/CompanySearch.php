<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Company;

/**
 * CompanySearch represents the model behind the search form about `common\models\Company`.
 */
class CompanySearch extends Company
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'mobile', 'add_user_id', 'updated_user_id'], 'integer'],
            [['title', 'phone', 'fax', 'image', 'sina', 'webchat', 'QQ', 'email', 'addr', 'copyright', 'created_at', 'updated_at', 'status', 'info'], 'safe'],
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
        $query = Company::find();

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
            'id' => $this->id,
            'mobile' => $this->mobile,
            'add_user_id' => $this->add_user_id,
            'updated_user_id' => $this->updated_user_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'fax', $this->fax])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'sina', $this->sina])
            ->andFilterWhere(['like', 'webchat', $this->webchat])
            ->andFilterWhere(['like', 'QQ', $this->QQ])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'addr', $this->addr])
            ->andFilterWhere(['like', 'copyright', $this->copyright])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'info', $this->info]);

        return $dataProvider;
    }
}
