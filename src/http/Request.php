<?php

/**
 * @authors CSS DENIT
 * @date    2023-02-24 13:38:46
 * @version ${1.0.0}
 * @description: 
 */

namespace Src\Http;

class Request {
   public $body = [];
   public $params = [];
   public $query = [];
   public $files = [];
   public $cookies = [];
   public $headers = [];
   public $server = [];
   public $session = [];

   public function __construct() {
      $this->body = $_POST;
      $this->params = $_GET;
      $this->query = $_GET;
      $this->files = $_FILES;
      $this->cookies = $_COOKIE;
      $this->headers = getallheaders();
      $this->server = $_SERVER;
      $this->session = $_SESSION;
   }

   public function getBody() {
      return $this->body;
   }

   public function getParams() {
      return $this->params;
   }

   public function getQuery() {
      return $this->query;
   }

   public function getFiles() {
      return $this->files;
   }

   public function getCookies() {
      return $this->cookies;
   }

   public function getHeaders() {
      return $this->headers;
   }

   public function getServer() {
      return $this->server;
   }

   public function get($key) {
      if (isset($this->body[$key])) {
         return $this->body[$key];
      } else if (isset($this->params[$key])) {
         return $this->params[$key];
      } else if (isset($this->query[$key])) {
         return $this->query[$key];
      } else if (isset($this->files[$key])) {
         return $this->files[$key];
      } else if (isset($this->cookies[$key])) {
         return $this->cookies[$key];
      } else if (isset($this->headers[$key])) {
         return $this->headers[$key];
      } else if (isset($this->server[$key])) {
         return $this->server[$key];
      } else {
         return null;
      }
   }

   public function setBody($body) {
      $this->body = $body;
   }

   public function setParams($params) {
      $this->params = $params;
   }

   public function setQuery($query) {
      $this->query = $query;
   }

   public function setFiles($files) {
      $this->files = $files;
   }

   public function setCookies($cookies) {
      $this->cookies = $cookies;
   }

   public function setHeaders($headers) {
      $this->headers = $headers;
   }

   public function setServer($server) {
      $this->server = $server;
   }
   public function evalParams($model = []) {
      if ($_REQUEST) {
         $result = [];
         // recorremos el arreglo request con un foreach
         foreach ($_REQUEST as $key => $value) {
            if (empty($model)) {
               $result[$key] = self::cleanInput($value);
            } else {
               if (in_array($key, $model)) {
                  $result[$key] = self::cleanInput($value);
               }
            }
         }
         return $result;
      } else {
         return false;
      }
   }

   private static function cleanInput($input) {
      $search = array(
         '@<script[^>]*?>.*?</script>@si', // Strip out javascript
         '@<[\/\!]*?[^<>]*?>@si', // Strip out HTML tags
         '@<style[^>]*?>.*?</style>@siU', // Strip style tags properly
         '@<![\s\S]*?--[ \t\n\r]*>@', // Strip multi-line comments
         // sql injection 
         '@SELECT\s+.*?\s+FROM\s+.*?\s+WHERE\s+.*?\s+LIKE\s+.*?@si',
      );
      $output = preg_replace($search, '', $input);
      return $output;
   }
}
