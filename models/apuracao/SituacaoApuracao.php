<?php

namespace app\models\apuracao;

use Yii;

/**
 * This is the model class for table "situacao_apuracao".
 *
 * @property int $situap_id
 * @property string $situap_descricao
 *
 * @property ApuracaoResultados[] $apuracaoResultados
 */
class SituacaoApuracao extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'situacao_apuracao';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['situap_descricao'], 'required'],
            [['situap_descricao'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'situap_id' => 'Situap ID',
            'situap_descricao' => 'Situap Descricao',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getApuracaoResultados()
    {
        return $this->hasMany(ApuracaoResultados::className(), ['situacao_id' => 'situap_id']);
    }
}
