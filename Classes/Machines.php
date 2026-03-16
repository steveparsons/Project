<?php

require_once ('Subject.php');

/**
 * Used to create machines
 */
class Machines extends Subject
{
    // Different Machine States
    const PRODUCING = 'PRODUCING';
    const IDLE = 'IDLE';
    const STARVED = 'STARVED';

    public function __construct(
        public string $name
    ) {
        $this->setState(SELF::IDLE);
    }
}
