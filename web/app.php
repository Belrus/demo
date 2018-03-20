<?php
/**
 * Created by PhpStorm.
 * User: Sergey Pavliuckhov
 * Date: 20.03.2018
 * Time: 14:15
 */

use Symfony\Component\HttpFoundation\Request;

$loader = require __DIR__ . '/../config/autoload.php';
require_once __DIR__ . '/../config/MicroKernel.php';
$kernel = new MicroKernel('prod', false);
$kernel->loadClassCache();
$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);