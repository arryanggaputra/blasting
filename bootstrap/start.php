<?php
require_once __DIR__ . '/../vendor/autoload.php';

$system = new Systemblast\Engine\Http\Kernel;
$system->listen();
