<?php
require_once ('./Interfaces/ObsSubject.php');
require_once ('./Interfaces/SubjectObserver.php');

/**
 * Subject,that who makes news
 */
class Observer implements SubjectObserver
{
    public string $name;

    public function __construct() {}

    /**
     * Updates Observer of changes in the subject
     *
     * @param string $state
     * @param string $from
     * @return string|null
     */
    public function update(string $state, string $from): ?string
    {
        return "";
    }
}
