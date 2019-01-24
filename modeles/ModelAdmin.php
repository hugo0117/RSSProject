<?php
/**
 * Created by PhpStorm.
 * User: enmora
 * Date: 13/12/18
 * Time: 07:49
 */

class ModelAdmin
{
    public static function connection($loginAdmin, $password){
        global $base, $login, $mdp;

        $adminG=new AdminsGateway(new Connection($base, $login, $mdp));
        if($adminG->adminExists($loginAdmin, $password)){
            $_SESSION['role']='admin';
            $_SESSION['login']=$loginAdmin;
            return new Admin($loginAdmin);
        }
        else{
            return null;
        }
    }

    public static function deconnection(){
        session_unset();
        session_destroy();
        $_SESSION=array();
    }

    public static function ajouterAdmin($loginAdmin, $mdpAdmin){
        global $base, $login, $mdp;

        $adminG = new AdminsGateway(new Connection($base, $login, $mdp));
        $adminG->addAdmin($loginAdmin, $mdpAdmin);
    }

    public static function isAdmin(){
        if(isset($_SESSION['login']) && isset($_SESSION['role'])){
            $login=filter_var($_SESSION['login'], FILTER_SANITIZE_STRING);
            $role=filter_var($_SESSION['role'], FILTER_SANITIZE_STRING);
            if($role=='admin'){
                return new Admin($login);
            }
        }
        return null;
    }
}