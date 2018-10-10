<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use yii\web\NotFoundHttpException;
use yii\db;

use app\models\MstKapal;
use app\models\SearchMstKapal;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\data\ArrayDataProvider;
use yii\db\Command;

use kartik\mpdf\Pdf;

use app\models\FormKapal;
use app\models\KapalSandar;
use app\models\SearchKapal;
use app\models\TarifPNBP;
use app\models\FormTarif;

/**
 * MstKapalController implements the CRUD actions for MstKapal model.
 */
class KolamPelabuhanController extends Controller
{
    /**
     * @inheritdoc 
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
	 */
	 
	public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }
	
	public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index','masuk','keluar','report','view','daftar-invoice','daftar-kapal','demo','cari-kapal'],
                'rules' => [
                    [
                        //'actions' => ['index','masuk','keluar','report','view','daftar-invoice','daftar-kapal','demo','cari-kapal'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
			'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all MstKapal models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SearchMstKapal();
		$query = Yii::$app->request->queryParams;
        $dataProvider = $searchModel->search($query);
		
		$forms = new FormKapal();
		$searchKapal = new SearchKapal();
		$query_array = array(
			"SearchKapal" => array(
				 "tanggal_keluar" => null,
				)
		);		
		$dataProviderKapal = $searchKapal->search($query_array);
		
		return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
			'dataProviderKapal' => $dataProviderKapal,
        ]);
    }

    /**
     * Displays a single MstKapal model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new MstKapal model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MstKapal();
        if ($model->load(Yii::$app->request->post()))
        {
            $post = Yii::$app->request->post('MstKapal');
            foreach ($post as $key => $value) {
                $model->$key = $value;
            }
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing MstKapal model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $post = Yii::$app->request->post('MstKapal');
            foreach ($post as $key => $value) {
                $model->$key = $value;
            }
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing MstKapal model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    /*
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    */

    /**
     * Finds the MstKapal model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return MstKapal the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MstKapal::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
	
	protected function findKapal($id)
    {
        if (($model = KapalSandar::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
	
	// additional from diwa -------------------------------
	protected function datediff($from, $to)
	{
		$connection = Yii::$app->getDb();
		$query_text = "TIMESTAMPDIFF(DAY,'".$from."','".$to."')";
		$command = $connection->createCommand("SELECT ".$query_text.";");
		//$command = $connection->createCommand("SELECT CURRENT_TIMESTAMP;");
		$result = $command->queryAll();
		$result[0] ['parkingtime'] = $result[0] [$query_text];
		unset($result[0][$query_text]);
		
		return (int)$result[0][$query_text];
	}
	
	protected function gettimestamp()
	{
		$connection = Yii::$app->getDb();
		$query_text = "CURRENT_TIMESTAMP";
		$command = $connection->createCommand("SELECT ".$query_text.";");
		$result = $command->queryAll();

		return $result[0][$query_text];
	}
	
	public function actionMasuk($id)
    {	
		$model = $this->findModel($id);
		$forms = new FormKapal();
		
        if ($forms->load(Yii::$app->request->post()) && $forms->validate())
        {
            $request = Yii::$app->request;

            $boat = new KapalSandar();
            $boat->tanggal_masuk = $request->post('FormKapal')['tanggal_masuk'];
            $boat->id_kapal = $request->post('FormKapal')['id_kapal'];
			
            $boat->save();

            return $this->redirect(Url::to(['kolam-pelabuhan/index']));
        } else {
			$searchKapal = new SearchKapal();
			$query_array = array(
				"SearchKapal" => array(
					 "tanggal_keluar" => null,
					)
			);
            $dataProviderKapal = $searchKapal->search($query_array);
			$date_now = $this->gettimestamp();
			return $this->render('masuk', [
				'id' => $id,
				'forms'=>$forms, 
				'model'=>$model,
				'date_now' => $date_now,
				'dataProviderKapal' => $dataProviderKapal,
			]);
		}
    }
	
	public function actionKeluar($id)
    {		
		$tarif = $this->tarif_pnbp();
        $model = $this->findModel($id);
		// cari kapal yg berada di kolam pada database induk
		$forms = new FormKapal();
		$searchKapal = new SearchKapal();
		$query_array = array(
			"SearchKapal" => array(
				 "tanggal_keluar" => null,
				)
		);		
		$date_now = $this->gettimestamp();
		$dataProviderKapal = $searchKapal->search($query_array);

		if ($forms->load(Yii::$app->request->post()) && $forms->validate())
        {
            $model_kapal_kolam = $dataProviderKapal->models;
			$id_kapal_kolam = $this->getId($model_kapal_kolam,$id);
			
			$request = Yii::$app->request;			
            //update panjang kapal
            $model_update = $this->findModel($id);
            $model_update->loa = $request->post('MstKapal')['loa'];
            $model_update->save();

            //return $this->asJson($request->post('MstKapal')['loa']);
            //update tagihan data kapal keluar pelabuhan
			$boat = KapalSandar::findOne(['id', $model_kapal_kolam[$id_kapal_kolam]['id']]);
            $boat->tanggal_keluar = $request->post('FormKapal')['tanggal_keluar'];
			$boat->tambat_1 = $request->post('FormKapal')['tambat_1'];
			$boat->tambat_2 = $request->post('FormKapal')['tambat_2'];
			$boat->tambat_10 = $request->post('FormKapal')['tambat_10'];
			$boat->tender_1 = $request->post('FormKapal')['tender_1'];
			$boat->tender_2 = $request->post('FormKapal')['tender_2'];
			$boat->tender_10 = $request->post('FormKapal')['tender_10'];
			$boat->kebersihan = $request->post('FormKapal')['kebersihan'];
            $boat->hutang_tambat = $request->post('FormKapal')['hutang_tambat'];
            $boat->hutang_tender = $request->post('FormKapal')['hutang_tender'];
            $boat->hutang_kebersihan = $request->post('FormKapal')['hutang_kebersihan'];
			$boat->id_billing = $request->post('FormKapal')['id_billing'];
            $boat->keterangan = $request->post('FormKapal')['comment'];
			
            $boat->save();

			return $this->redirect(['report', 'id' => $model_kapal_kolam[$id_kapal_kolam]['id']]);
			
        } else {
			return $this->render('keluar', [
				'id' => $id,
				'forms'=>$forms, 
				'model'=>$model,
				'tarif' => $tarif,
				'dataProviderKapal' => $dataProviderKapal,
				'date_now' => $date_now,
			]);
		}
    }
	
	public function actionAdd()
    {
		$forms = new FormKapal();

        if ($forms->load(Yii::$app->request->post()) && $forms->validate())
        {
            $request = Yii::$app->request;

            $boat = new KapalSandar();
            $boat->nama_kapal = $request->post('FormKapal')['nama_kapal'];
            $boat->tanggal_masuk = $request->post('FormKapal')['tanggal_masuk'];
            $boat->tanda_selar = $request->post('FormKapal')['tanda_selar'];
			
            $boat->save();

            return $this->redirect(Url::to(['kolam-pelabuhan/index']));
        }
	}
	
	function findName($array, $keySearch)
	{
		foreach ($array as $key => $item) {
			if ($item['nama_kapal'] == $keySearch) {
				//echo $item['nama_kapal'];
				return true;
			}
		}
		return false;
	}

	function getId($array, $keySearch)
	{
		foreach ($array as $key => $item) {
	        if ($item['id_kapal'] == $keySearch) {
	            return $key;
	        }
    	}
    	return null;
	}
	
	public function actionReport($id) {
        $req = Yii::$app->request;
        if ($req->isPost) {
            return $this->asJson('halo');
        }
        $tarif = $this->tarif_pnbp_fix();
        //return $this->asJson($tarif);
    	$modelKapal = $this->findKapal($id);
    	$model = $this->findModel($modelKapal['id_kapal']);
    	$date_now = $this->gettimestamp();
    	$content = $this->renderPartial('pdf_form/reportView.php',[
    		'modelKapal' => $modelKapal,
    		'model' => $model,
    		'date_now' => $date_now,
    		'tarif' => $tarif,
    	]);
        // setup kartik\mpdf\Pdf component
        $css = file_get_contents(getcwd() . '/css/pdf.css');
        $pdf = new Pdf([
    		// filename downloaded files
    		'filename' => $model['nama_kapal'].'-'.$modelKapal['tanggal_masuk'],
            // set to use core fonts only
            'mode' => Pdf::MODE_CORE, 
            // A4 paper format
            'format' => Pdf::FORMAT_A4, 
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT, 
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER, 
            // your html content input
            'content' => $content,  
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting 
    		'cssFile' => Url::to('@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css'),
            // any css to be embedded if required
            'cssInline' => $css, 
             // set mPDF properties on the fly
            'options' => ['title' => 'Tambat-Labuh dan Kebersihan'],
             // call mPDF methods on the fly
            'methods' => [ 
                'SetHeader'=>['No Transaksi:#'.$modelKapal['id']], 
                'SetFooter'=>['{PAGENO}'],
            ]
        ]);
        return $pdf->render(); 
	}

	public function actionDaftarKapal()
    {
        $searchKapal = new SearchKapal();
		$dataProviderKapal = $searchKapal->KapalSandar();
		$toArray = ArrayHelper::toArray($dataProviderKapal->models);
        $hasil = array();
        for ($id = 0; $id < sizeof($dataProviderKapal->models); $id++) {
            $model = MstKapal::findOne($dataProviderKapal->models[$id]['id_kapal']);
            $new_model = ArrayHelper::toArray($model);
            $hasil[] = ArrayHelper::merge($new_model,$toArray[$id]);
        }
        $provider = new ArrayDataProvider([
            'allModels' => $hasil,
            //'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
            'sort' => [
                'attributes' => ['tanggal_masuk','nama_kapal'],
            ],
        ]);
		return $this->render('daftar_kapal', [
			'dataProviderKapal' => $dataProviderKapal,
			'searchKapal' => $searchKapal,
			'provider' => $provider,
			'hasil' => $hasil,
		]);
    }

    public function actionDaftarInvoice()
    {
        $data = Yii::$app->db->createCommand("SELECT * FROM `daftar_kapal_tambat` WHERE `tanggal_keluar` IS NOT NULL")->queryAll();

		if (sizeof($data) == null) {
			$hasil[] = null;
		}
		
        for ($id = 0; $id < sizeof($data); $id++) {
            $find = MstKapal::findOne($data[$id]['id_kapal']);
            $model = ArrayHelper::toArray($find);
            $hasil[] = ArrayHelper::merge($model,$data[$id]);
        }

        $DataProvider = new ArrayDataProvider([
            'allModels' => $hasil,
            'pagination' => [
		        'pageSize' => 10,
		        //'defaultPageSize' => 10,
		    ],
            'sort' => [
                'attributes' => ['tanggal_masuk','nama_kapal','tanggal_keluar'],
            ],
        ]);

        $allData = new ArrayDataProvider([
            'allModels' => $hasil,
            'pagination' => false,
            'sort' => [
                'attributes' => ['tanggal_masuk','nama_kapal','tanggal_keluar'],
            ],
        ]);

    	return $this->render('daftar_invoice', [
			'DataProvider' => $DataProvider,
			'allData' => $allData,
		]);
    }

    function tarif_pnbp()
    {
        $tarif = TarifPNBP::find()->all();
        $tarif_array = ArrayHelper::toArray($tarif);
        $header_tarif = array();

        for ($i=0; $i < sizeof($tarif_array); $i++) { 
            $header_tarif[] = $tarif_array[$i]['jenis_tarif'];
        }

        $pnbp = array();
        $pnbp['tarif'] = $tarif_array;
        $pnbp['header'] = $header_tarif;

        return $pnbp;
    }

    function tarif_pnbp_fix()
    {
        $tarif = TarifPNBP::find()->all();
        $tarif_array = ArrayHelper::toArray($tarif);
        $header_tarif = array();
        $pnbp = array();
        foreach ($tarif as $key => $value) {
            $pnbp[$tarif_array[$key]['jenis_tarif']] = $value['biaya'];
        }
        return $pnbp;
    }

    public function actionDemo () 
    {    
        $req = Yii::$app->request;
        if ($req->isPost) {
            //var_dump($req->post()) ;
            $obj = $req->post('input_kapal');
            $boat = new KapalSandar();
            $boat->tanggal_masuk = $obj['tanggal_masuk'];
            $boat->id_kapal = $obj['id'];
            
            $boat->save();

            return $this->redirect(Url::to(['kolam-pelabuhan/demo']));
        }
        $tarif = $this->tarif_pnbp();
        $searchKapal = new SearchKapal();
        $query_array = array(
            "SearchKapal" => array(
                 "tanggal_keluar" => null,
                )
        );      
        $dataProviderKapal = $searchKapal->search($query_array);
        $toArray = ArrayHelper::toArray($dataProviderKapal->models);
        $hasil = array();
        for ($id = 0; $id < sizeof($dataProviderKapal->models); $id++) {
            $model = MstKapal::findOne($dataProviderKapal->models[$id]['id_kapal']);
            $new_model = ArrayHelper::toArray($model);
            $hasil[] = ArrayHelper::merge($new_model,$toArray[$id]);
        }
        $kapal_array = ArrayHelper::toArray($dataProviderKapal->models);

        $header_kapal = array();
        for ($i=0; $i < sizeof($kapal_array); $i++) { 
            $model = $this->findModel($kapal_array[$i]['id_kapal']);
            $header_kapal[] = $model['nama_kapal'];
        }
        return $this->render('demo',[
            'kapal_tambat' => $kapal_array,
            'tarif' => $tarif['tarif'],
            'header_tarif' => $tarif['header'],
            'header_kapal' => $header_kapal,
            'hasil' => $hasil,
        ]);
    }

    public function actionCariKapal()
    {
        $req = Yii::$app->request;
        if ($req->isAjax) {
          //echo "the request is AJAX";
        }
        if ($req->isGet) {
            $obj = $req->get('query');
            $obj_id = $req->get('id');
            if ($obj_id != "")
            {
                $model = $this->findModel($obj_id);
                \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                return $model;
            }
            $searchModel = new SearchMstKapal();
            $query_array = array(
                "SearchMstKapal" => array(
                "nama_kapal" => $obj,
            )
            );      
            $dataProviderKapal = $searchModel->search($query_array);
            $toArray = ArrayHelper::toArray($dataProviderKapal->models);
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return $toArray;
        }
        if ($req->isPost) {
            $obj = $req->post('query');
            $obj_id = $req->post('id');
            if ($obj_id != "")
            {
                $model = $this->findModel($obj_id);
                $model_to_array = ArrayHelper::toArray($model);
                \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                return $model_to_array;
            }
            $searchModel = new SearchMstKapal();
            $query_array = array(
                "SearchMstKapal" => array(
                "nama_kapal" => $obj,
            )
            );      
            $dataProviderKapal = $searchModel->search($query_array);
            $toArray = ArrayHelper::toArray($dataProviderKapal->models);
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return $toArray;
            //echo $obj_id;
        }
        if ($req->isPut) {
          //echo "the request is PUT";
        }
    }
}
