<?php
/**
 * Created by PhpStorm.
 * User: enmora
 * Date: 22/11/18
 * Time: 08:07
 */

class News
{
    private $address;
    private $desc;
    private $date;
    private $title;

    public function __construct($address = "", $title = "", $desc = "", $date = "")
    {
        $this->address=$address;
        $this->desc=$desc;
        $this->date=$date;
        $this->title=$title;
    }

    public function getAddress(){
        return $this->address;
    }

    public function getDescription(){
        return $this->desc;
    }

    public function getTitle(){
        return $this->title;
    }

    public function getDate(){
        return $this->date;
    }

    public function setAddress($address){
        $this->address = $address;
    }

    public function setDescription($desc){
        $this->desc = $desc;
    }

    public function setTitle($date){
        $this->title = $date;
    }

    public function setDate($title){
        $this->date = $title ;
    }
}