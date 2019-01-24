<?php
/**
 * Created by PhpStorm.
 * User: enmora
 * Date: 22/11/18
 * Time: 08:16
 */

class NewsGateway
{
    private $con;

    public function __construct(Connection $con)
    {
        $this->con=$con;
    }

    public function findAll(){
        $query='SELECT * FROM NEWS';
        $this->con->executeQuery($query);
        $results=$this->con->getResults();
        $tableNews=[];
        foreach($results as $row){
            $tableNews[]=new News($row['URL'], $row['TITLE'], $row['DESCRIPTION'],$row['DATE']);
        }
        return $tableNews;
    }

    public function getNbNews(){
        $query='SELECT COUNT(*) FROM NEWS';
        $this->con->executeQuery($query);
        return $this->con->getResults()[0]['COUNT(*)'];
    }

    public function findAtPage($page){
        global $nbParPage;
        $query='SELECT * FROM NEWS ORDER BY DATE DESC LIMIT :decal , :nbParPage ;';
        $this->con->executeQuery($query, array(
            ':decal' => array(($page-1)*$nbParPage, PDO::PARAM_INT),
            ':nbParPage' => array($nbParPage, PDO::PARAM_INT)
            )
        );
        $results=$this->con->getResults();
        $tableNews=[];
        foreach($results as $row){
            $tableNews[]=new News($row['URL'], $row['TITLE'], $row['DESCRIPTION'],$row['DATE']);
        }
        return $tableNews;

    }

    public function findByAddress($address): News{
        $query='SELECT * FROM NEWS WHERE URL=:address';
        $this->con->executeQuery($query, array(
            ':address' => array($address, PDO::PARAM_STR)
            )
        );
        $results=$this->con->getResults();
        return new News($results[0]['URL'], $results[0]['TITLE'], $results[0]['DESCRIPTION'],$results[0]['DATE']);
    }

    public function insert(News $news){
        $query='INSERT INTO NEWS VALUES(:address, :title, :des, :dte)';
        $this->con->executeQuery($query, array(
                ':address' => array($news->getAddress(), PDO::PARAM_STR),
                ':title' => array($news->getTitle(), PDO::PARAM_STR),
                ':des' => array($news->getDescription(), PDO::PARAM_STR),
                ':dte' => array(date_create_from_format(DateTime::RSS, $news->getDate())->format('Y-m-d H:i:s'), PDO::PARAM_STR))
        );
    }

    public function delete($address){
        $query='DELETE FROM NEWS WHERE URL=:address';
        $this->con->executeQuery($query, array(
            ':address' => array($address, PDO::PARAM_STR)
            )
        );
    }

    public function deleteAll(){
        $query='DELETE FROM NEWS';
        $this->con->executeQuery($query);
    }

    public function update($address, $newDescription){
        $query='UPDATE NEWS SET DESCRIPTION=:des WHERE URL=:address';
        $this->con->executeQuery($query, array(
            ':address' => array($address, PDO::PARAM_STR),
            ':des' => array($newDescription, PDO::PARAM_STR)
            )
        );
    }


}