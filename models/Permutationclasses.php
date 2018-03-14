<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "permutation_classes".
 *
 * @property integer $id_permutation_class
 * @property integer $permutation_name
 *
 * @property Logicalfunction[] $logicalfunctions
 * @property Sequences[] $sequences
 */
class Permutationclasses extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'permutation_classes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_permutation_class', 'permutation_name'], 'required'],
            [['id_permutation_class', 'permutation_name'], 'integer'],
            [['id_permutation_class'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_permutation_class' => Yii::t('app', 'Id Permutation Class'),
            'permutation_name' => Yii::t('app', 'Permutation Name'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLogicalFunctions()
    {
        return $this->hasMany(LogicalFunction::className(), ['	id_permutation_class' => 'id_permutation_class']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSequences()
    {
        return $this->hasMany(Sequences::className(), ['id_permutation_class' => 'id_permutation_class']);
    }
}
