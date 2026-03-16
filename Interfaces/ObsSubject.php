<?php

interface ObsSubject
{
    // add observer
    public function attach(SubjectObserver $observer): void;

    public function setState(string $state): void;

    public function notifyAllObservers(): string;
}

?>