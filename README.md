# Laravel Task Manager API

API REST desarrollada con Laravel para la gestión de tareas con autenticación basada en tokens usando Laravel Sanctum.

## 🚀 Tecnologías utilizadas

- PHP
- Laravel
- MySQL
- Laravel Sanctum
- Postman (testing de API)

## 🔐 Autenticación

La API utiliza autenticación mediante **tokens con Laravel Sanctum**.

Después de iniciar sesión se obtiene un token que debe enviarse en cada request protegida:

Authorization: Bearer TU_TOKEN

## 📌 Funcionalidades

- Registro de usuarios
- Inicio de sesión
- CRUD de tareas
- Autenticación con tokens
- Relación usuario → tareas
- Paginación de resultados
- Filtros por estado
- Búsqueda de tareas
- Ordenamiento de resultados

## 📡 Endpoints principales

### Registro de usuario

POST /api/register

```json
{
"name": "Usuario",
"email": "usuario@email.com",
"password": "123456"
}

Obtener tareas

GET /api/tasks

Crear tarea

POST /api/tasks

{
"title": "Nueva tarea",
"description": "Descripción de la tarea"
}
Actualizar tarea

PUT /api/tasks/{id}

Eliminar tarea

DELETE /api/tasks/{id}

🔎 Ejemplos de filtros

Filtrar tareas completadas

GET /api/tasks?status=completed

Buscar tareas

GET /api/tasks?search=Laravel

Ordenar tareas

GET /api/tasks?sort=created_at

⚙️ Instalación del proyecto

Clonar repositorio

git clone https://github.com/gustavoortiz7/laravel-task-manager-api.git

Instalar dependencias

composer install

Configurar variables de entorno

cp .env.example a .env

Generar key

php artisan key:generate

Migrar base de datos

php artisan migrate

Iniciar servidor

php artisan serve