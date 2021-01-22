<?php


namespace App\services;


use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;

class Fetcher
{

    private $defaultUrl;
    public function __construct($defaultUrl){
        $this->defaultUrl = $defaultUrl;
    }

    public function get(){
        $cache = new FilesystemAdapter();
        $users = $cache->getItem("users");
        if(!$users->isHit()){
            $result = file_get_contents($this->defaultUrl);
            $users->set($result);
            $cache->save($users);
            $final = $users->get();
        }
//        $result = file_get_contents($this->defaultUrl);
//        $users->set(file_get_contents($this->defaultUrl));
        $final = $users->get();

        return json_decode($final);
    }

}