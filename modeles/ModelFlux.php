<?php
/**
 * Created by PhpStorm.
 * User: enmora
 * Date: 06/12/18
 * Time: 09:46
 */

class ModelFlux
{
    public static function addFlux($url){
        global $base, $login, $mdp;

        $fluxG=new FluxGateway(new Connection($base, $login, $mdp));
        $fluxG->insert(new Flux($url));
    }

    public static function delFlux($url){
        global $base, $login, $mdp;

        $fluxG=new FluxGateway(new Connection($base, $login, $mdp));
        $fluxG->delete($url);
    }


    public static function getFlux(){
        global $base, $login, $mdp;

        $fluxG=new FluxGateway(new Connection($base, $login, $mdp));
        return $fluxG->findAll();
    }
}