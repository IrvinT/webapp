<?php

session_start();

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

$app->route('/accueil', function(){
	$c = new Controller\Front();
	$c->home();
});

$app->route('/deconnexion', function(){
	$c = new Controller\Front();
	$c->deconnexion();
});

$app->route('/ajouter-categories', function(){
	$c = new Controller\Front();
	$c->home();
});

$app->route('/ajouter-souscategories', function(){
	$c = new Controller\Front();
	$c->home();
});

$app->route('/add-task', function(){
	$c = new Controller\Front();
	$c->addTask();
});

$app->route('/remove-task', function(){
	$c = new Controller\Front();
	$c->removeTask();
});

$app->map('notFound', function(){
    include '404.html';
});

$app->start();