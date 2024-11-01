<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Profesor;

/**
 * ProfesorSearch represents the model behind the search form of `app\models\Profesor`.
 */
class ProfesorSearch extends Profesor
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID', 'Fk_coordinacion', 'Fecha_creacion', 'Fecha_actualizacion', 'Fk_user'], 'integer'],
            [['Nombre', 'Ap_Paterno', 'Ap_Materno', 'Correo'], 'safe'],
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
        $query = Profesor::find();

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
            'Fk_coordinacion' => $this->Fk_coordinacion,
            'Fecha_creacion' => $this->Fecha_creacion,
            'Fecha_actualizacion' => $this->Fecha_actualizacion,
            'Fk_user' => $this->Fk_user,
        ]);

        $query->andFilterWhere(['like', 'Nombre', $this->Nombre])
            ->andFilterWhere(['like', 'Ap_Paterno', $this->Ap_Paterno])
            ->andFilterWhere(['like', 'Ap_Materno', $this->Ap_Materno])
            ->andFilterWhere(['like', 'Correo', $this->Correo]);

        return $dataProvider;
    }
}
