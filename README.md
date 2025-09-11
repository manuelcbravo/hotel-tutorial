Sistema de Gestión Hotelera
🏨 Descripción

Este proyecto es un Sistema de Gestión de Hotel desarrollado con Laravel 12, Livewire 3 y FluxUI como framework de componentes.
Está diseñado para administrar:

👤 Clientes / Huéspedes
🛏️ Habitaciones y Tipos de habitación
📅 Reservaciones con estatus
💳 Facturación y pagos
🧾 Servicios extra (spa, comida, lavandería, etc.)
👨‍💼 Empleados del hotel

El sistema está optimizado para un solo hotel (no multihotel) y soporta PostgreSQL.
<hr>
🚀 Tecnologías

Laravel 12
 – Backend y ORM Eloquent

Livewire 3
 – Componentes dinámicos

FluxUI
 – UI moderna para Livewire

PostgreSQL
 – Base de datos relacional
<hr>
⚙️ Requisitos

PHP 8.2+
Composer 2+
Node.js 18+ y NPM/Yarn
PostgreSQL 14+
Extensiones de PHP: pgsql, pdo_pgsql
<hr>
Instalación

Clonar el repositorio:

git clone https://github.com/tuusuario/hotel-laravel.git
cd hotel-laravel


Instalar dependencias:

composer install
npm install && npm run build


Copiar el archivo de entorno:

cp .env.example .env


Configurar .env:

APP_NAME="Hotel Manager"
APP_URL=http://localhost:8000

DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=hotel_db
DB_USERNAME=postgres
DB_PASSWORD=secret


Generar key de Laravel:

php artisan key:generate

🗄️ Migraciones y Seeders

Ejecutar migraciones:

php artisan migrate


Ejecutar seeders (estatus de reservación y ejemplos):

php artisan db:seed
