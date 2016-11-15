<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => [
	                	'logout'
                ],
                'rules' => [
                    [
                        'actions' => ['logout'],
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

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
    
    public function actionAcercaDe(){
    	return $this->render('acercaDe');
    }
    
    public function actionIntegrantes(){
    	return $this->render('integrantes');
    }
    
    public function actionPorQue(){
    	return $this->render('porQue');
    }
    
    public function actionNuestraTecnologia(){
    	return $this->render('nuestraTecnologia');
    }
    
    public function actionBases(){
    	return $this->render('bases');
    }
    
    public function actionHazClick3(){
    	return $this->render('hazClick3');
    }
    
    public function actionJurado(){
    	return $this->render('jurado');
    }
    
    public function actionPremios(){
    	return $this->render('premios');
    }
    
    public function actionGanadores(){
    	return $this->render('ganadores');
    }
    
    public function actionMenciones(){
    	return $this->render('menciones');
    }
    
    public function actionBuyTheBook(){
    	return $this->render('buyTheBook');
    }
    
    public function actionFotosConMedallas(){
    	return $this->render('fotosConMedallas');
    }
    
    public function actionVideos(){
    	return $this->render('videos');
    }
    
    public function actionWallpapers(){
    	return $this->render('wallpapers');
    }
    
    public function actionBlog(){
    	return $this->render('blog');
    }
    
    public function actionExhibiciones(){
    	return $this->render('exhibiciones');
    }
}
