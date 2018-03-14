<?php

namespace app\controllers;

use Yii;
use app\models\Sequences;
use app\models\SequencesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\components\Logic;
use app\components\Veritas;
use app\components\VeritasLogic;
use app\components\MinimalDisjunctiveForm;
/**
 * SequencesController implements the CRUD actions for Sequences model.
 */
class SequencesController extends Controller
{
    /**
     * @inheritdoc
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
     * Lists all Sequences models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SequencesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Sequences model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Sequences model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Sequences();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_sequence]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Sequences model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_sequence]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Sequences model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionResult(){
         $searchModel = new SequencesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        if(isset($_GET['fonction'])){
             try 
	    {
                 
		if (empty($_GET['fonction']))
		    throw new \exception('La fonction ne peut être vide');
		
		$fonction = str_replace('-', '+', urldecode($_GET['fonction']));
		
		$logic = new Logic($fonction);
		$veritas = new VeritasLogic($logic);
		            
		setcookie ("fonction", $fonction, time() + 365*24*3600);
		
		    return $this->render('result', [
                            'searchModel' => $searchModel,
                            'dataProvider' => $dataProvider,
                            'logic' => $logic,
                            'veritas' => $veritas,
                ]);
            }
	   catch (\Exception $e)
	    {
                    return $this->render('erreur', [
                            'searchModel' => $searchModel,
                            'dataProvider' => $dataProvider,
                            'erreur' => $e->getMessage(),
                            
                ]);
            }
        }
       
        
    }
  
    // -----------------------------------SearchSeq
    // recupère la variable proposition. 
    // proposition : fonction qui implémente les sequences qu'on cherche
    // Logic / Logic Manager / VeritasLogic / WordsManager dans Includes
    public function actionSearch_seq() {
        $model = new Sequences();
        
            if (isset($_POST['Sequences']['proposition'])) {
                
                // requete SQL A VOIR AVEC GUIGUI
                
                return $this->render('listeResult', [
                        'model' => $model,
                 ]);
            
                

           
        } else {
            return $this->render('searchSeq', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Finds the Sequences model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Sequences the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Sequences::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
