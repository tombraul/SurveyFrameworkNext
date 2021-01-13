<?php


namespace PHPSurvey;

use Jenssegers\Blade\Blade;

class Template
{
    public function __construct(
        private Blade $bladeEngine,
    ){
        $this->bladeEngine = new Blade();
    }
}