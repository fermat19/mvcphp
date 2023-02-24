<?php

/**
 * @authors CSS DENIT
 * @date    2023-02-24 13:30:49
 * @version ${1.0.0}
 * @description: 
 */

namespace Src;

class Autoload {
   // crea un metodos estatico de autocarga
   public static function run() {
      // registra la funcion de autocarga
      spl_autoload_register(function ($className) {
         $chunks = explode('\\', $className);
         $path = ROOT;
         $length = count($chunks);
         for ($i = 0; $i < $length; $i++) {
            if ($i == $length - 1) {
               $path .= '/' . $chunks[$i] .  '.php';
            } else {
               $path .= strtolower($chunks[$i]) . DS;
            }
         }
         if (file_exists($path)) {
            require_once $path;
         } else {
            throw new \Exception("Class $className not found");
         }
      });
   }
}
