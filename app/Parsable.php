<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

abstract class Parsable extends Model
{
    /**
     * @var Parser
     */
    protected $parser;

    abstract public function getNamespace(): string ;
    abstract public function getPath(): string ;
    abstract public function getData();

    public function type()
    {
        return $this->belongsTo(Type::class, 'typeId');
    }

    public function setParser(Parser $newParser)
    {
        $this->parser = $newParser;
    }
}