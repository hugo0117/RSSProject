<?php

//gen
$rep=__DIR__.'/../';

// liste des modules à inclure

//$dConfig['includes']= array('controleur/Validation.php');



//BD

$base="mysql:host=localhost:3306;dbname=dbenmora";
$login="root";
$mdp="";


//Articles

$nbParPage=10;

//Vues

$vues['erreur']='vues/erreur.php';
$vues['vuephp1']='vues/vuephp1.php';
$vues['userView']='vues/userView.php';
$vues['adminView']='vues/adminView.php';
$vues['formAjout']='vues/formulaireAjout.html';
$vues['connection']='vues/formulaireConnection.html';
$vues['ajoutAdmin']='vues/formulaireAjoutAdmin.html';

?>