<?php

require_once 'database.php';
require_once '../app/controllers/ConcertController.php';
require_once '../app/controllers/TicketController.php';

$concertController = new ConcertController($db);
$ticketController = new TicketController($db);

$request = $_SERVER['REQUEST_URI'];
$path = parse_url($request, PHP_URL_PATH);
$segments = explode('/', trim($path, '/'));

switch ($path) {
    case '/':
    case '/inicio':
        $concertController->index();
        break;
        
    case '/conciertos':
        $concertController->index();
        break;
        
    case (preg_match('/\/conciertos\/(\d+)/', $path, $matches) ? true : false):
        $concertController->show($matches[1]);
        break;
        
    case '/comprar':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $concertController->purchase();
        } else {
            $concertController->index();
        }
        break;
        
    case '/mis-boletos':
        $ticketController->index();
        break;
        
    case (preg_match('/\/boletos\/(\d+)/', $path, $matches) ? true : false):
        $ticketController->show($matches[1]);
        break;
        
    case (preg_match('/\/boletos\/(\d+)\/pdf/', $path, $matches) ? true : false):
        $ticketController->downloadPDF($matches[1]);
        break;
        
    case '/nosotros':
        include '../app/views/pages/about.php';
        break;
        
    default:
        http_response_code(404);
        include '../app/views/errors/404.php';
        break;
}