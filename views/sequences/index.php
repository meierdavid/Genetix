<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SequencesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Sequences');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sequences-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Sequences'), ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'Search Sequences'), ['search_seq'], ['class' => 'btn btn-success']) ?>
    
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_sequence',
            'semantics',
            'functional_structure',
            'weak_constraint',
            'strong_constraint',
            // 'size',
            // 'nb_genes',
            // 'genes_at_ends',
            // 'id_permutation_class',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    
    <h1>Chercher des séquences</h1>
<div class="cadreh1">
<form method="post" action="#" onsubmit="return false;">
	  <label for="fonction">Entrer une fonction</label>&nbsp;:&nbsp;<input type="text" class="post" style="width: 320px" id="fonction" name="fonction" value="{$fonction}" onkeyup="chargeAjax('#resultat', 'searchSeq.php?fonction='+encodeURI($('#fonction').val().replace(/\+/g, '-')));" />
      <input type="submit" name="submit" value="Chercher" onclick="chargeAjax('#resultat', 'searchSeq.php?fonctionSearch='+encodeURI($('#fonction').val().replace(/\+/g, '-')));" class='mainoption'/>
      </form>
</div> 
<div id="resultat">
</div> 

</div>
