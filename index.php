<?php

/**
 * @authors CSS DENIT
 * @date    2023-02-24 13:51:13
 * @version ${1.0.0}
 * @description: 
 */

// carga archivo de configuracion
$config = './config/config.php';

if (!file_exists($config)) {
   die('No se encuentra el archivo de configuracion');
}

require_once $config;

// carga archivo autoload desde la carpeta Src
require_once './src/Autoload.php';

// inicializa el autoload
Src\Autoload::run();

// carga manejadores de errores
set_error_handler('\Src\Exceptions\HandlerException::errorHandler');
set_exception_handler('\Src\Exceptions\HandlerException::exceptionHandler');

// lanza las rutas de la aplicacion
\Src\Routing\Router::Run();
