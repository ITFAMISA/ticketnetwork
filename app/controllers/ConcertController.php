<?php

require_once '../models/Concert.php';
require_once '../models/Ticket.php';

class ConcertController {
    private $concertModel;
    private $ticketModel;
    
    public function __construct($database) {
        $this->concertModel = new Concert($database);
        $this->ticketModel = new Ticket($database);
    }
    
    public function index() {
        $concerts = $this->concertModel->getAllConcerts();
        include '../views/concerts/index.php';
    }
    
    public function show($id) {
        $concert = $this->concertModel->getConcertById($id);
        $availableTickets = $this->concertModel->getAvailableTickets($id);
        
        if (!$concert) {
            header("HTTP/1.0 404 Not Found");
            include '../views/errors/404.php';
            return;
        }
        
        include '../views/concerts/show.php';
    }
    
    public function purchase() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $concertId = $_POST['concert_id'];
            $userId = $_SESSION['user_id'] ?? null;
            $seatNumber = $_POST['seat_number'];
            $price = $_POST['price'];
            $type = $_POST['ticket_type'];
            
            if (!$userId) {
                header('Location: /login');
                return;
            }
            
            $result = $this->ticketModel->createTicket($concertId, $userId, $seatNumber, $price, $type);
            
            if ($result) {
                $_SESSION['success'] = 'Boleto comprado exitosamente';
                header('Location: /tickets');
            } else {
                $_SESSION['error'] = 'Error al procesar la compra';
                header('Location: /concerts/' . $concertId);
            }
        }
    }
}