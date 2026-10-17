<?php

final class Conexion
{
    private static ?PDO $conexion = null;

    public static function conectar(): PDO
    {
        if (self::$conexion === null) {
            $config = require __DIR__ . '/../../Config/Parametros.php';

            self::validarConfiguracion($config);

            $dsn = sprintf(
                'mysql:host=%s;port=%s;dbname=%s;charset=utf8mb4',
                $config['host'],
                $config['port'],
                $config['database']
            );

            $opciones = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];

            self::$conexion = new PDO(
                $dsn,
                $config['username'],
                $config['password'],
                $opciones
            );
        }

        return self::$conexion;
    }

    private static function validarConfiguracion(array $config): void
    {
        $camposObligatorios = ['host', 'port', 'database', 'username', 'password'];

        foreach ($camposObligatorios as $campo) {
            if (!isset($config[$campo]) || $config[$campo] === '' || $config[$campo] === false) {
                throw new RuntimeException("Falta configurar el valor: {$campo}");
            }
        }
    }
}