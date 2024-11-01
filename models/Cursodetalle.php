<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cursodetalle".
 *
 * @property int $ID
 * @property int $Fk_estudiante
 * @property int $Fk_curso
 * @property int|null $Fk_profesor
 * @property string $Fecha_inscripcion
 * @property string $Estado
 * @property string|null $Nota
 * @property int|null $Fecha_creacion
 * @property int|null $Fecha_actualizacion
 * @property int|null $Fk_user
 *
 * @property Curso $fkCurso
 * @property Estudiante $fkEstudiante
 * @property Profesor $fkProfesor
 * @property User $fkUser
 */
class Cursodetalle extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cursodetalle';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Fk_estudiante', 'Fk_curso', 'Fecha_inscripcion', 'Estado'], 'required'],
            [['Fk_estudiante', 'Fk_curso', 'Fk_profesor', 'Fecha_creacion', 'Fecha_actualizacion', 'Fk_user'], 'integer'],
            [['Fecha_inscripcion'], 'safe'],
            [['Estado'], 'string', 'max' => 20],
            [['Nota'], 'string', 'max' => 10],
            [['Fk_curso'], 'exist', 'skipOnError' => true, 'targetClass' => Curso::class, 'targetAttribute' => ['Fk_curso' => 'ID']],
            [['Fk_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['Fk_user' => 'id']],
            [['Fk_estudiante'], 'exist', 'skipOnError' => true, 'targetClass' => Estudiante::class, 'targetAttribute' => ['Fk_estudiante' => 'ID']],
            [['Fk_profesor'], 'exist', 'skipOnError' => true, 'targetClass' => Profesor::class, 'targetAttribute' => ['Fk_profesor' => 'ID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'Fk_estudiante' => 'Fk Estudiante',
            'Fk_curso' => 'Fk Curso',
            'Fk_profesor' => 'Fk Profesor',
            'Fecha_inscripcion' => 'Fecha Inscripcion',
            'Estado' => 'Estado',
            'Nota' => 'Nota',
            'Fecha_creacion' => 'Fecha Creacion',
            'Fecha_actualizacion' => 'Fecha Actualizacion',
            'Fk_user' => 'Fk User',
        ];
    }

    /**
     * Gets query for [[FkCurso]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\CursoQuery
     */
    public function getFkCurso()
    {
        return $this->hasOne(Curso::class, ['ID' => 'Fk_curso']);
    }

    /**
     * Gets query for [[FkEstudiante]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\EstudianteQuery
     */
    public function getFkEstudiante()
    {
        return $this->hasOne(Estudiante::class, ['ID' => 'Fk_estudiante']);
    }

    /**
     * Gets query for [[FkProfesor]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\ProfesorQuery
     */
    public function getFkProfesor()
    {
        return $this->hasOne(Profesor::class, ['ID' => 'Fk_profesor']);
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
     * @return \app\models\query\CursodetalleQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\CursodetalleQuery(get_called_class());
    }
}
