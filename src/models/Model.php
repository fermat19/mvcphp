<?php

/**
 * @authors CSS DENIT
 * @date    2023-02-25 10:56:25
 * @version ${1.0.0}
 * @description: 
 */

namespace Src\Models;

class Model {
   private static $dsn = null;
   private static $user = null;
   private static $password = null;
   private static $options = null;
   private static $pdo = null;

   /**
    * Summary of __construct
    * @throws \PDOException
    * @description: crea una conexion a la base de datos
    */
   public function __construct() {
      self::$user = DB_USER;
      self::$password = DB_PASS;
      self::$dsn = DB_DRIVER . ':host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET;
      self::$options = [
         \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
         \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
         \PDO::ATTR_EMULATE_PREPARES => false,
      ];

      try {
         self::$pdo = new \PDO(self::$dsn, self::$user, self::$password, self::$options);
      } catch (\PDOException $e) {
         throw new \PDOException($e->getMessage(), (int) $e->getCode());
      }
   }


   /**
    * Summary of listar
    * @param mixed $sql
    * @param mixed $params
    * @throws \PDOException
    * @return array
    * @description: consulta a la base de datos
    */
   public static function listar($sql, $params = []) {
      try {

         $stmt = self::$pdo->prepare($sql);
         $stmt->execute($params);
         $data = $stmt->fetchAll();
         return $data;
      } catch (\PDOException $e) {
         throw new \PDOException($e->getMessage(), (int) $e->getCode());
      }
   }

   /**
    * Summary of crear
    * @param mixed $sql
    * @param mixed $params
    * @throws \PDOException
    * @return bool|string
    */
   public static function crear($sql, $params = []) {
      try {
         $stmt = self::$pdo->prepare($sql);
         $stmt->execute($params);
         $data = self::$pdo->lastInsertId();
         return $data;
      } catch (\PDOException $e) {
         throw new \PDOException($e->getMessage(), (int) $e->getCode());
      }
   }

   /**
    * Summary of actualizar
    * @param mixed $sql
    * @param mixed $params
    * @throws \PDOException
    * @return int
    * @description: actualiza la base de datos
    */
   public static function actualizar($sql, $params = []) {
      try {
         $stmt = self::$pdo->prepare($sql);
         $stmt->execute($params);
         $data = $stmt->rowCount();
         return $data;
      } catch (\PDOException $e) {
         throw new \PDOException($e->getMessage(), (int) $e->getCode());
      }
   }

   /**
    * Summary of eliminar
    * @param mixed $sql
    * @param mixed $params
    * @throws \PDOException
    * @return int
    * @description: elimina un registro de la base de datos
    */
   public static function eliminar($sql, $params = []) {
      try {
         $stmt = self::$pdo->prepare($sql);
         $stmt->execute($params);
         $data = $stmt->rowCount();
         return $data;
      } catch (\PDOException $e) {
         throw new \PDOException($e->getMessage(), (int) $e->getCode());
      }
   }

   public function __destruct() {
      self::$pdo = null;
   }
}
