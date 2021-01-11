<?php


namespace PHPSurvey;

/**
 * Filters columns or rows based on interview data. (only selected in..., show not selected in...)
 * @package PHPSurvey
 */
interface Filter {
    public function filterItems(array $interviewData, array $statements): array;
}