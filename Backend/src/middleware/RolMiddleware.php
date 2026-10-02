<?php

final class RolMiddleware
{
    public static function soloEncargado(): void
    {
        $usuario = AuthMiddleware::verificar();

        if ($usuario['rol'] !== 'encargado') {
            Response::json([
                'error' => 'No tienes permisos para realizar esta operación'
            ], 403);
        }
    }
}