
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Sequences */
/* @var $form yii\widgets\ActiveForm */
?>

<script src="./js/ajax.js"></script>
<div class="sequences-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <h1>Intrepréter une séquence</h1>
    <div class="cadreh1">
        <form method="post" action="#" onsubmit="return false;">
            <label for="sequence">Entrer une séquence</label>&nbsp;:&nbsp;<input type="text" class="post" style="width: 320px" id="sequence" name="sequence" onkeyup="chargeAjax('#resultat', 'interSeq.php?sequence='+encodeURI($('#sequence').val()));" />
            
             <input type="submit" name="submit" class="btn btn-success" value="Interpréter" onclick="chargeAjax('#resultat', 'interSeq.php?sequence='+$('#sequence').val());" class='mainoption'/>
            
        </form>
    </div> 
    <div id="resultat">
    </div>
   
    

    <?php ActiveForm::end(); ?>
<div id="resultat">
</div> 
<img src="img/ajax-loader.gif" alt="{t('chargement')}" class="ajaxLoader" />
