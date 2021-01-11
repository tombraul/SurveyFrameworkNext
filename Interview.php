<?php

namespace PHPSurvey;

class Interview {
    public function __construct(
        public array $data = ['q1' => '1', 'q2' => '3'] // normally we get this info from db
    ){}
}