<?php


namespace PHPSurvey;


class Question
{
    public function __construct(
        private ?string $name = null,
        private array $rows,
        private array $columns,
        private ?QuestionCondition $condition = null
    ){
        $this->condition ??= new QuestionCondition(['q1' => '1', 'q1' => '3'], 'allOf');
    }
}