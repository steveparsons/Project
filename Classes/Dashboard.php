<?php

require_once ('Observer.php');

/**
 * Observer of the subjects
 */
class Dashboard extends Observer
{
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * Updates Observer of changes in subject
     *
     * @param string $state
     * @param string $from
     * @return string|null
     */
    public function update(string $state, string $from): ?string
    {
        $update = ['machine' => strtolower(str_replace(' ', '', $from)), 'state' => strtolower($state)];
        return json_encode($update);
    }
}
