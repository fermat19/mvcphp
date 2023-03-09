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
      $component = Routes::getComponent();
      $modulePath = PATH_APP_MODULES . $module  . DS . ucfirst($component) . 'Component.php';
      return $modulePath;
   }

   protected static function getModuleClass() {
      $module = Routes::getModule();
      $component = Routes::getComponent();
      $moduleClass = 'App\\Modules\\' . ucfirst($module) . '\\' . ucfirst($component) . 'Component';
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
         if (method_exists($module, Routes::getAction())) {
            $req = new \Src\Http\Request();
            $res = new \Src\Http\Response();
            $req->setParams('uri', Routes::getParams());
            $params = ['req' => $req, 'res' => $res];
            call_user_func_array([$module, Routes::getAction()], $params);
         } else {
            throw new \Exception('Action not found');
         }
      } else {
         throw new \Exception("Module {$moduleClass} not found in the path: {$modulePath}");
      }
   }
}