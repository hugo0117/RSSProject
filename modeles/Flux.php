<?php
/**
 * Created by PhpStorm.
 * User: enmora
 * Date: 29/11/18
 * Time: 08:01
 */

class Flux
{
    private $url;

    public function __construct($url){
        $this->url=$url;
    }

    public function getUrl(){
        return $this->url;
}
}