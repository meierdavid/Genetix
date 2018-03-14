<h1>Détails de la séquence</h1>
<div class="cadreh1">
Séquence : {$word->toHTML()} <br />
Format texte : {$word->to_string()} <br />
Fonction implémentée : {$veritas->getMinimalDisjunctiveForm()} ({$veritas->outputToString()}) <br />
Taille : {$word->getLength()} bases <br />
Symétrique : {$word->getSymetric()->toHTML()} <br />
Table de vérité : <br />
{$veritas->toHTML()}
<a class="minibouton" href="listSeq.php?output={$veritas->getMinimalOutput()}&amp;nbInputs={$veritas->getMinimalNbInputs()}"><span>{t('Voir les séquences implémentant la même fonction.')}</span></a>
</div>
