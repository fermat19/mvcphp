<?php

/**
 * @authors CSS DENIT
 * @date    2023-02-25 10:48:24
 * @version ${1.0.0}
 * @description: 
 */

namespace Src\Models;

interface ModelInterface {
    public static function listar($params = []);
    public static function crear($params = []);
    public static function actualizar($params = []);
    public static function eliminar($params = []);
}
