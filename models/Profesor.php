<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "profesor".
 *
 * @property int $ID
 * @property string $Nombre
 * @property string $Ap_Paterno
 * @property string $Ap_Materno
 * @property string $Correo
 * @property int $Fk_coordinacion
 * @property int|null $Fecha_creacion
 * @property int|null $Fecha_actualizacion
 * @property int|null $Fk_user
 *
 * @property Cursodetalle[] $cursodetalles
 * @property Coodinacion $fkCoordinacion
 * @property User $fkUser
 */
class Profesor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'profesor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Nombre', 'Ap_Paterno', 'Ap_Materno', 'Correo', 'Fk_coordinacion'], 'required'],
            [['Fk_coordinacion', 'Fecha_creacion', 'Fecha_actualizacion', 'Fk_user'], 'integer'],
            [['Nombre'], 'string', 'max' => 30],
            [['Ap_Paterno', 'Ap_Materno'], 'string', 'max' => 15],
            [['Correo'], 'string', 'max' => 40],
            [['Fk_coordinacion'], 'exist', 'skipOnError' => true, 'targetClass' => Coodinacion::class, 'targetAttribute' => ['Fk_coordinacion' => 'ID']],
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
            'Ap_Paterno' => 'Ap Paterno',
            'Ap_Materno' => 'Ap Materno',
            'Correo' => 'Correo',
            'Fk_coordinacion' => 'Fk Coordinacion',
            'Fecha_creacion' => 'Fecha Creacion',
            'Fecha_actualizacion' => 'Fecha Actualizacion',
            'Fk_user' => 'Fk User',
        ];
    }

    /**
     * Gets query for [[Cursodetalles]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\CursodetalleQuery
     */
    public function getCursodetalles()
    {
        return $this->hasMany(Cursodetalle::class, ['Fk_profesor' => 'ID']);
    }

    /**
     * Gets query for [[FkCoordinacion]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\CoodinacionQuery
     */
    public function getFkCoordinacion()
    {
        return $this->hasOne(Coodinacion::class, ['ID' => 'Fk_coordinacion']);
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
     * @return \app\models\query\ProfesorQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\ProfesorQuery(get_called_class());
    }
}
