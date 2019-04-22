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
            [['item_apure_acaorealizada', 'item_apure_local', 'item_apure_datarealizacao', 'item_apure_motivo', 'item_apure_publico', 'item_apure_qntpessoas', 'tema_id', 'apuracao_id'], 'required'],
            [['item_apure_acaorealizada', 'item_apure_local'], 'string'],
            [['item_apure_qntpessoas', 'tema_id', 'apuracao_id'], 'integer'],
            [['item_apure_datarealizacao', 'item_apure_motivo', 'item_apure_publico', 'item_apure_parceiros', 'item_apure_src_arquivo'], 'string', 'max' => 255],
            [['item_apure_acaocomplementar'], 'string', 'max' => 45],
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
            'item_apure_id' => 'Item Apure ID',
            'item_apure_acaorealizada' => 'Item Apure Acaorealizada',
            'item_apure_local' => 'Item Apure Local',
            'item_apure_datarealizacao' => 'Item Apure Datarealizacao',
            'item_apure_motivo' => 'Item Apure Motivo',
            'item_apure_publico' => 'Item Apure Publico',
            'item_apure_qntpessoas' => 'Item Apure Qntpessoas',
            'item_apure_parceiros' => 'Item Apure Parceiros',
            'item_apure_acaocomplementar' => 'Item Apure Acaocomplementar',
            'item_apure_src_arquivo' => 'Item Apure Src Arquivo',
            'tema_id' => 'Tema ID',
            'apuracao_id' => 'Apuracao ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTema()
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
