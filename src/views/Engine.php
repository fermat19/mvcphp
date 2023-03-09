<?php

/**
 * @authors CSS DENIT
 * @date    2023-02-24 13:39:57
 * @version ${1.0.0}
 * @description: 
 */

namespace Src\Views;

use \Src\Routing\Routes;

class Engine {
   protected $data = [];
   protected $layout = 'index.layout';
   protected $view = '';
   protected $annotation = '@content';

   private function renderFile($fileView, $params) {
      if (!file_exists($fileView)) {
         throw new \Exception("View file not found: $fileView");
         die();
      }

      extract($params);
      ob_start();
      require_once $fileView;
      $content = ob_get_contents();
      ob_end_clean();

      return $content;
   }

   public function render($view, $data = [], $layout = null) {
      $this->view = $view;
      $this->data = $data;
      $this->layout = is_null($layout) ? $this->layout : $layout;

      $module = Routes::getModule();
      $componnet = Routes::getComponent();
      
      $fileView = PATH_APP_MODULES . $module . DS . 'views' . DS . $this->view . '.php';
      $fileLayout = PATH_APP_LAYOUTS . 'template' . DS . $this->layout . '.php';
      
      $errorView = PATH_APP_LAYOUTS . 'shared' . DS . $this->view . '.php';
      $errorLayout = PATH_APP_LAYOUTS . 'template' . DS . 'error.layout' . '.php';

      if(defined('ERROR_HANDLER') && ERROR_HANDLER){
         $view = $this->renderFile($errorView, $this->data);
         $layout = $this->renderFile($errorLayout, $this->data);
      } else {
         $view = $this->renderFile($fileView, $this->data);
         $layout = $this->renderFile($fileLayout, $this->data);
      }
      $html = str_replace($this->annotation, $view, $layout);
      return $html;
   }
}