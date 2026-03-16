<?php
require_once ('Classes/DashboardManager.php');

use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;

require dirname(__DIR__) . '/htdocs/vendor/autoload.php';

$server = IoServer::factory(
    new HttpServer(
        new WsServer(
            new DashboardManager()
        )
    ),
    8080
);
$server->run();
