<?php

namespace app\models\relatorios;

use Yii;
use yii\base\Model;


class Relatorios extends Model
{
    public $relat_ano;
    public $relat_mes;
    public $relat_unidade;
    public $relat_tema;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['relat_ano', 'relat_mes'], 'required'],
            [['relat_ano'], 'integer'],
            [['relat_unidade', 'relat_tema'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'relat_ano' => 'Ano',
            'relat_mes' => 'Mês',
            'relat_unidade' => 'Unidade',
            'relat_tema' => 'Tema',
        ];
    }
}
