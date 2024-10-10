<?php

namespace app\models;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;
use Yii;

/**
 * This is the model class for table "tu_estatu".
 *
 * @property int $ID
 * @property string|null $nombre
 * @property int|null $created_at
 * @property int|null $update_at
 * @property int|null $fk_user
 *
 * @property User $fkUser
 * @property TuBitacora[] $tuBitacoras
 * @property TuCarrera[] $tuCarreras
 * @property TuCicloescolar[] $tuCicloescolars
 * @property TuCoordinadordepartamento[] $tuCoordinadordepartamentos
 * @property TuCoordinadorinstitucional[] $tuCoordinadorinstitucionals
 * @property TuDocentecarrera[] $tuDocentecarreras
 * @property TuGrupo[] $tuGrupos
 * @property TuPeriodo[] $tuPeriodos
 * @property TuPlaneacion[] $tuPlaneacions
 * @property TuTutor[] $tuTutors
 */
class TuEstatu extends \yii\db\ActiveRecord
{

    /**
     * Funcion para grabar el usuario y las fechas actuales
     */
    public function behaviors(){
        return[
            [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'fk_user',
                'updatedByAttribute' => 'fk_user',
            ],
            'timestamp' => [
            'class' => 'yii\behaviors\TimestampBehavior',
            'attributes' => [
                ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'update_at'],
                ActiveRecord::EVENT_BEFORE_UPDATE => ['update_at'],
            ],
        ],
    ];
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tu_estatu';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre'], 'string', 'max' => 30],
            //[['created_at', 'update_at', 'fk_user'], 'integer'],
            //[['fk_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['fk_user' => 'id']],
            [['fk_user'], 'exist', 'skipOnError' => true, 'targetClass' => \webvimark\modules\UserManagement\models\User::className(), 'targetAttribute' => ['fk_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'nombre' => 'Nombre',
            'created_at' => 'Fecha creación',
            'update_at' => 'Fecha de ultima actualización',
            'fk_user' => 'Creado por el usuario',
        ];
    }

    /**
     * Gets query for [[FkUser]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\UserQuery
     */
    public function getFkUser()
    {
        //return $this->hasOne(User::className(), ['id' => 'fk_user']);
        return $this->hasOne(\webvimark\modules\UserManagement\models\User::className(), ['id' => 'fk_user']);
    }

    /**
     * Gets query for [[TuBitacoras]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\TuBitacoraQuery
     */
    public function getTuBitacoras()
    {
        return $this->hasMany(TuBitacora::className(), ['fk_estatus' => 'ID']);
    }

    /**
     * Gets query for [[TuCarreras]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\TuCarreraQuery
     */
    public function getTuCarreras()
    {
        return $this->hasMany(TuCarrera::className(), ['fk_estatus' => 'ID']);
    }

    /**
     * Gets query for [[TuCicloescolars]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\TuCicloescolarQuery
     */
    public function getTuCicloescolars()
    {
        return $this->hasMany(TuCicloescolar::className(), ['fk_estatus' => 'ID']);
    }

    /**
     * Gets query for [[TuCoordinadordepartamentos]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\TuCoordinadordepartamentoQuery
     */
    public function getTuCoordinadordepartamentos()
    {
        return $this->hasMany(TuCoordinadordepartamento::className(), ['fk_estatus' => 'ID']);
    }

    /**
     * Gets query for [[TuCoordinadorinstitucionals]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\TuCoordinadorinstitucionalQuery
     */
    public function getTuCoordinadorinstitucionals()
    {
        return $this->hasMany(TuCoordinadorinstitucional::className(), ['fk_estatus' => 'ID']);
    }

    /**
     * Gets query for [[TuDocentecarreras]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\TuDocentecarreraQuery
     */
    public function getTuDocentecarreras()
    {
        return $this->hasMany(TuDocentecarrera::className(), ['fk_estatus' => 'ID']);
    }

    /**
     * Gets query for [[TuGrupos]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\TuGrupoQuery
     */
    public function getTuGrupos()
    {
        return $this->hasMany(TuGrupo::className(), ['fk_estatus' => 'ID']);
    }

    /**
     * Gets query for [[TuPeriodos]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\TuPeriodoQuery
     */
    public function getTuPeriodos()
    {
        return $this->hasMany(TuPeriodo::className(), ['fk_estatus' => 'ID']);
    }

    /**
     * Gets query for [[TuPlaneacions]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\TuPlaneacionQuery
     */
    public function getTuPlaneacions()
    {
        return $this->hasMany(TuPlaneacion::className(), ['fk_estatus' => 'ID']);
    }

    /**
     * Gets query for [[TuTutors]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\TuTutorQuery
     */
    public function getTuTutors()
    {
        return $this->hasMany(TuTutor::className(), ['fk_estatus' => 'ID']);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\query\TuEstatuQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\TuEstatuQuery(get_called_class());
    }
}
