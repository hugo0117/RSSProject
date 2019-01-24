<?php
/**
 * Created by PhpStorm.
 * User: enmora
 * Date: 06/12/18
 * Time: 09:46
 */

class ModelNews
{
    public static function getNewsAtPage($page){
        global $base, $login, $mdp;

        $news=new NewsGateway(new Connection($base, $login, $mdp));
        return $news->findAtPage($page);
    }

    public static function getNbPagesNews(){
        global $base, $login, $mdp, $nbParPage;

        $news=new NewsGateway(new Connection($base, $login, $mdp));
        return ceil($news->getNbNews()/$nbParPage);
    }

    public static function addNews($newsAInserer){
        global $base, $login, $mdp;

        $news=new NewsGateway(new Connection($base, $login, $mdp));
        $news->insert($newsAInserer);
    }
    public static function delAllNews(){
        global $base, $login, $mdp;

        $news=new NewsGateway(new Connection($base, $login, $mdp));
        $news->deleteAll();
    }

}