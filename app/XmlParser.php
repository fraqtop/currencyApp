<?php

namespace App;


class XmlParser extends Parser
{
    public function parse(Parsable $source): string
    {
        $data = simplexml_load_string($source->getData());
        $data->registerXPathNamespace('data', $source->getNamespace());
        return $data->xpath($source->getPath())[0];
    }
}