<?php

/**
 * @authors CSS DENIT
 * @date    2023-02-24 13:34:53
 * @version ${1.0.0}
 * @description: 
 */

namespace Src\Routing;

use \Src\Routing\Routes;

class Router {
   protected static function getModulePath() {
      $module = Routes::getModule();
      $modulePath = PATH_APP_MODULES . $module  . DS . ucfirst($module) . 'Module.php';
      return $modulePath;
   }

   protected static function getModuleClass() {
      $module = Routes::getModule();
      $moduleClass = 'App\\Modules\\' . ucfirst($module) . '\\' . ucfirst($module) . 'Module';
      return $moduleClass;
   }

   public static function Run() {
      $modulePath = self::getModulePath();
      $moduleClass = self::getModuleClass();

      if (file_exists($modulePath)) {
         require_once $modulePath;
         $module = new $moduleClass();
         // TODO: cargamos el registro de access_log

         // TODO:: agregar los parametros a un objeto Request
         $params = ['req' => new \Src\Http\Request(), 'res' => new \Src\Http\Response()];
         if (method_exists($module, Routes::getAction())) {
            $params = array_merge($params, Routes::getParams());
            call_user_func_array([$module, Routes::getAction()], $params);
         } else {
            throw new \Exception('Action not found');
         }
      } else {
         throw new \Exception("Module {$moduleClass} not found in the path: {$modulePath}");
      }
   }
}
