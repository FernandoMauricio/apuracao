<?php

namespace app\models\apuracao;

use Yii;

/**
 * This is the model class for table "apuracao_resultados".
 *
 * @property int $apure_id
 * @property string $apure_mes
 * @property string $apure_unidade
 * @property string $apure_acaorealizada
 * @property string $apure_local
 * @property string $apure_datarealizacao
 * @property string $apure_motivo
 * @property string $apure_publico
 * @property int $apure_qntpessoas
 * @property string $apure_parceiros
 * @property string $apure_acaocomplementar
 * @property string $apure_src_arquivo
 * @property string $apure_usuariocriacao
 * @property string $apure_datacriacao
 * @property int $tema_id
 * @property int $situacao_id
 *
 * @property SituacaoApuracao $situacao
 * @property TemaAtividade $tema
 */
class ApuracaoResultados extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'apuracao_resultados';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['apure_mes', 'apure_unidade', 'apure_acaorealizada', 'apure_local', 'apure_datarealizacao', 'apure_motivo', 'apure_publico', 'apure_qntpessoas', 'apure_usuariocriacao', 'apure_datacriacao', 'tema_id', 'situacao_id'], 'required'],
            [['apure_acaorealizada', 'apure_local'], 'string'],
            [['apure_qntpessoas', 'tema_id', 'situacao_id'], 'integer'],
            [['apure_datacriacao'], 'safe'],
            [['apure_mes', 'apure_acaocomplementar', 'apure_usuariocriacao'], 'string', 'max' => 45],
            [['apure_unidade', 'apure_datarealizacao', 'apure_motivo', 'apure_publico', 'apure_parceiros', 'apure_src_arquivo'], 'string', 'max' => 255],
            [['situacao_id'], 'exist', 'skipOnError' => true, 'targetClass' => SituacaoApuracao::className(), 'targetAttribute' => ['situacao_id' => 'situap_id']],
            [['tema_id'], 'exist', 'skipOnError' => true, 'targetClass' => TemaAtividade::className(), 'targetAttribute' => ['tema_id' => 'tema_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'apure_id' => 'Cód.',
            'apure_mes' => 'Mês',
            'apure_unidade' => 'Unidade',
            'apure_acaorealizada' => 'O que foi realizado?',
            'apure_local' => 'Onde?',
            'apure_datarealizacao' => 'Quando?',
            'apure_motivo' => 'Por que?',
            'apure_publico' => 'Quem foi beneficiado?',
            'apure_qntpessoas' => 'Quantos?',
            'apure_parceiros' => 'Envolveu Parceiros?',
            'apure_acaocomplementar' => 'Resultados complementares da ação',
            'apure_src_arquivo' => 'Arquivo',
            'apure_usuariocriacao' => 'Usuário de Criação',
            'apure_datacriacao' => 'Data da Criação',
            'tema_id' => 'Tema',
            'situacao_id' => 'Situação',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSituacao()
    {
        return $this->hasOne(SituacaoApuracao::className(), ['situap_id' => 'situacao_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTema()
    {
        return $this->hasOne(TemaAtividade::className(), ['tema_id' => 'tema_id']);
    }
}
