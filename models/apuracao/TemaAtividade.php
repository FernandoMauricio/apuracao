<?php

namespace app\models\apuracao;

use Yii;

/**
 * This is the model class for table "tema_atividade".
 *
 * @property int $tema_id
 * @property string $tema_descricao
 * @property string $tema_status
 *
 * @property ApuracaoResultados[] $apuracaoResultados
 */
class TemaAtividade extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tema_atividade';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tema_descricao'], 'required'],
            [['tema_descricao'], 'string', 'max' => 255],
            [['tema_status'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'tema_id' => 'Tema ID',
            'tema_descricao' => 'Tema Descricao',
            'tema_status' => 'Tema Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getApuracaoResultados()
    {
        return $this->hasMany(ApuracaoResultados::className(), ['tema_id' => 'tema_id']);
    }
}
