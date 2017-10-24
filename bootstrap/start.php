<?php
require_once __DIR__ . '/../vendor/autoload.php';

/**
 * Call system kernel, to listen all HTTP mechanism
 *
 * @var Systemblast
 */
$system = new Systemblast\Engine\Http\Kernel;
$system->listen();
