<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use yii\web\NotFoundHttpException;
use yii\db;
use yii\helpers\ArrayHelper;

use app\models\TarifPNBP;

class TarifPnbpController extends Controller
{
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
                'only' => ['index',],
                'rules' => [
                    [
                        'actions' => ['index'],
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

    protected function findModel($id)
    {
        if (($model = TarifPNBP::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionIndex()
    {        
        $req = Yii::$app->request;
        if ($req->isPost) {
            $model = new TarifPNBP();
            $tarif = $this->tarif_pnbp();
            $obj_post = $req->post('pnbp');
            //return $this->asJson($obj_post);
            for ($i=0; $i < sizeof($tarif['header']) ; $i++) { 
                $post_data = $obj_post[$tarif['header'][$i]];
                $index = $tarif['id'][$i];
                $model_tarif = $this->findModel($index);
                $model_tarif->biaya = $post_data;
                $model_tarif->save();
            }
        }
        $model = new TarifPNBP();
        $tarif = $this->tarif_pnbp();
        return $this->render('index', [
            'model'=>$model,
            'tarif' => $tarif,
        ]);
    }

    function tarif_pnbp()
    {
        $tarif = TarifPNBP::find()->all();
        $tarif_array = ArrayHelper::toArray($tarif);
        $header_tarif = array();
        $header_id = array();

        for ($i=0; $i < sizeof($tarif_array); $i++) { 
            $header_tarif[] = $tarif_array[$i]['jenis_tarif'];
            $header_id[] = $tarif_array[$i]['id'];
        }

        $pnbp = array();
        $pnbp['tarif'] = $tarif_array;
        $pnbp['header'] = $header_tarif;
        $pnbp['id'] = $header_id;

        return $pnbp;
    }
}
?>