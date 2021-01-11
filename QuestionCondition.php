<?php


namespace PHPSurvey;


class QuestionCondition
{
    public function __construct(
        private array $assumptions = [],
        private string $type = 'allOf'
    ){}

    /**
     * Check if the current interview meets the criteria of accessing the question
     * @param Interview $interview
     * @return bool
     */
    public function check(Interview $interview): bool
    {
        return match ($this->type) {
            'allOf' => $this->allOf($interview->data),
            'oneOf' => $this->oneOf($interview->data),
        };
    }


    /**
     * In case all assumptions are true
     * @param array $data
     * @return bool
     */
    private function allOf(array $data): bool
    {
        $check = true;
        foreach ($this->assumptions as $assume => $toBe) {
            if ($data[$assume] != $toBe) {
                $check = false;
            }
        }
        return $check;
    }

    /**
     * At least one of the assumptions is true
     * @param array $data
     * @return bool
     */
    private function oneOf(array $data): bool
    {
        foreach ($this->assumptions as $assume => $toBe) {
            if ($data[$assume] == $toBe) {
                return true;
            }
        }
        return false;
    }
}