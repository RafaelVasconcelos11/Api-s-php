<?php
    use \Psr\Http\Message\ServerRequestInterface as Request;
    use \Psr\Http\Message\ResponseInterface as Response;

    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: *');
    header("Content-type: application/json; charset=utf-8");

    $app = new \Slim\App;

    $app->get('/api/cargo/lista', function(Request $request, Response $response){

        $dao = new CargoDAO();

        $resposta = $dao->listaCargos();

        return print json_encode($resposta, JSON_UNESCAPED_UNICODE);
    });
