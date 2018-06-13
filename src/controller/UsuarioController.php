<?php
    use \Psr\Http\Message\ServerRequestInterface as Request;
    use \Psr\Http\Message\ResponseInterface as Response;

    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: *');
    header("Content-type: application/json; charset=utf-8");

    $app = new \Slim\App;

    $app->post('/api/usuario/cadastro', function(Request $request, Response $response){

        $u = new Usuario();
        $dao = new UsuarioDAO();

        $nome = iconv('UTF-8','ISO-8859-1',$request->getParam('nome_usuario'));
        $email = iconv('UTF-8','ISO-8859-1',$request->getParam('email_usuario'));
        $senha = iconv('UTF-8','ISO-8859-1',$request->getParam('senha_usuario'));

        $u->setNome($nome);
        $u->setEmail($email);
        $u->setCpf($request->getParam('cpf_usuario'));
        $u->setCargo($request->getParam('cargo_usuario'));
        $u->setTelefone($request->getParam('telefone_usuario'));
        $u->setSenha(md5($senha));
        $u->setAdm($request->getParam('usuario_adm'));

        $resposta = $dao->cadastraUsuario($u);

        return print json_encode($resposta, JSON_UNESCAPED_UNICODE);
    });