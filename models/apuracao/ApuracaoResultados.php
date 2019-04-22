<?php

namespace app\models\apuracao;

use Yii;

/**
 * This is the model class for table "apuracao_resultados".
 *
 * @property int $apure_id
 * @property string $apure_mes
 * @property string $apure_unidade
 * @property string $apure_usuariocriacao
 * @property string $apure_datacriacao
 * @property int $situapuracao_id
 *
 * @property SituacaoApuracao $situapuracao
 * @property ItensApuracaoResultados[] $itensApuracaoResultados
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
            [['apure_mes', 'apure_unidade', 'apure_usuariocriacao', 'apure_datacriacao', 'situapuracao_id'], 'required'],
            [['situapuracao_id'], 'integer'],
            [['apure_mes', 'apure_usuariocriacao', 'apure_datacriacao'], 'string', 'max' => 45],
            [['apure_unidade'], 'string', 'max' => 255],
            [['situapuracao_id'], 'exist', 'skipOnError' => true, 'targetClass' => SituacaoApuracao::className(), 'targetAttribute' => ['situapuracao_id' => 'situap_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'apure_id' => 'Apure ID',
            'apure_mes' => 'Apure Mes',
            'apure_unidade' => 'Apure Unidade',
            'apure_usuariocriacao' => 'Apure Usuariocriacao',
            'apure_datacriacao' => 'Apure Datacriacao',
            'situapuracao_id' => 'Situapuracao ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSituapuracao()
    {
        return $this->hasOne(SituacaoApuracao::className(), ['situap_id' => 'situapuracao_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItensApuracaoResultados()
    {
        return $this->hasMany(ItensApuracaoResultados::className(), ['apuracao_id' => 'apure_id']);
    }
}
