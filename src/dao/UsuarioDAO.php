<?php

class UsuarioDAO{

    public function cadastraUsuario(Usuario $usuario){

        try{

            $conn = new Conexao();
            $link = $conn->conectar();

            $consulta = " INSERT INTO tb_usuario (nome, email, cpf, telefone, id_cargo, senha, administrador)
                          VALUES
                          (?, ?, ?, ?, ?, ?, ?)";

            $stmt = $link->prepare($consulta);

            $stmt->bind_param('sssssss', $usuario->getNome(),$usuario->getEmail(),$usuario->getCpf(),$usuario->getTelefone(),$usuario->getCargo(),$usuario->getSenha(),$usuario->getAdm() );

            $resultado = $stmt->execute();

            if($resultado){

                $array_usuario[] = array('cod'=>1,
                                         'desc_info' => 'Usuário cadastrado com sucesso');

                $json-> info = $array_usuario;

            }else{
                $array_usuario[] = array('cod'=>2,
                    'desc_info' => 'Falha ao cadastrar usuário');

                $json-> info = $array_usuario;
            }

        }catch (mysqli_sql_exception $exception){

        }finally{
            $link->close();
            $stmt->close();
        }

        return $json;

    }

}
