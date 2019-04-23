<?php

namespace app\models\apuracao;

use Yii;

/**
 * This is the model class for table "itens_apuracao_resultados".
 *
 * @property int $item_apure_id
 * @property string $item_apure_acaorealizada
 * @property string $item_apure_local
 * @property string $item_apure_datarealizacao
 * @property string $item_apure_motivo
 * @property string $item_apure_publico
 * @property int $item_apure_qntpessoas
 * @property string $item_apure_parceiros
 * @property string $item_apure_acaocomplementar
 * @property string $item_apure_src_arquivo
 * @property int $tema_id
 * @property int $apuracao_id
 *
 * @property TemaAtividade $tema
 * @property ApuracaoResultados $apuracao
 */
class ItensApuracaoResultados extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'itens_apuracao_resultados';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['item_apure_acaorealizada', 'item_apure_local', 'item_apure_datarealizacao', 'item_apure_motivo', 'item_apure_publico', 'item_apure_qntpessoas', 'tema_id'], 'required'],
            [['item_apure_acaorealizada', 'item_apure_local'], 'string'],
            [['tema_id', 'apuracao_id'], 'integer'],
            [['item_apure_datarealizacao', 'item_apure_motivo', 'item_apure_publico', 'item_apure_parceiros', 'item_apure_src_arquivo', 'item_apure_qntpessoas', 'item_apure_acaocomplementar'], 'string', 'max' => 255],
            [['tema_id'], 'exist', 'skipOnError' => true, 'targetClass' => TemaAtividade::className(), 'targetAttribute' => ['tema_id' => 'tema_id']],
            [['apuracao_id'], 'exist', 'skipOnError' => true, 'targetClass' => ApuracaoResultados::className(), 'targetAttribute' => ['apuracao_id' => 'apure_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'item_apure_id' => 'Cód.',
            'item_apure_acaorealizada' => 'O que foi realizado?',
            'item_apure_local' => 'Onde?',
            'item_apure_datarealizacao' => 'Quando?',
            'item_apure_motivo' => 'Por que?',
            'item_apure_publico' => 'Quem foi beneficiado?',
            'item_apure_qntpessoas' => 'Quantos?',
            'item_apure_parceiros' => 'Envolveu parceiros?',
            'item_apure_acaocomplementar' => 'Resultados complementares da ação',
            'item_apure_src_arquivo' => 'Src Arquivo',
            'tema_id' => 'Tema ID',
            'apuracao_id' => 'Apuracao ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTemaAtividade()
    {
        return $this->hasOne(TemaAtividade::className(), ['tema_id' => 'tema_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getApuracao()
    {
        return $this->hasOne(ApuracaoResultados::className(), ['apure_id' => 'apuracao_id']);
    }
}
