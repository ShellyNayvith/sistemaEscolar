<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "coodinacion".
 *
 * @property int $ID
 * @property string|null $Nombre
 * @property int|null $Fecha_creacion
 * @property int|null $Fecha_actualizacion
 * @property int|null $Fk_user
 *
 * @property User $fkUser
 * @property Profesor[] $profesors
 */
class Coodinacion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'coodinacion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Fecha_creacion', 'Fecha_actualizacion', 'Fk_user'], 'integer'],
            [['Nombre'], 'string', 'max' => 255],
            [['Fk_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['Fk_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'Nombre' => 'Nombre',
            'Fecha_creacion' => 'Fecha Creacion',
            'Fecha_actualizacion' => 'Fecha Actualizacion',
            'Fk_user' => 'Fk User',
        ];
    }

    /**
     * Gets query for [[FkUser]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\UserQuery
     */
    public function getFkUser()
    {
        return $this->hasOne(User::class, ['id' => 'Fk_user']);
    }

    /**
     * Gets query for [[Profesors]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\ProfesorQuery
     */
    public function getProfesors()
    {
        return $this->hasMany(Profesor::class, ['Fk_coordinacion' => 'ID']);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\query\CoodinacionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\CoodinacionQuery(get_called_class());
    }
}
