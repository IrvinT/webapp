<?php

error_reporting(-1);

// Load Smarty library
require 'lib/smarty/libs/Smarty.class.php';
require 'app/autoload.php';

use app\Engine;
use app\Controller;

$app = new Engine();

$app->route('/', function(){
	$c = new Controller\Front();
	$c->home();
});

$app->map('notFound', function(){
    include '404.html';
});

$app->start();