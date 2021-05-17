<?php
session_start();

require "vendor/autoload.php";

// date_default_timezone_set('America/Cayenne');

use \Slim\Slim;

#use Rain\Tpl;

#use \Sistema\Page;  


$app = new Slim();

$app->config('debug', true);

//rota raiz
## Rota Incial que listas os módulos disponíveis
require_once('rotas/dashboard.php');
## Rotas de Login
require_once('rotas/login.php');
## Rotas do módulo da Baseline
require_once('rotas/baseline.php');
## Rotas do módulo de Rateio
require_once('rotas/rateio.php');
## Rotas de Usuários desligados
require_once('rotas/desligados.php');

require_once('rotas/controle_maquinas.php');
require_once('rotas/facilities_terceiros.php');




$app->run();