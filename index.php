<?php

error_reporting(-1);

define('_BASE_URI_', $_SERVER['REQUEST_URI'] . 'app/');
define('_BOWER_URI_', $_SERVER['REQUEST_URI'] . 'bower_components/');

// Load Smarty library
require 'lib/smarty/libs/Smarty.class.php';
require 'app/autoload.php';

use app\Engine;
use app\Controller;

$app = new Engine();

$app->route('/', function($params){
	$c = new Controller\Front();
	$c->home($params);
}, true);

$app->map('notFound', function(){
    include '404.html';
});

$app->start();