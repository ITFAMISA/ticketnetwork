<?php

class Concert {
    private $db;
    
    public function __construct($database) {
        $this->db = $database;
    }
    
    public function getAllConcerts() {
        $query = "SELECT * FROM concerts WHERE date >= CURDATE() ORDER BY date ASC";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getConcertById($id) {
        $query = "SELECT * FROM concerts WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function getAvailableTickets($concertId) {
        $query = "SELECT * FROM tickets WHERE concert_id = :concert_id AND status = 'available'";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':concert_id', $concertId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}