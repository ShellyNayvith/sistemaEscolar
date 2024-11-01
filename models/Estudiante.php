<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estudiante".
 *
 * @property int $ID
 * @property string $Nombre
 * @property int $Ap_paterno
 * @property int $Ap_materno
 * @property string $Correo
 * @property string $Fecha_inscripcion
 * @property int $Fk_carrera
 * @property int $Semestre
 * @property string $Turno
 * @property int|null $Fecha_creacion
 * @property int|null $Fecha_actualizacion
 * @property int|null $Fk_user
 *
 * @property Cursodetalle[] $cursodetalles
 * @property Carrera $fkCarrera
 * @property User $fkUser
 */
class Estudiante extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'estudiante';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Nombre', 'Ap_paterno', 'Ap_materno', 'Correo', 'Fecha_inscripcion', 'Fk_carrera', 'Semestre', 'Turno'], 'required'],
            [['Ap_paterno', 'Ap_materno', 'Fk_carrera', 'Semestre', 'Fecha_creacion', 'Fecha_actualizacion', 'Fk_user'], 'integer'],
            [['Fecha_inscripcion'], 'safe'],
            [['Nombre'], 'string', 'max' => 30],
            [['Correo'], 'string', 'max' => 40],
            [['Turno'], 'string', 'max' => 10],
            [['Fk_carrera'], 'exist', 'skipOnError' => true, 'targetClass' => Carrera::class, 'targetAttribute' => ['Fk_carrera' => 'ID']],
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
            'Ap_paterno' => 'Ap Paterno',
            'Ap_materno' => 'Ap Materno',
            'Correo' => 'Correo',
            'Fecha_inscripcion' => 'Fecha Inscripcion',
            'Fk_carrera' => 'Fk Carrera',
            'Semestre' => 'Semestre',
            'Turno' => 'Turno',
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
        return $this->hasMany(Cursodetalle::class, ['Fk_estudiante' => 'ID']);
    }

    /**
     * Gets query for [[FkCarrera]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\CarreraQuery
     */
    public function getFkCarrera()
    {
        return $this->hasOne(Carrera::class, ['ID' => 'Fk_carrera']);
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
     * @return \app\models\query\EstudianteQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\EstudianteQuery(get_called_class());
    }
}
