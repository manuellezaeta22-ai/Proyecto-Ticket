<?php



$conexion = Conexion::conectar();

$usuarioModel = new Usuario($conexion);

$authService = new AuthService($usuarioModel);

$authController = new AuthController($authService);

$usuarioService = new UsuarioService($usuarioModel);

$usuarioController = new UsuarioController(
    $usuarioService
);

$router->post(
    '/api/login',
    [$authController, 'login']
);

$router->get(
    '/api/sesion',
    [$authController, 'sesion']
);

$router->post(
    '/api/logout',
    [$authController, 'logout']
);

$router->post(
    '/api/usuarios',
    function () use ($usuarioController): void {
        RolMiddleware::soloEncargado();

        $usuarioController->crear();
    }
);