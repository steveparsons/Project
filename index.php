<?php

require_once ('Classes/Machines.php');
require_once ('Classes/Employee.php');

$machine = new Machines('Machine 1');

$employee = new Employee('Manager', 'Steven');
$machine->attach($employee);
$machine->notifyAllObservers();

?>