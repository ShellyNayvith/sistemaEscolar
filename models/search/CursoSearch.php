<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Curso;

/**
 * CursoSearch represents the model behind the search form of `app\models\Curso`.
 */
class CursoSearch extends Curso
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID', 'Codigo', 'Fk_Foto_Portada', 'Capacidad', 'Fk_categoria', 'Fecha_creacion', 'Fecha_actualizacion', 'Fk_user'], 'integer'],
            [['Nombre_Curso', 'Descripcion', 'Fecha_Inicia', 'Fecha_Termina', 'Horario', 'Modalidad', 'Lugar'], 'safe'],
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
        $query = Curso::find();

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
            'Codigo' => $this->Codigo,
            'Fk_Foto_Portada' => $this->Fk_Foto_Portada,
            'Fecha_Inicia' => $this->Fecha_Inicia,
            'Fecha_Termina' => $this->Fecha_Termina,
            'Capacidad' => $this->Capacidad,
            'Fk_categoria' => $this->Fk_categoria,
            'Fecha_creacion' => $this->Fecha_creacion,
            'Fecha_actualizacion' => $this->Fecha_actualizacion,
            'Fk_user' => $this->Fk_user,
        ]);

        $query->andFilterWhere(['like', 'Nombre_Curso', $this->Nombre_Curso])
            ->andFilterWhere(['like', 'Descripcion', $this->Descripcion])
            ->andFilterWhere(['like', 'Horario', $this->Horario])
            ->andFilterWhere(['like', 'Modalidad', $this->Modalidad])
            ->andFilterWhere(['like', 'Lugar', $this->Lugar]);

        return $dataProvider;
    }
}
