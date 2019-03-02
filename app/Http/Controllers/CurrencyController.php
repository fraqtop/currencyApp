<?php

namespace App\Http\Controllers;

use App\Parser;
use App\Source;

class CurrencyController extends Controller
{
    public function get()
    {
        return view('index', ['rate' => $this->getCurrentRate()]);
    }

    public function update()
    {
        return $this->getCurrentRate();
    }

    private function getCurrentRate()
    {
        $sources = Source::orderBy('priority', 'DESC')->get();
        foreach ($sources as $source) {
            $source->setParser(Parser::getInstance($source->typeId));
            $rate = $source->getRate();
            if ($rate) {
                return $rate;
            }
        }
        abort(503);
    }
}
