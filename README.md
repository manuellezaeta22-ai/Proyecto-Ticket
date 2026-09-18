# 🎫 Sistema de Tickets (API REST + Vanilla Frontend)

Proyecto estudiantil desarrollado con una arquitectura limpia por capas, diseñado para ejecutarse en contenedores Docker utilizando PHP nativo (sin frameworks) y un frontend puro con JavaScript, HTML y CSS.

---

## 🚀 Arquitectura del Proyecto

El proyecto está dividido en dos grandes bloques para separar claramente la interfaz de usuario (Frontend) de la lógica del servidor y la base de datos (Backend).

```text
sistema-tickets/
├── frontend/                          ← HTML, CSS y JS puro
│   ├── templates/                     ← Vistas HTML de la aplicación
│   ├── css/                           ← Estilos visuales
│   ├── js/
│   │   └── api.js                     ← Funciones centralizadas de conexión (fetch)
│   └── assets/                        ← Recursos multimedia (imágenes, iconos)
│
├── backend/
│   ├── public/
│   │   └── index.php                  ← Front Controller y autargador nativo
│   ├── src/
│   │   ├── Routes/
│   │   │   └── routes.php             ← Enrutador minimalista de la API
│   │   ├── Controllers/               ← Reciben peticiones y devuelven respuestas HTTP
│   │   ├── Services/                  ← Lógica de negocio de la aplicación
│   │   ├── DTOs/                      ← Objetos de transferencia de datos
│   │   ├── Models/                    │   (Mapeo y validación inicial)
│   │   │   └── TicketModel.php        ← Interacción directa con la base de datos
│   │   └── Database/
│   │       └── Connection.php         ← Conexión PDO única (Patrón Singleton)
│
├── dockerfile                         ← Configuración del contenedor PHP/Apache
├── docker-compose.yml                 ← Orquestación de servicios (App + phpMyAdmin + MySQL)
└── README.md                          ← Documentación oficial del proyecto



🛠️ Tecnologías y Herramientas
Frontend: HTML5, CSS3, JavaScript (Vanilla ES6+ con Fetch API).

Backend: PHP 8+ (Programación Orientada a Objetos, sin frameworks, autargador nativo mediante spl_autoload_register).

Base de Datos: MySQL (gestionada a través de phpMyAdmin).

Contenedorización: Docker Desktop & Docker Compose.

Entorno de Desarrollo: Visual Studio Code (con la extensión Live Server para el frontend).

📋 Plan de Desarrollo por Etapas
Fase 1: Configuración del Entorno (Docker)
Levantar los servicios de infraestructura mediante docker-compose.yml (Contenedor PHP/Apache, MySQL y phpMyAdmin).

Verificar la conectividad con phpMyAdmin y crear la base de datos inicial para el sistema de tickets.

Fase 2: Núcleo del Backend (Estructura por Capas sin Frameworks)
Conexión a Base de Datos: Configurar la clase Connection.php utilizando PDO mediante el patrón Singleton.

Autocarga Nativa: Implementar el registro automático de clases en index.php utilizando spl_autoload_register.

Modelos y DTOs: Desarrollar los modelos de acceso a datos (TicketModel, UsuarioModel) y los DTOs para estructurar la información transferida de forma segura.

Servicios y Controladores: Escribir la lógica de negocio y las respuestas JSON en los controladores.

Ruteo: Configurar routes.php para direccionar los verbos HTTP (GET, POST, PUT, DELETE) hacia sus respectivos controladores.

Fase 3: Desarrollo del Frontend (Vanilla)
Diseñar las plantillas HTML dentro de la carpeta templates/.

Escribir las hojas de estilo CSS para darle interfaz visual al sistema.

Crear el archivo api.js encargado de hacer las peticiones asíncronas (fetch) hacia los endpoints del backend PHP.

Fase 4: Pruebas e Integración
Conectar el frontend con el backend validando políticas de CORS e intercambio de datos en formato JSON.

Realizar pruebas de flujo completo (crear, listar y actualizar tickets desde la interfaz gráfica).

⚙️ Instrucciones de Ejecución
Clonar o abrir el repositorio en Visual Studio Code.

Iniciar Docker Desktop en tu equipo (Windows 10).

Levantar los contenedores ejecutando en la terminal raíz del proyecto:

Bash
docker-compose up -d
Acceder a los servicios:

Aplicación Backend / API: Configurada en el puerto expuesto por tu Dockerfile/Compose (ej. http://localhost:8080).

phpMyAdmin: http://localhost:8081 (o el puerto configurado) para administrar las tablas de MySQL.

Frontend: Abrir la carpeta frontend/ en VS Code y utilizar la extensión Live Server para levantar la interfaz visual de desarrollo.