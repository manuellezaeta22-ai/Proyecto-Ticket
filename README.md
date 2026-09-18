# 🎫 Sistema de Tickets (PHP Nativo + Vanilla Frontend)

Proyecto estudiantil desarrollado con una arquitectura limpia por capas en PHP orientado a objetos, diseñado para ejecutarse en contenedores Docker utilizando PHP nativo (sin frameworks ni Composer) y un frontend puro con JavaScript, HTML y CSS.

---

## 🚀 Arquitectura del Proyecto

El proyecto está dividido en dos grandes bloques para separar claramente la interfaz de usuario (Frontend) de la lógica del servidor y la base de datos (Backend).

```text
sistema-tickets/
├── frontend/                        ← HTML, CSS y JS puro
│   ├── templates/                   ← Vistas HTML de la aplicación
│   ├── css/                         ← Estilos visuales
│   ├── js/
│   │   └── api.js                   ← Funciones centralizadas de conexión
│   └── assets/                      ← Recursos multimedia (imágenes, iconos)
│
├── backend/
│   ├── public/
│   │   └── index.php                ← Front Controller y autargador nativo (spl_autoload_register)
│   ├── src/
│   │   ├── Routes/
│   │   │   └── routes.php           ← Enrutador minimalista de la aplicación
│   │   ├── Controllers/             ← Reciben peticiones y controlan el flujo
│   │   ├── Services/                ← Lógica de negocio de la aplicación
│   │   ├── DTOs/                    ← Objetos de transferencia de datos
│   │   ├── Models/                  │   (Mapeo y validación inicial)
│   │   │   └── TicketModel.php      ← Interacción directa con la base de datos
│   │   └── Database/
│   │       └── Connection.php       ← Conexión PDO única (Patrón Singleton)
│
├── dockerfile                       ← Configuración del contenedor PHP/Apache
├── docker-compose.yml               ← Orquestación de servicios (App + phpMyAdmin + MySQL)
└── README.md                        ← Documentación oficial del proyecto

🛠️ Tecnologías y Herramientas
Frontend: HTML5, CSS3, JavaScript (Vanilla ES6+).

Backend: PHP 8+ (Programación Orientada a Objetos, sin frameworks, autocarga de clases nativa mediante spl_autoload_register).

Base de Datos: MySQL (gestionada a través de phpMyAdmin).

Contenedorización: Docker Desktop & Docker Compose.

Entorno de Desarrollo: Visual Studio Code (con la extensión Live Server para el frontend).

📋 Plan de Desarrollo por Etapas
Fase 1: Configuración del Entorno (Docker)
Levantar los servicios de infraestructura mediante docker-compose.yml (Contenedor PHP/Apache, MySQL y phpMyAdmin).

Verificar la conectividad con phpMyAdmin y crear la base de datos inicial para el sistema de tickets.

Fase 2: Núcleo del Backend (Estructura por Capas sin Frameworks ni Composer)
Conexión a Base de Datos: Configurar la clase Connection.php utilizando PDO mediante el patrón Singleton.

Autocarga Nativa: Implementar el registro automático de clases en index.php utilizando spl_autoload_register para prescindir por completo de Composer y carpetas vendor.

Modelos y DTOs: Desarrollar los modelos de acceso a datos (TicketModel, UsuarioModel) y los DTOs para estructurar la información de forma segura.

Servicios y Controladores: Escribir la lógica de negocio y gestionar las peticiones en los controladores.

Ruteo: Configurar routes.php para direccionar las solicitudes hacia sus respectivos controladores.

Fase 3: Desarrollo del Frontend (Vanilla)
Diseñar las plantillas HTML dentro de la carpeta templates/.

Escribir las hojas de estilo CSS para darle interfaz visual al sistema.

Crear el archivo api.js encargado de la comunicación con el backend.

Fase 4: Pruebas e Integración
Conectar el frontend con el backend validando el flujo de datos.

Realizar pruebas completas (crear, listar y administrar tickets desde la interfaz gráfica).

⚙️ Instrucciones de Ejecución
Clonar o abrir el repositorio en Visual Studio Code.

Iniciar Docker Desktop en tu equipo (Windows 10).

Levantar los contenedores ejecutando en la terminal raíz del proyecto:

comando: docker-compose up -d

Acceder a los servicios:

Aplicación Backend: Configurada en el puerto expuesto por tu Docker/Compose (ej. http://localhost:8080).

phpMyAdmin: http://localhost:8081 para administrar las tablas de MySQL.

Frontend: Abrir la carpeta frontend/ en VS Code y utilizar la extensión Live Server para levantar la interfaz visual de desarrollo.