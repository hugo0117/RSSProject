<?php

class FrontControl
{
    function __construct()
    {
        global $rep, $vues; // nécessaire pour utiliser variables globales
        // on démarre ou reprend la session si necessaire (préférez utiliser un modèle pour gérer vos session ou cookies)
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $dVueErreur = array();

        $listeAction_Admin = array('ajout', 'flux', 'delete', 'disconnect', 'ajoutAdmin');

        try {
            $_REQUEST['action'] = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : null;
            $action = $_REQUEST['action'];

            if (in_array($action, $listeAction_Admin)) {
                if (ModelAdmin::isAdmin()!=null) {
                    new AdminControl();
                } else {
                    require ($rep.$vues['connection']);
                }
            } else {
                new UserControl();
            }
        }catch (PDOException $e)
        {
            //si erreur BD, pas le cas ici
            $dVueEreur[] =	"Erreur inattendue PDO!!! ";
            $dVueEreur[] =	$e->getMessage();
            require ($rep.$vues['erreur']);

        }
        catch (Exception $e2)
        {
            $dVueEreur[] =	"Erreur inattendue!!! ";
            $dVueEreur[] =	$e2->getMessage();
            require ($rep.$vues['erreur']);
        }

        //fin
        exit(0);
    }
}