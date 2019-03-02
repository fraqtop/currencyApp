<?php

namespace App;


class Source extends Parsable
{
    public $timestamps = false;
    protected $guarded = ['id'];

    public function getNamespace(): string
    {
        return $this->namespace;
    }

    public function getPath(): string
    {
        return $this->dataPath;
    }

    public function getData()
    {
        return file_get_contents($this->url);
    }

    public function getRate()
    {
        try{
            $result = $this->parser->parse($this);
        } catch (\Exception $e) {
            return null;
        }
        return $result;
    }
}
