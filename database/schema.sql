-- Crear base de datos
CREATE DATABASE IF NOT EXISTS ticketsound_db;
USE ticketsound_db;

-- Tabla de conciertos
CREATE TABLE concerts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    date DATETIME NOT NULL,
    venue VARCHAR(255) NOT NULL,
    image VARCHAR(255) DEFAULT '/public/images/default-concert.jpg',
    min_price DECIMAL(10, 2) NOT NULL,
    max_price DECIMAL(10, 2) NOT NULL,
    total_capacity INT NOT NULL,
    available_tickets INT NOT NULL,
    status ENUM('active', 'sold_out', 'cancelled') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Tabla de usuarios
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    name VARCHAR(255) NOT NULL,
    phone VARCHAR(20),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabla de boletos
CREATE TABLE tickets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    concert_id INT NOT NULL,
    user_id INT NOT NULL,
    seat_number VARCHAR(50),
    price DECIMAL(10, 2) NOT NULL,
    type ENUM('general', 'vip', 'premium') DEFAULT 'general',
    status ENUM('available', 'purchased', 'cancelled') DEFAULT 'purchased',
    purchase_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    qr_code VARCHAR(255),
    FOREIGN KEY (concert_id) REFERENCES concerts(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Insertar datos de ejemplo
INSERT INTO concerts (title, description, date, venue, min_price, max_price, total_capacity, available_tickets) VALUES
('Rock Festival 2025', 'Los mejores grupos de rock nacional se reúnen en un espectáculo único. No te pierdas esta experiencia musical inolvidable.', '2025-12-15 20:00:00', 'Estadio Nacional', 45000, 150000, 50000, 50000),
('Pop Festival 2025', 'Una noche mágica con los artistas pop más populares del momento.', '2025-11-20 19:30:00', 'Movistar Arena', 35000, 120000, 15000, 15000),
('Concierto Acústico', 'Una experiencia íntima con música acústica de alta calidad.', '2025-10-10 21:00:00', 'Teatro Municipal', 25000, 80000, 2000, 2000),
('Festival Electrónico', 'La mejor música electrónica con DJs internacionales.', '2025-11-30 22:00:00', 'Parque O\'Higgins', 40000, 100000, 30000, 30000);

INSERT INTO users (email, password, name, phone) VALUES
('admin@ticketsound.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Administrador', '+56912345678');