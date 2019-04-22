<?php

namespace app\models\apuracao;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\apuracao\ItensApuracaoResultados;

/**
 * ItensApuracaoResultadosSearch represents the model behind the search form of `app\models\apuracao\ItensApuracaoResultados`.
 */
class ItensApuracaoResultadosSearch extends ItensApuracaoResultados
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['item_apure_id', 'item_apure_qntpessoas', 'tema_id', 'apuracao_id'], 'integer'],
            [['item_apure_acaorealizada', 'item_apure_local', 'item_apure_datarealizacao', 'item_apure_motivo', 'item_apure_publico', 'item_apure_parceiros', 'item_apure_acaocomplementar', 'item_apure_src_arquivo'], 'safe'],
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
        $query = ItensApuracaoResultados::find();

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
            'item_apure_id' => $this->item_apure_id,
            'item_apure_qntpessoas' => $this->item_apure_qntpessoas,
            'tema_id' => $this->tema_id,
            'apuracao_id' => $this->apuracao_id,
        ]);

        $query->andFilterWhere(['like', 'item_apure_acaorealizada', $this->item_apure_acaorealizada])
            ->andFilterWhere(['like', 'item_apure_local', $this->item_apure_local])
            ->andFilterWhere(['like', 'item_apure_datarealizacao', $this->item_apure_datarealizacao])
            ->andFilterWhere(['like', 'item_apure_motivo', $this->item_apure_motivo])
            ->andFilterWhere(['like', 'item_apure_publico', $this->item_apure_publico])
            ->andFilterWhere(['like', 'item_apure_parceiros', $this->item_apure_parceiros])
            ->andFilterWhere(['like', 'item_apure_acaocomplementar', $this->item_apure_acaocomplementar])
            ->andFilterWhere(['like', 'item_apure_src_arquivo', $this->item_apure_src_arquivo]);

        return $dataProvider;
    }
}
