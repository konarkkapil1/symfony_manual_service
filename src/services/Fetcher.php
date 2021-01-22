<?php


namespace App\services;


use Symfony\Component\DependencyInjection\Container;

class Fetcher
{
    private $defaultUrl;
    public function __construct($defaultUrl){
        $this->defaultUrl = $defaultUrl;
    }

    public function get(){
        $result = file_get_contents($this->defaultUrl);
        return json_decode($result);
    }

}