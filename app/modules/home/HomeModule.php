<?php

/**
 * @authors CSS DENIT
 * @date    2023-02-24 18:53:37
 * @version ${1.0.0}
 * @description: 
 */

namespace App\Modules\Home;

use Src\Http\Request;
use Src\Http\Response;

class HomeModule implements \Src\Http\ModulesInterface {

   function index(Request $req, Response $res) {
      $data = [
         'title' => 'Home',
         'description' => 'Home description',
         'keywords' => 'Home keywords',
         'content' => 'Home content'
      ];
      $res->view('home', $data);
   }
}
