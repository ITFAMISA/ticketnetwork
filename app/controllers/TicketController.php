<?php

require_once '../models/Ticket.php';

class TicketController {
    private $ticketModel;
    
    public function __construct($database) {
        $this->ticketModel = new Ticket($database);
    }
    
    public function index() {
        $userId = $_SESSION['user_id'] ?? null;
        
        if (!$userId) {
            header('Location: /login');
            return;
        }
        
        $tickets = $this->ticketModel->getUserTickets($userId);
        include '../views/tickets/index.php';
    }
    
    public function show($id) {
        $ticket = $this->ticketModel->validateTicket($id);
        
        if (!$ticket) {
            header("HTTP/1.0 404 Not Found");
            include '../views/errors/404.php';
            return;
        }
        
        include '../views/tickets/show.php';
    }
    
    public function downloadPDF($id) {
        $ticket = $this->ticketModel->validateTicket($id);
        
        if (!$ticket) {
            header("HTTP/1.0 404 Not Found");
            return;
        }
        
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="ticket_' . $id . '.pdf"');
        
        include '../views/tickets/pdf.php';
    }
}