<?php

/**
 * @authors CSS DENIT
 * @date    2023-02-24 13:49:07
 * @version ${1.0.0}
 * @description: 
 */

namespace Src\Exceptions;

class HandlerException extends \Src\Exceptions\CoreExceptions {

   public static function errorHandler($errno, $errstr, $errfile, $errline) {
      if (!(error_reporting() && $errno)) {
         // This error code is not included in error_reporting, so let it fall
         // through to the standard PHP error handler
         return false;
      }

      $errstr = htmlspecialchars($errstr, ENT_QUOTES, 'UTF-8');
      switch ($errno) {
         case E_USER_ERROR:
            $message = "<b>ERROR</b> [$errno] $errstr<br />\n";
            $message .= "  Fatal error on line $errline in file $errfile";
            $message .= ", PHP " . PHP_VERSION . " (" . PHP_OS . ")<br />\n";
            $message .= "Aborting...<br />\n";
            echo $message;
            exit(1);
            break;

         case E_USER_WARNING:
            $message = "<b>WARNING</b> [$errno] $errstr<br />\n";
            $message .= "  Warning on line $errline in file $errfile";
            $message .= ", PHP " . PHP_VERSION . " (" . PHP_OS . ")<br />\n";
            echo $message;
            break;

         case E_USER_NOTICE:
            $message = "<b>NOTICE</b> [$errno] $errstr<br />\n";
            $message .= "  Notice on line $errline in file $errfile";
            $message .= ", PHP " . PHP_VERSION . " (" . PHP_OS . ")<br />\n";
            echo $message;
            break;

         default:
            $message = "Unknown error type: [$errno] $errstr<br />\n";
            $message .= "  Error on line $errline in file $errfile";
            $message .= ", PHP " . PHP_VERSION . " (" . PHP_OS . ")<br />\n";
            echo $message;
            break;
      }

      /* Don't execute PHP internal error handler */
      return true;
   }

   public static function exceptionHandler($e) {
      $code = $e->getCode();
      if ($code != 404) {
         $code = 500;
      }
      http_response_code($code);
      if (DEBUG) {
         self::printHTML($e);
      } else {
         self::errorLog($e);
         define('ERROR_HANDLER', true);
         $data = [
            'title' => $code,
            'class' => get_class($e),
            'message' => $e->getMessage(),
            'file' => $e->getFile(),
            'line' => $e->getLine(),
            'trace' => $e->getTraceAsString()
         ];
         $view = new \Src\Views\Engine();
         echo $view->render('error/errors', $data);
      }
      return true;
   }

   private static function printHTML($e) {
      echo '<h1>Fatal error ' . $e->getCode() . '</h1>';
      echo '<p>Uncaught exception: ' . get_class($e) . '</p><br>';
      echo '<p>Message: <br>' . $e->getMessage() . '</p><br>';
      echo '<p>Stack trace:<pre>' . $e->getTraceAsString() . '</pre></p>';
      echo '<p>Thrown in ' . $e->getFile() . ' on line ' . $e->getLine() . '</p>';
   }

   private static function errorLog($e) {
      $log = dirname(__DIR__) . '/logs/' . date('Y-m-d') . '.txt';
      ini_set('error_log', $log);
      $message = 'Uncaught exception: \'' . get_class($e) . '\'';
      $message .= ' with message \'' . $e->getMessage() . '\'';
      $message .= "\nStack trace: " . $e->getTraceAsString();
      $message .= "\nThrown in '" . $e->getFile() . "' on line " . $e->getLine();
      error_log($message);
   }
}
