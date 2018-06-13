<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';
require '../src/connection/Conexao.php';
require '../src/model/Usuario.php';
require '../src/dao/UsuarioDAO.php';
require '../src/model/Cargo.php';
require '../src/dao/CargoDAO.php';


$app = new \Slim\App;

require '../src/controller/UsuarioController.php';
require '../src/controller/CargoController.php';

$app->run();
