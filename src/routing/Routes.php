<?php

/**
 * @authors CSS DENIT
 * @date    2023-02-24 13:34:31
 * @version ${1.0.0}
 * @description: 
 */

namespace Src\Routing;

class Routes {
   protected static $module = null;
   protected static $action = null;
   protected static $params = [];

   private static function parseUrl() {
      if (!isset($_GET['url']) || is_null($_GET['url']) || $_GET['url'] == '/') {
         $_GET['url'] = 'home/index';
      }

      $url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL, FILTER_NULL_ON_FAILURE);
      $url = explode('/', $url);
      $url = array_filter($url);

      return $url;
   }

   public static function getModule() {
      $url = self::parseUrl();
      if (count($url) > 0) {
         self::$module = $url[0];
         unset($url);
      } else {
         self::$module = 'home';
      }
      return self::$module;
   }

   public static function getAction() {
      $url = self::parseUrl();
      if (count($url) > 1) {
         self::$action = $url[1];
         unset($url);
      } else {
         self::$action = 'index';
      }
      return self::$action;
   }

   public static function getParams() {
      $url = self::parseUrl();
      if (count($url) > 2) {
         self::$params = array_slice($url, 2);
         unset($url);
      } else {
         self::$params = [];
      }
      return self::$params;
   }
}
