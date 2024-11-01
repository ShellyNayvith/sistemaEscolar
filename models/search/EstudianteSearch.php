<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Estudiante;

/**
 * EstudianteSearch represents the model behind the search form of `app\models\Estudiante`.
 */
class EstudianteSearch extends Estudiante
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID', 'Ap_paterno', 'Ap_materno', 'Fk_carrera', 'Semestre', 'Fecha_creacion', 'Fecha_actualizacion', 'Fk_user'], 'integer'],
            [['Nombre', 'Correo', 'Fecha_inscripcion', 'Turno'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Estudiante::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'ID' => $this->ID,
            'Ap_paterno' => $this->Ap_paterno,
            'Ap_materno' => $this->Ap_materno,
            'Fecha_inscripcion' => $this->Fecha_inscripcion,
            'Fk_carrera' => $this->Fk_carrera,
            'Semestre' => $this->Semestre,
            'Fecha_creacion' => $this->Fecha_creacion,
            'Fecha_actualizacion' => $this->Fecha_actualizacion,
            'Fk_user' => $this->Fk_user,
        ]);

        $query->andFilterWhere(['like', 'Nombre', $this->Nombre])
            ->andFilterWhere(['like', 'Correo', $this->Correo])
            ->andFilterWhere(['like', 'Turno', $this->Turno]);

        return $dataProvider;
    }
}
