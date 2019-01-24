<?php
/**
 * Created by PhpStorm.
 * User: enmora
 * Date: 29/11/18
 * Time: 08:01
 */

class FluxGateway
{
    private $con;

    public function __construct(Connection $con)
    {
        $this->con=$con;
    }

    public function findAll(){
        $query='SELECT * FROM FLUX';
        $this->con->executeQuery($query);
        $results=$this->con->getResults();
        $tableFlux=[];
        foreach($results as $row){
            $tableFlux[]=new Flux($row['URL']);
        }
        return $tableFlux;
    }

    public function findByAddress($address): Flux{
        $query='SELECT * FROM FLUX WHERE URL=:address';
        $this->con->executeQuery($query, array(
            ':address' => array($address, PDO::PARAM_STR)
            )
        );
        $results=$this->con->getResults();
        return new Flux($results['URL']);
    }

    public function insert(Flux $flux){
        $query='INSERT INTO FLUX VALUES(:address)';
        $this->con->executeQuery($query, array(
            ':address' => array($flux->getUrl(), PDO::PARAM_STR)
        )
        );
    }

    public function delete($address){
        $query='DELETE FROM FLUX WHERE URL=:address';
        $this->con->executeQuery($query, array(
            ':address' => array($address, PDO::PARAM_STR)
            )
        );
    }
}