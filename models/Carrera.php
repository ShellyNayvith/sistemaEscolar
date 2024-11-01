<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "carrera".
 *
 * @property int $ID
 * @property string|null $Nombre
 * @property int|null $Fecha_creacion
 * @property int|null $Fecha_actualizacion
 * @property int|null $Fk_user
 *
 * @property Estudiante[] $estudiantes
 * @property User $fkUser
 */
class Carrera extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'carrera';
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
     * Gets query for [[Estudiantes]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\EstudianteQuery
     */
    public function getEstudiantes()
    {
        return $this->hasMany(Estudiante::class, ['Fk_carrera' => 'ID']);
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
     * {@inheritdoc}
     * @return \app\models\query\CarreraQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\CarreraQuery(get_called_class());
    }
}
