<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

class HomeController extends Controller
{

    public $layout = 'right';

    /*
     * admin控制权限
     *
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['list', 'home'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /*
     * POST 提交 csrf 报错关闭
     */
    public function init()
    {
        parent::init();
        $this->enableCsrfValidation = false;
    }
    /*
     * 后台首页管理展示
     */
    public function actionList()
    {
        return $this->render('list');
    }
}
