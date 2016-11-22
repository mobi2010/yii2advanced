<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

class AdminController extends Controller
{
    public $layout = 'admin';


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
                        'actions' => ['welcome', 'home'],
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
    public function actionHome()
    {
        return $this->render('home');
    }

    /*
     * 后台首页管理展示
     */
    public function actionWelcome()
    {   
        $this->layout = 'right';
        return $this->render('welcome');
    }
}
