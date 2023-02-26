<?php

/**
 * @authors CSS DENIT
 * @date    2023-02-24 19:02:32
 * @version ${1.0.0}
 * @description: 
 */

namespace Src\Http;

interface ModulesInterface {
   public function index(Request $req, Response $res);
}
