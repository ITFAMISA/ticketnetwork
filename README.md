# TicketSound - Sistema de Venta de Boletos para Conciertos

Sistema web desarrollado en PHP siguiendo el patrón MVC para la venta de boletos de conciertos en línea.

## 🎯 Características

- **Catálogo de Conciertos**: Visualización de eventos disponibles
- **Sistema de Compras**: Proceso seguro de compra de boletos
- **Gestión de Boletos**: Los usuarios pueden ver y descargar sus boletos
- **Panel Administrativo**: Gestión de conciertos y ventas
- **Diseño Responsivo**: Compatible con dispositivos móviles

## 🏗️ Arquitectura MVC

```
├── app/
│   ├── controllers/     # Controladores de la aplicación
│   ├── models/         # Modelos de datos
│   └── views/          # Vistas y templates
├── config/             # Configuración de la aplicación
├── database/           # Scripts de base de datos
└── public/            # Archivos públicos (CSS, JS, imágenes)
```

## 🚀 Instalación

### Requisitos
- PHP 7.4 o superior
- MySQL 5.7 o superior
- Apache/Nginx con mod_rewrite

### Pasos de Instalación

1. **Clonar el repositorio**
   ```bash
   git clone [url-del-repositorio]
   cd templatemo_580_woox_travel
   ```

2. **Configurar la base de datos**
   ```bash
   mysql -u root -p < database/schema.sql
   ```

3. **Configurar conexión a BD**
   Editar `config/database.php` con tus credenciales:
   ```php
   private $host = 'localhost';
   private $db_name = 'ticketsound_db';
   private $username = 'tu_usuario';
   private $password = 'tu_contraseña';
   ```

4. **Configurar servidor web**
   - Document root: `/public`
   - Habilitar mod_rewrite
   - Configurar .htaccess para URLs amigables

## 📁 Estructura de Archivos

### Controladores
- `ConcertController.php`: Gestión de conciertos
- `TicketController.php`: Gestión de boletos

### Modelos
- `Concert.php`: Modelo de conciertos
- `Ticket.php`: Modelo de boletos

### Vistas
- `layouts/`: Templates base
- `concerts/`: Vistas de conciertos
- `tickets/`: Vistas de boletos

## 🎨 Personalización

### Cambiar Estilos
Los archivos CSS están en `/public/css/`
- `templatemo-woox-travel.css`: Estilos principales

### Agregar JavaScript
Los archivos JS están en `/public/js/`
- `custom.js`: JavaScript personalizado

## 🔧 Funcionalidades Implementadas

✅ **Sistema de Navegación**
- Menú adaptado para conciertos
- URLs amigables

✅ **Gestión de Conciertos**
- Listado de conciertos
- Detalles de eventos
- Sistema de búsqueda

✅ **Sistema de Boletos**
- Compra de boletos
- Gestión de inventario
- Descarga de boletos

## 🚧 Próximas Funcionalidades

- [ ] Sistema de autenticación
- [ ] Pasarela de pagos
- [ ] Panel de administración
- [ ] Notificaciones por email
- [ ] Sistema de reseñas
- [ ] API REST

## 📄 Licencia

Basado en la plantilla TemplateMo 580 Woox Travel, adaptada para sistema de venta de boletos.