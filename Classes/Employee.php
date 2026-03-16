<?php

require_once ('Observer.php');

/**
 * Creation of the Employee who willbe an obeserver.
 */
class Employee extends Observer
{
    public function __construct(
        public string $role,
        string $name
    ) {
        $this->name = $name;
    }

    /**
     * Outputting the change of state
     *
     * @param string $state
     * @param string $from
     * @return string|null
     */
    public function update(string $state, string $from): ?string
    {
        $stateUpdate =  'EMPLOTE NAME ' . $this->name . "\n EMPLOYEE ROLE" . $this->role . "\nMACHINE STATE " . $state . "\n MACHINE NAME " . $from;
        echo $stateUpdate;
        return $stateUpdate;
    }
}
