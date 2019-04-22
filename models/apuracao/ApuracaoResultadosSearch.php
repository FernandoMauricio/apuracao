<?php

namespace app\models\apuracao;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\apuracao\ApuracaoResultados;

/**
 * ApuracaoResultadosSearch represents the model behind the search form of `app\models\apuracao\ApuracaoResultados`.
 */
class ApuracaoResultadosSearch extends ApuracaoResultados
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['apure_id', 'apure_qntpessoas', 'tema_id', 'situacao_id'], 'integer'],
            [['apure_mes', 'apure_unidade', 'apure_acaorealizada', 'apure_local', 'apure_datarealizacao', 'apure_motivo', 'apure_publico', 'apure_parceiros', 'apure_acaocomplementar', 'apure_src_arquivo', 'apure_usuariocriacao', 'apure_datacriacao'], 'safe'],
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
        $query = ApuracaoResultados::find();

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
            'apure_id' => $this->apure_id,
            'apure_qntpessoas' => $this->apure_qntpessoas,
            'apure_datacriacao' => $this->apure_datacriacao,
            'tema_id' => $this->tema_id,
            'situacao_id' => $this->situacao_id,
        ]);

        $query->andFilterWhere(['like', 'apure_mes', $this->apure_mes])
            ->andFilterWhere(['like', 'apure_unidade', $this->apure_unidade])
            ->andFilterWhere(['like', 'apure_acaorealizada', $this->apure_acaorealizada])
            ->andFilterWhere(['like', 'apure_local', $this->apure_local])
            ->andFilterWhere(['like', 'apure_datarealizacao', $this->apure_datarealizacao])
            ->andFilterWhere(['like', 'apure_motivo', $this->apure_motivo])
            ->andFilterWhere(['like', 'apure_publico', $this->apure_publico])
            ->andFilterWhere(['like', 'apure_parceiros', $this->apure_parceiros])
            ->andFilterWhere(['like', 'apure_acaocomplementar', $this->apure_acaocomplementar])
            ->andFilterWhere(['like', 'apure_src_arquivo', $this->apure_src_arquivo])
            ->andFilterWhere(['like', 'apure_usuariocriacao', $this->apure_usuariocriacao]);

        return $dataProvider;
    }
}
