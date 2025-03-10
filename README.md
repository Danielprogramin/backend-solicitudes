# Sistema de Gestión de Estudios de Seguridad - Backend (Laravel 11)

Este proyecto implementa una API RESTful para un sistema de gestión de solicitudes de estudios de seguridad, desarrollada con Laravel 11.

## Tecnologías Utilizadas

- **Laravel 11**: Framework PHP para el desarrollo del backend
- **PHP 8.2**: Lenguaje de programación
- **Postgres 8.0**: Sistema de gestión de base de datos
- **Laravel Sanctum**: Para la autenticación basada en tokens
- **Composer**: Gestor de dependencias de PHP

## Requisitos Previos

- PHP 8.2 o superior
- Composer
- Postgres 8.0 o superior
- Servidor web PHP artisan serve

## Instalación

1. **Clonar el repositorio**
   ```bash
   git clone https://github.com/Danielprogramin/backend-solicitudes.git
   cd gestion-estudios-seguridad-backend
   ```

2. **Instalar dependencias**
   ```bash
   composer install
   ```

3. **Configurar el entorno**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Configurar la base de datos**
   - Editar el archivo `.env` con los datos de conexión a la base de datos:
     ```
     APP_NAME=Laravel
     APP_ENV=local
     APP_KEY=
     APP_DEBUG=true
     APP_TIMEZONE=UTC
     APP_URL=http://localhost:8000
     FRONTEND_URL=http://localhost:4200

     ```

     ```
     DB_CONNECTION=pgsql
     DB_HOST=127.0.0.1
     DB_PORT=5432
     DB_DATABASE=solicitudes
     DB_USERNAME=postgres
     DB_PASSWORD=
     ```

     ```
     SANCTUM_STATEFUL_DOMAINS=http://localhost:4200
     ```

5. **Ejecutar migraciones y seeders**
   ```bash
   php artisan migrate
   php artisan db:seed
   ```
   Este comando creará las tablas necesarias y cargará datos iniciales, incluyendo:
   - Usuario administrador (admin@example.com/admin)
   - Tipos de estudio predefinidos

6. **Iniciar el servidor**
   ```bash
   php artisan serve
   ```
   La API estará disponible en `http://localhost:8000`

## Estructura del Proyecto

```
app/
├── Http/
│   ├── Controllers/
│   │   ├── AuthController.php         # Gestión de autenticación
│   │   ├── CandidatoController.php    # CRUD de candidatos
│   │   ├── TipoEstudioController.php  # Listado y detalle de tipos de estudio
│   │   └── SolicitudController.php    # CRUD de solicitudes
│   ├── Requests/                      # Validación de formularios
│   ├── Resources/                     # Transformación de datos para la API
│   └── Middleware/                    # Middleware de autenticación y otros
├── Models/
│   ├── User.php
│   ├── Candidato.php
│   ├── TipoEstudio.php
│   └── Solicitud.php
├── Database/
│   ├── Migrations/                    # Estructura de tablas
│   └── Seeders/                       # Datos iniciales
└── Routes/
    └── api.php                        # Definición de rutas de la API
```

## Rutas de la API

### Autenticación
- `POST /api/login`: Iniciar sesión
- `POST /api/logout`: Cerrar sesión
- `GET /api/user`: Obtener usuario autenticado

### Candidatos
- `GET /api/candidatos`: Listar todos los candidatos
- `GET /api/candidatos/{id}`: Obtener detalle de un candidato
- `POST /api/candidatos`: Crear un nuevo candidato
- `PUT /api/candidatos/{id}`: Actualizar un candidato
- `DELETE /api/candidatos/{id}`: Eliminar un candidato

### Tipos de Estudio
- `GET /api/tipos-estudio`: Listar todos los tipos de estudio
- `GET /api/tipos-estudio/{id}`: Obtener detalle de un tipo de estudio

### Solicitudes
- `GET /api/solicitudes`: Listar todas las solicitudes (con filtros opcionales)
- `GET /api/solicitudes/{id}`: Obtener detalle de una solicitud
- `POST /api/solicitudes`: Crear una nueva solicitud
- `PUT /api/solicitudes/{id}`: Actualizar una solicitud
- `PATCH /api/solicitudes/{id}/estado`: Actualizar el estado de una solicitud
- `DELETE /api/solicitudes/{id}`: Eliminar una solicitud

## Decisiones Técnicas

### Arquitectura API RESTful
Se ha implementado una API RESTful siguiendo las mejores prácticas:
- Uso de verbos HTTP (GET, POST, PUT, DELETE) según corresponda
- Respuestas con códigos HTTP apropiados
- Uso de API Resources para transformar modelos en respuestas JSON consistentes

### Autenticación con Sanctum
Se eligió Laravel Sanctum para la autenticación por:
- Soporte nativo para SPA (Single Page Applications)
- Implementación sencilla
- Seguridad mediante tokens

### Validación de Datos
- Uso de Form Requests para centralizar la validación
- Reglas específicas para cada campo (formatos de correo, teléfono, etc.)
- Mensajes de error personalizados

### Base de Datos
- Relaciones definidas en los modelos Eloquent
- Índices en campos críticos para optimizar consultas
- Restricciones a nivel de base de datos para garantizar integridad referencial


## Credenciales de Prueba
- **Usuario**: admin@example.com
- **Contraseña**: admin

## Licencia
Este proyecto es de uso exclusivo para evaluación técnica.
