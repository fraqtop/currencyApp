<?php
/**
 * Created by PhpStorm.
 * User: abreb
 * Date: 01.03.2019
 * Time: 21:29
 */

namespace App;


class JsonParser extends Parser
{
    public function parse(Parsable $source): string
    {
        $data = json_decode($source->getData(), true);
        $pathSteps = explode('/', $source->getPath());
        foreach ($pathSteps as $step) {
            $data = $data[$step];
        }
        return $data;
    }
}