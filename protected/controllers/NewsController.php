<?php

class NewsController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView() {
        $this->layout = "//layouts/column1";
        $news = $this->loadModelSlug();
        $comment = $this->newComment($news);
        $dataProvider = new CActiveDataProvider('News', array(
            'criteria' => array(
                'order' => 'id Desc',
            ),
            'pagination' => array(
                'pageSize' => 3,
            ),
        ));

        if ($news->file_type == News::TYPE_PICTURE)
            $this->render('picture', array(
                'model' => $news,
                'comment' => $comment,
                'dataProvider' => $dataProvider,
            ));
        else if ($news->file_type == News::TYPE_DOCUMENT)
            $this->render('document', array(
                'model' => $news,
                'comment' => $comment,
                'dataProvider' => $dataProvider,
            ));
        else if ($news->file_type == News::TYPE_VIDEO)
            $this->render('video', array(
                'model' => $news,
                'comment' => $comment,
                'dataProvider' => $dataProvider,
            ));
        else
            $this->render('view', array(
                'model' => $news,
                'comment' => $comment,
                'dataProvider' => $dataProvider,
            ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new News;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['News'])) {
            $model->attributes = $_POST['News'];
            $model->author_id = Yii::app()->user->id;
            $model->file = CUploadedFile::getInstance($model, 'file');
            if ($model->file !== null) {
                $ext = strtolower($model->file->getExtensionName());
                $dir = Yii::getPathOfAlias('webroot') . Yii::app()->params['uploads'];
                $fileName = sha1($model->file->getName() . rand(1, 9999999999)) . '.' . $ext;
                if ($ext == 'pdf') {
                    $model->file_type = News::TYPE_DOCUMENT;
                    $dir = Yii::getPathOfAlias('webroot') . Yii::app()->params['uploads_documents'];
                } else if ($ext == 'mp4') {
                    $model->file_type = News::TYPE_VIDEO;
                    $dir = Yii::getPathOfAlias('webroot') . Yii::app()->params['uploads_videos'];
                } else {
                    $model->file_type = News::TYPE_PICTURE;
                    $dir = Yii::getPathOfAlias('webroot') . Yii::app()->params['uploads_pictures'];
                }

                $model->image = $fileName;
                $model->file->saveAs($dir . $fileName);
            }
            if ($model->save())
                $this->redirect(array('view', 'slug' => $model->slug));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['News'])) {
            $model->attributes = $_POST['News'];
            $model->author_id = Yii::app()->user->id;
            $model->file = CUploadedFile::getInstance($model, 'file');
            if ($model->file !== null) {
                $dir = Yii::getPathOfAlias('webroot') . Yii::app()->params['uploads'];
                $ext = strtolower($model->file->getExtensionName());
                $fileName = sha1($model->file->getName() . rand(1, 9999999999)) . '.' . $ext;
                $old_file = $model->image;
                $model->image = $fileName;
                if ($ext == 'pdf') {
                    $model->file_type = News::TYPE_DOCUMENT;
                    $dir = Yii::getPathOfAlias('webroot') . Yii::app()->params['uploads_documents'];
                } else if ($ext == 'mp4') {
                    $model->file_type = News::TYPE_VIDEO;
                    $dir = Yii::getPathOfAlias('webroot') . Yii::app()->params['uploads_videos'];
                } else {
                    $model->file_type = News::TYPE_PICTURE;
                    $dir = Yii::getPathOfAlias('webroot') . Yii::app()->params['uploads_pictures'];
                }

                if ($model->file->saveAs($dir . $fileName) && file_exists($dir . $old_file))
                    unlink($dir . $old_file);
            }
            if ($model->save())
                $this->redirect(array('view', 'slug' => $model->slug));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $this->loadModel($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }
        else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('News');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new News('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['News']))
            $model->attributes = $_GET['News'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = News::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'news-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function loadModelSlug() {
        if (isset($_GET['slug'])) {
            if (Yii::app()->user->isGuest)
                $condition = 'status=' . News::STATUS_PUBLISHED . ' OR status=' . News::STATUS_ARCHIVED;
            else
                $condition = '';
            $model = News::model()->findByAttributes(array('slug' => $_GET['slug']), $condition);

            if ($model === null)
                throw new CHttpException(404, 'The requested page does not exist.');

            return $model;
        }
    }

    protected function newComment($post) {
        $comment = new Comment;
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'comment-form') {
            echo CActiveForm::validate($comment);
            Yii::app()->end();
        }
        if (isset($_POST['Comment'])) {
            $comment->attributes = $_POST['Comment'];
            if ($post->addComment($comment)) {
                Yii::app()->user->setFlash('commentSubmitted', 'Thank you for your comment.');
                $this->refresh();
            }
        }
        return $comment;
    }

}
