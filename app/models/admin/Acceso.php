<?php

/**
 * @authors CSS DENIT
 * @date    2023-02-25 10:47:21
 * @version ${1.0.0}
 * @description: 
 */

namespace App\Models\Admin;

class Acceso implements \Src\Models\ModelInterface {
   public static function listar($params = []) {
      $sql = "";
      $data = \Src\Models\Model::listar($sql, $params);
      return $data;
   }

   public static function crear($params = []) {
      $sql = "";
      $data = \Src\Models\Model::crear($sql, $params);
      return $data;
   }

   public static function actualizar($params = []) {
      $sql = "";
      $data = \Src\Models\Model::actualizar($sql, $params);
      return $data;
   }

   public static function eliminar($params = []) {
      $sql = "";
      $data = \Src\Models\Model::eliminar($sql, $params);
      return $data;
   }
}
