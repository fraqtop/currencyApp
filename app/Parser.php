<?php

namespace App;


abstract class Parser
{
    abstract public function parse(Parsable $source): string ;

    public static function getInstance(int $type)
    {
        switch ($type){
            case 1:
                return new JsonParser();
            case 2:
                return new XmlParser();
            default:
                return null;
        }
    }
}