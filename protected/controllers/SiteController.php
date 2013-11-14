<?php

class SiteController extends Controller {

    /**
     * Declares class-based actions.
     */
    public function actions() {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex() {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $categories = Category::model()->findAll();
        $banners = News::getBanner();
        $twoNews = News::getLastTwoNews();

        $total = Shoutbox::model()->count();

        $c = new CDbCriteria;
        $c->condition = "type=:type";
        $c->params = array(':type' => Shoutbox::TYPE_GOOD);
        $c->order = 'updated DESC';


        $pages1 = new CPagination($total);
        $pages1->pageSize = 20;
        $pages1->applyLimit($c);
        $shoutboxes1 = Shoutbox::model()->findAll($c);


        $c->params = array(':type' => Shoutbox::TYPE_BAD);

        $pages2 = new CPagination($total);
        $pages2->pageSize = 20;
        $pages2->applyLimit($c);
        $shoutboxes2 = Shoutbox::model()->findAll($c);


        $this->render('index', array(
            'categories' => $categories,
            'banners' => $banners,
            'twoNews' => $twoNews,
            'shoutboxes1' => $shoutboxes1,
            'pages1' => $pages1,
            'shoutboxes2' => $shoutboxes2,
            'pages2' => $pages2,
        ));
    }

    public function actionSearch($cat = NULL) {
        if (isset($_GET['search'])) {
            $match = addcslashes($_GET['search'], '%_'); // escape LIKE's special characters
            $cat_clause = ($cat === NULL) ? '' : 'AND category_id=:catid';
            $dataProvider = new CActiveDataProvider('News', array(
                'criteria' => array(
                    'condition' => "(title LIKE :match OR content LIKE :match) " . $cat_clause, // no quotes around :match
                    'params' => array(
                        ':match' => "%$match%",
                        ':catid' => $cat,
                    ),
                    'order' => 'id DESC',
                ),
            ));
            $dataProviderCategory = new CActiveDataProvider('Category');
            $this->render('search', array(
                'dataProvider' => $dataProvider,
                'dataProviderCategory' => $dataProviderCategory,
                'match' => $match,
            ));
        } else {
            $this->redirect('index');
        }
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    /**
     * Displays the contact page
     */
    public function actionContact() {
        $model = new ContactForm;
        if (isset($_POST['ContactForm'])) {
            $model->attributes = $_POST['ContactForm'];
            if ($model->validate()) {
                $headers = "From: {$model->email}\r\nReply-To: {$model->email}";
                mail(Yii::app()->params['adminEmail'], $model->subject, $model->body, $headers);
                Yii::app()->user->setFlash('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');
                $this->refresh();
            }
        }
        $this->render('contact', array('model' => $model));
    }

    /**
     * Displays the login page
     */
    public function actionLogin() {
        $this->layout = '//layouts/MainLogin';
        $model = new LoginForm;

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login())
                $this->redirect(Yii::app()->user->returnUrl);
        }
        // display the login form
        $this->render('login', array('model' => $model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

}