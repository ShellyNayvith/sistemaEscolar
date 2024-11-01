<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Cursodetalle;

/**
 * CursodetalleSearch represents the model behind the search form of `app\models\Cursodetalle`.
 */
class CursodetalleSearch extends Cursodetalle
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID', 'Fk_estudiante', 'Fk_curso', 'Fk_profesor', 'Fecha_creacion', 'Fecha_actualizacion', 'Fk_user'], 'integer'],
            [['Fecha_inscripcion', 'Estado', 'Nota'], 'safe'],
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
        $query = Cursodetalle::find();

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
            'Fk_estudiante' => $this->Fk_estudiante,
            'Fk_curso' => $this->Fk_curso,
            'Fk_profesor' => $this->Fk_profesor,
            'Fecha_inscripcion' => $this->Fecha_inscripcion,
            'Fecha_creacion' => $this->Fecha_creacion,
            'Fecha_actualizacion' => $this->Fecha_actualizacion,
            'Fk_user' => $this->Fk_user,
        ]);

        $query->andFilterWhere(['like', 'Estado', $this->Estado])
            ->andFilterWhere(['like', 'Nota', $this->Nota]);

        return $dataProvider;
    }
}
