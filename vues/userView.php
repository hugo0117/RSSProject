<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width-device-width, initial-scale=1">
    <meta charset="utf-8">
    <title>Articles</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <style type="text/css">
        html,body{
            height: 100%;
        }

        body{
            background-color: lightgrey;
        }
        .news{
            text-align: justify;
            border: solid 2px;
        }
    </style>
</head>
<body>

<?php

    if(ModelAdmin::isAdmin()) {
        echo '<div><input id="flux" type="button" value="Gérer les flux" class="btn btn-success">';
        echo '<input type="button" id="disconnect" value="Déconnexion" class="btn btn-danger"></div></br>';
    }
    else{
        echo '<div><input id="flux" type="button" value="Connexion" class="btn btn-primary"></div></br>';
    }

    echo '<div> <p class="bg-danger text-center"> <a href="index.php?page=1"><-</a> <a href="index.php?page=' . ($page-1) . '"><</a> <a>' . $page . '</a> <a href="index.php?page=' . ($page+1) . '">></a> <a href="index.php?page=' . ModelNews::getNbPagesNews() . '">-></a> </div></br></p>';

    echo '<div class="container">';
    echo '<div class="row">';
    if(isset($tabNews)) {
        foreach ($tabNews as $new) {
            echo '<div class=" news col-md-6"><h2>' . $new->getTitle() . '</h2><p>' . $new->getDate() . '</p><p>' . $new->getDescription() . '</p><a href="'.$new->getAddress().'">La suite ici !</a></div></br>';
        }

    }
    echo '</div>';
    echo '</div>';

    echo '<div><span class="border border-dark"> <p class="bg-danger text-center"> <a href="index.php?page=1"><-</a> <a href="index.php?page=' . ($page-1) . '"><</a> <a>' . $page . '</a> <a href="index.php?page=' . ($page+1) . '">></a> <a href="index.php?page=' . ModelNews::getNbPagesNews() . '">-></a> </span></div></br></p>';
?>



<script>
    boutonFlux=document.querySelector("#flux");
    boutonFlux.addEventListener("click", function(){
        window.location='index.php?action=flux';
    });

    <?php
        if(ModelAdmin::isAdmin()){
            echo 'boutonDeco=document.querySelector("#disconnect");
            boutonDeco.addEventListener("click", function(){
                if(confirm("Confirmer déconnexion ?")) {
                    window.location = "index.php?action=disconnect";
                }
            });';
        }
    ?>
</script>



</body>
</html>