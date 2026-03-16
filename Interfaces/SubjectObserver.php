<?php

interface SubjectObserver
{
    // Update Observer
    public function update(string $state, string $from): ?string;
}

?>