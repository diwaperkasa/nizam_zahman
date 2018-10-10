<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\KapalSandar;

/**
 * SearchMstKapal represents the model behind the search form of `app\models\MstKapal`.
 */
class SearchKapal extends KapalSandar
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_kapal', 'tanggal_masuk', 'tanggal_keluar'], 'safe'],
            [['id_kapal'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = KapalSandar::find();
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
		// integer query
        $query->andFilterWhere([
            'tanggal_masuk' => $this->tanggal_masuk,
            'id_kapal' => $this->id_kapal,
        ]);
		if ($this->tanggal_keluar==null) {
			$query->andWhere(['tanggal_keluar' => $this->tanggal_keluar]);
		} else {
			$query->andFilterWhere(['tanggal_keluar', $this->tanggal_keluar]);
		}
		// string query
		//$query->andFilterWhere(['like', 'nama_kapal', $this->nama_kapal]);	
        return $dataProvider;
    }

    public function KapalSandar()
    {
        $query_array = array(
            "SearchKapal" => array(
                 "tanggal_keluar" => null,
                )
        );
        $dataProviderKapal = $this->search($query_array);
        return $dataProviderKapal;
    }
}
