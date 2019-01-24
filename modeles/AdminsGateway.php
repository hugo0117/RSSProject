<?php
/**
 * Created by PhpStorm.
 * User: enmora
 * Date: 13/12/18
 * Time: 08:03
 */

class AdminsGateway
{
    private $con;

    public function __construct(Connection $con)
    {
        $this->con=$con;
    }

    public function adminExists($login, $mdp){
        $query='SELECT * FROM ADMINS WHERE LOGIN=:login';
        $this->con->executeQuery($query, array(
                ':login' => array($login, PDO::PARAM_STR)
            )
        );
        $results=$this->con->getResults();
        if(!empty($results) & password_verify($mdp, $results[0]['PASSWORD'])){
            return new Admin($login);
        }
        return null;
    }

    public function addAdmin($login, $mdp){
        $query='INSERT INTO ADMINS VALUES (:login, :passwd)';
        $this->con->executeQuery($query, array(
            ':login' => array ($login, PDO::PARAM_STR),
            ':passwd' => array(password_hash($mdp, PASSWORD_DEFAULT), PDO::PARAM_STR)
            )
        );
    }
}