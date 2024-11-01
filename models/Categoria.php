<?php

namespace app\models;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;
use Yii;

/**
 * This is the model class for table "categoria".
 *
 * @property int $ID
 * @property string|null $Nombre
 * @property int|null $Fecha_creacion
 * @property int|null $Fecha_actualizacion
 * @property int|null $Fk_user
 *
 * @property Curso[] $cursos
 * @property User $fkUser
 */
class Categoria extends \yii\db\ActiveRecord
{
    public function behaviors(){
        return[
            [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'Fk_user',
                'updatedByAttribute' => 'Fk_user',
            ],
            'timestamp' => [
            'class' => 'yii\behaviors\TimestampBehavior',
            'attributes' => [
                ActiveRecord::EVENT_BEFORE_INSERT => ['Fecha_creacion', 'Fecha_actualizacion'],
                ActiveRecord::EVENT_BEFORE_UPDATE => ['Fecha_actualizacion'],
            ],
        ],
    ];
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categoria';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Fecha_creacion', 'Fecha_actualizacion', 'Fk_user'], 'integer'],
            [['Nombre'], 'string', 'max' => 255],
            //[['Fk_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['Fk_user' => 'id']],
            [['Fk_user'], 'exist', 'skipOnError' => true, 'targetClass' => \webvimark\modules\UserManagement\models\User::className(), 'targetAttribute' => ['Fk_user' => 'id']],

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
            'Fecha_creacion' => 'Fecha Creación',
            'Fecha_actualizacion' => 'Fecha Actualización',
            'Fk_user' => 'Id Usuario',
        ];
    }

    /**
     * Gets query for [[Cursos]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\CursoQuery
     */
    public function getCursos()
    {
        return $this->hasMany(Curso::class, ['Fk_categoria' => 'ID']);
    }

    /**
     * Gets query for [[FkUser]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\UserQuery
     */
    public function getFkUser()
    {
        return $this->hasOne(\webvimark\modules\UserManagement\models\User::className(), ['id' => 'Fk_user']);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\query\CategoriaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\CategoriaQuery(get_called_class());
    }
}
