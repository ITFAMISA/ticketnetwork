<?php

class Ticket {
    private $db;
    
    public function __construct($database) {
        $this->db = $database;
    }
    
    public function createTicket($concertId, $userId, $seatNumber, $price, $type) {
        $query = "INSERT INTO tickets (concert_id, user_id, seat_number, price, type, purchase_date, status) 
                  VALUES (:concert_id, :user_id, :seat_number, :price, :type, NOW(), 'purchased')";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':concert_id', $concertId);
        $stmt->bindParam(':user_id', $userId);
        $stmt->bindParam(':seat_number', $seatNumber);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':type', $type);
        return $stmt->execute();
    }
    
    public function getUserTickets($userId) {
        $query = "SELECT t.*, c.title, c.date, c.venue, c.image 
                  FROM tickets t 
                  JOIN concerts c ON t.concert_id = c.id 
                  WHERE t.user_id = :user_id 
                  ORDER BY c.date ASC";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':user_id', $userId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function validateTicket($ticketId) {
        $query = "SELECT * FROM tickets WHERE id = :id AND status = 'purchased'";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $ticketId);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}