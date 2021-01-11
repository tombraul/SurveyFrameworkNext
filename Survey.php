<?php


namespace PHPSurvey;


class Survey
{
    public function __construct(
        public ?string $name = null,
        public ?int $number = null
    ){}
}