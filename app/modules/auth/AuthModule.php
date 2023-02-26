<?php

/**
 * @authors CSS DENIT
 * @date    {date('Y-m-d H:i:s')}
 * @version 1.0.0
 * @description: 
 */

namespace App\Modules\Auth;

use Src\Http\Request;
use Src\Http\Response;

class AuthModule {
   public function index(Request $req, Response $res) {
      $data['title'] = 'auth';
      $res->view('index', $data, 'auth.layout');
   }

   
}
