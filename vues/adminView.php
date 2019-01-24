<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Articles</title>
    <meta name="viewport" content="width-device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <style type="text/css">
        html,body{
            height: 100%;
        }

        body{
            background-image: url("../img/news.jpg");
            background-repeat: no-repeat;
            background-size: 100% 100%;
        }
    </style>
</head>
<body>
<?php

    echo '<div class="container">';
        echo '<input id="retour" type="button" value="Retourner aux news" class="btn btn-default">';
        echo '<input type="button" id="parser" value="Parser" class="btn btn-primary">';
        echo '<input type="button" id="ajoutAdmin" value="Ajouter un administrateur" class="btn btn-default">';
        echo '<input type="button" id="disconnect" value="Déconnexion" class="btn btn-danger">';
    echo '</div>';
    echo '</br>';

    if(isset($tabFlux)) {
        foreach ($tabFlux as $flux) {
            echo '<div class="container"><p><a href="' . $flux->getUrl() . '">' . $flux->getUrl() . '</a><input class="sup btn btn-danger" type="button" value="Supprimer"></p></br></div>';

        }
    }

    require ($rep.$vues['formAjout']);

?>

<script>
    tabBouton=document.querySelectorAll(".sup");
    tabBouton.forEach(function (elem) {
        elem.addEventListener("click", function(){
            if(confirm("Confirmer suppression ?")) {
                window.location = `index.php?action=delete&urlFlux=${elem.previousSibling.innerHTML}`;
            }
        });
    });

    boutonRetour=document.querySelector("#retour");
    boutonRetour.addEventListener("click", function(){
        window.location='index.php';
    });

    boutonDeco=document.querySelector("#disconnect");
    boutonDeco.addEventListener("click", function(){
       if(confirm("Confirmer déconnexion ?")) {
            window.location = 'index.php?action=disconnect';
        }
    });

    boutonAdmin=document.querySelector("#ajoutAdmin");
    boutonAdmin.addEventListener("click", function(){
        window.location = 'index.php?action=ajoutAdmin';
    });

    boutonParse=document.querySelector("#parser");
    boutonParse.addEventListener("click", function(){
        if(confirm("Parser ?")) {
            window.location = 'parser';
        }
    });


</script>

</body>
</html>