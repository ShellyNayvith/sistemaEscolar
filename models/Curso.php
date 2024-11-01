<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "curso".
 *
 * @property int $ID
 * @property string $Nombre_Curso
 * @property int $Codigo
 * @property int|null $Fk_Foto_Portada
 * @property string|null $Descripcion
 * @property string $Fecha_Inicia
 * @property string|null $Fecha_Termina
 * @property string $Horario
 * @property string $Modalidad
 * @property int $Capacidad
 * @property string $Lugar
 * @property int $Fk_categoria
 * @property int|null $Fecha_creacion
 * @property int|null $Fecha_actualizacion
 * @property int|null $Fk_user
 *
 * @property Cursodetalle[] $cursodetalles
 * @property Categorium $fkCategoria
 * @property Archivo $fkFotoPortada
 * @property User $fkUser
 */
class Curso extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'curso';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Nombre_Curso', 'Codigo', 'Fecha_Inicia', 'Horario', 'Modalidad', 'Capacidad', 'Lugar', 'Fk_categoria'], 'required'],
            [['Codigo', 'Fk_Foto_Portada', 'Capacidad', 'Fk_categoria', 'Fecha_creacion', 'Fecha_actualizacion', 'Fk_user'], 'integer'],
            [['Descripcion'], 'string'],
            [['Fecha_Inicia', 'Fecha_Termina'], 'safe'],
            [['Nombre_Curso'], 'string', 'max' => 50],
            [['Horario'], 'string', 'max' => 255],
            [['Modalidad', 'Lugar'], 'string', 'max' => 15],
            [['Fk_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['Fk_user' => 'id']],
            [['Fk_categoria'], 'exist', 'skipOnError' => true, 'targetClass' => Categorium::class, 'targetAttribute' => ['Fk_categoria' => 'ID']],
            [['Fk_Foto_Portada'], 'exist', 'skipOnError' => true, 'targetClass' => Archivo::class, 'targetAttribute' => ['Fk_Foto_Portada' => 'ID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'Nombre_Curso' => 'Nombre Curso',
            'Codigo' => 'Codigo',
            'Fk_Foto_Portada' => 'Fk Foto Portada',
            'Descripcion' => 'Descripcion',
            'Fecha_Inicia' => 'Fecha Inicia',
            'Fecha_Termina' => 'Fecha Termina',
            'Horario' => 'Horario',
            'Modalidad' => 'Modalidad',
            'Capacidad' => 'Capacidad',
            'Lugar' => 'Lugar',
            'Fk_categoria' => 'Fk Categoria',
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
        return $this->hasMany(Cursodetalle::class, ['Fk_curso' => 'ID']);
    }

    /**
     * Gets query for [[FkCategoria]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\CategoriumQuery
     */
    public function getFkCategoria()
    {
        return $this->hasOne(Categorium::class, ['ID' => 'Fk_categoria']);
    }

    /**
     * Gets query for [[FkFotoPortada]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\ArchivoQuery
     */
    public function getFkFotoPortada()
    {
        return $this->hasOne(Archivo::class, ['ID' => 'Fk_Foto_Portada']);
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
     * @return \app\models\query\CursoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\CursoQuery(get_called_class());
    }
}
