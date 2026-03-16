<?php
require_once ('Machines.php');
require_once ('Dashboard.php');

require dirname(__DIR__) . '/vendor/autoload.php';

use Ratchet\ConnectionInterface;
use Ratchet\MessageComponentInterface;

class DashboardManager implements MessageComponentInterface
{
  protected $clients;
  protected $employee;
  protected $machines = [];

  // Creates the machine to be obeserved by the dashboard
  public function __construct()
  {
    $this->clients = new \SplObjectStorage;

    $dashboard = new Dashboard('Machine Dashboard');
    $machine1 = new Machines('Machine 1');
    $machine2 = new Machines('Machine 2');
    $machine3 = new Machines('Machine 3');

    $machine1->attach($dashboard);
    $machine2->attach($dashboard);
    $machine3->attach($dashboard);

    $this->machines = [$machine1, $machine2, $machine3];
  }

  public function onOpen(ConnectionInterface $conn)
  {
    // Store the new connection to send messages to later
    $this->clients->attach($conn);
    echo "New connection! ({$conn->resourceId})\n";
  }

  /**
   * Altered to accept a pulse to change the machine state and then send the notiication
   *
   * @param ConnectionInterface $from
   * @param [type] $msg
   * @return void
   */
  public function onMessage(ConnectionInterface $from, $msg)
  {
    $state = $this->getRandomState();
    $machine = $this->getRandomMachine();
    $machine->setState($state);
    $msg = $machine->notifyAllObservers();

    foreach ($this->clients as $client) {
      $client->send($msg);
    }
  }

  /**
   * get a random machine
   *
   * @return void
   */
  public function getRandomMachine()
  {
    $randomMachine = array_rand($this->machines, 1);
    return $this->machines[$randomMachine];
  }

  /**
   * Gets a random state
   *
   * @return void
   */
  public function getRandomState()
  {
    $state = [Machines::IDLE, Machines::PRODUCING, Machines::STARVED];
    $randomState = array_rand($state, 1);
    return $state[$randomState];
  }

  /**
   * Handles when a connection is closed
   *
   * @param ConnectionInterface $conn
   * @return void
   */
  public function onClose(ConnectionInterface $conn)
  {
    // The connection is closed, remove from connection list
    $this->clients->detach($conn);
    echo "Connection {$conn->resourceId} has disconnected\n";
  }

  /**
   * Handles connection errors
   *
   * @param ConnectionInterface $conn
   * @param \Exception $e
   * @return void
   */
  public function onError(ConnectionInterface $conn, \Exception $e)
  {
    echo "An error has occurred: {$e->getMessage()}\n";
    $conn->close();
  }
}
