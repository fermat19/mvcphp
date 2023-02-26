<?php

/**
 * @authors CSS DENIT
 * @date    2023-02-24 13:39:13
 * @version ${1.0.0}
 * @description: 
 */

namespace Src\Http;


class Response {
   protected $body = null;
   protected $headers = [];
   protected $status = 200;

   public function __construct() {
      $this->headers = [
         'Content-Type' => 'text/html',
         'Content-Length' => 0,
         'X-Powered-By' => 'CSS DENIT',
      ];
      $this->status = 200;
   }

   /**
    * @return null
    */
   public function status() {
      return $this->status;
   }

   /**
    * @param null $status
    * @return Response
    */
   public function setStatus($status) {
      $this->status = $status;
      return $this;
   }

   /**
    * @return null
    */
   public function headers($key = null) {
      if (is_null($key)) {
         $this->headers;
      } else {
         $this->headers[$key];
      }

      return $this;
   }

   /**
    * @param null $headers
    * @return Response
    */
   public function setHeaders($headers, $value = null) {
      $this->headers[$headers] = $value;
      return $this;
   }

   /**
    * Summary of removeHeader
    * @param mixed $key
    * @return Response
    */
   public function removeHeader($key) {
      unset($this->headers[$key]);
      return $this;
   }

   /**
    * Summary of setContentType
    * @param mixed $type
    * @return Response
    */
   public function setContentType($type) {
      $this->headers['Content-Type'] = $type;
      return $this;
   }

   /**
    * Summary of setContent
    * @param mixed $content
    * @return Response
    */
   public function setContent($content) {
      $this->body = $content;
      return $this;
   }

   /**
    * Summary of prepare
    * @return void
    */
   public function prepare() {
      if (is_null($this->body)) {
         $this->removeHeader('Content-Type');
         $this->removeHeader('Content-Length');
      } else {
         $this->setHeaders('Content-Length', strlen($this->body));
      }
   }

   /**
    * Summary of json
    * @param mixed $data
    * @return Response
    */
   public function json($data) {
      $this->setContentType('application/json');
      if (is_array($data) || is_object($data)) {
         $this->setContent(json_encode($data));
      } else {
         $this->setContent(json_encode(['data' => $data]));
      }
      return $this;
   }

   /**
    * Summary of text
    * @param mixed $texto
    * @return Response
    */
   public function text($texto) {
      $this->setContentType('text/plain');
      $this->setContent($texto);
      return $this;
   }

   /**
    * Summary of redirect
    * @param mixed $location
    * @return never
    */
   public function redirect($location) {
      if (headers_sent()) {
         $script = '<script type="text/javascript">';
         $script .= 'window.location.href="' . APP_URL . $location . '";';
         $script .= '</script>';
         $script .= '<noscript>';
         $script .= '<meta http-equiv="refresh" content="0;url=' . APP_URL . $location . '" />';
         $script .= '</noscript>';
         echo $script;
         die();
      }

      if (strpos($location, 'http') !== false) {
         header('Location: ' . $location);
         die();
      }

      header('Location: ' . APP_URL . $location);
      die();
   }

   /**
    * Summary of view
    * @param mixed $view
    * @param mixed $data
    * @param mixed $layout
    * @return Response
    */
   public function view($view, $data = [], $layout = null) {
      $content = new \Src\Views\Engine();
      $content = $content->render($view, $data, $layout);
      $this->setContentType('text/html')
         ->setContent($content);
      return $this;
   }

   /**
    * Summary of __destruct
    * @return void
    */
   public function __destruct() {
      $this->prepare();
      http_response_code($this->status);
      foreach ($this->headers as $key => $value) {
         header($key . ': ' . $value);
      }
      echo $this->body;
   }
}
