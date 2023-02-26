<?php

/**
 * @authors CSS DENIT
 * @date    2023-02-24 13:38:03
 * @version ${1.0.0}
 * @description: 
 */

namespace Src\Http;

interface ModulesInterface {
   public function index(Request $req, Response $res);
}
