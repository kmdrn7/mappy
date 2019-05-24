<?php

namespace backend\controllers;

use Yii;
use backend\models\Bangunan;
use backend\models\BangunanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * BangunanController implements the CRUD actions for Bangunan model.
 */
class BangunanController extends Controller
{
    /**
     * {@inheritdoc}
     */
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

    /**
     * Lists all Bangunan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BangunanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Bangunan model.
     * @param integer $id
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
     * Creates a new Bangunan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Bangunan();

        if ($model->load(Yii::$app->request->post())) {

            $model->gambar = UploadedFile::getInstance($model, 'gambar');
            if ($model->gambar){
                $filename = $this->slugify($model->bangunan).'-'.time().'.'.$model->gambar->extension;
                $model->gambar->saveAs('images/bangunan/'.$filename);
            }
            $model->gambar = $filename;
            $model->save();

            return $this->redirect(['view', 'id' => $model->id_bangunan]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Bangunan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $old = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

            $model->gambar = UploadedFile::getInstance($model, 'gambar');
            if ($model->gambar){
                if ($old->gambar){
                    if ( file_exists('/var/www/html/mappy/backend/web/images/bangunan/'.$old->gambar) ){
                        unlink('/var/www/html/mappy/backend/web/images/bangunan/'.$old->gambar);
                    }
                }

                $filename = $this->slugify($model->bangunan).'-'.time().'.'.$model->gambar->extension;
                $model->gambar->saveAs('images/bangunan/'.$filename);
                $model->gambar = $filename;
            }
            $model->save();

            return $this->redirect(['view', 'id' => $model->id_bangunan]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Bangunan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        if ( file_exists('/var/www/html/mappy/backend/web/images/bangunan/'.$model->gambar) ){
            unlink('/var/www/html/mappy/backend/web/images/bangunan/'.$model->gambar);
        }
        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Bangunan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Bangunan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Bangunan::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function slugify($text)
    {
        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);
        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);
        // trim
        $text = trim($text, '-');
        // remove duplicate -
        $text = preg_replace('~-+~', '-', $text);
        // lowercase
        $text = strtolower($text);
        if (empty($text)) {
            return 'n-a';
        }
        return $text;
    }
}
