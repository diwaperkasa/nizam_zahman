<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use yii\web\NotFoundHttpException;
use yii\db;

class BackhoeLoaderController extends Controller
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
                'only' => ['index'],
                'rules' => [
                    [
                        //'actions' => ['index', 'tarif'],
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

    public function actionIndex()
    {   
        return $this->render('index');
    }

    public function actionTarif()
    {
        $req = Yii::$app->request;
        if ($req->isAjax) {
            $tarif = (new \yii\db\Query())
                ->select(['*'])
                ->from('tarif_pnbp')
                ->all();
            $new_tarif = array();
            foreach ($tarif as $key => $value) {
                $new_tarif[$value['jenis_tarif']] = $value;
            }
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON; 
            return $new_tarif;
        }
    }

    public function actionCreate()
    {
        $req = Yii::$app->request;
        if ($req->isPost)
        {
            $post = $req->post();
            //return $this->asJson($post);
            $connection = \Yii::$app->db;
            $connection->createCommand()->insert('sewa_backhoe', $post['backhoe'])->execute();
        }
        return $this->redirect(['/backhoe-loader']);
    }
}
?>