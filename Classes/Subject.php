<?php

require_once ('./Interfaces/ObsSubject.php');
require_once ('./Interfaces/SubjectObserver.php');

/**
 * Subject
 */
class Subject implements ObsSubject
{
    public string $state;
    private array $observers;
    public string $name;

    public function __construct() {}

    /**
     * attaches an obeserver to monitor changes
     *
     * @param SubjectObserver $observer
     * @return void
     */
    public function attach(SubjectObserver $observer): void
    {
        $this->observers[] = $observer;
    }

    /**
     * Sets state of the subject
     *
     * @param string $state
     * @return void
     */
    public function setState(string $state): void
    {
        $this->state = $state;
    }

    /**
     * Notify All Observers of changes
     *
     * @return string
     */
    public function notifyAllObservers(): string
    {
        $observerMessage = '';
        foreach ($this->observers as $observer) {
            $observerMessage = $observer->update($this->state, $this->name);
        }
        return $observerMessage;
    }
}
