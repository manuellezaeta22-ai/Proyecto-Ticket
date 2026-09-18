<?php
// Este código es la alternativa de cargar para evitar usar composer
// Autocargador nativo de clases basado en tu estructura src
spl_autoload_register(function ($class_name) {
    // Si usas namespaces tipo App\Controllers\TicketController, 
    // mapeamos la ruta base 'src/'
    
    // Convertimos las barras invertidas del namespace (\) en barras de carpetas (/)
    $file = __DIR__ . '/../src/' . str_replace('\\', '/', $class_name) . '.php';
    
    if (file_exists($file)) {
        require_once $file;
    }
});

// A partir de aquí tu index.php recibe la petición, la manda a Routes/routes.php y arranca la app
require_once __DIR__ . '/../src/Routes/routes.php';