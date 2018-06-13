<?php

class CargoDAO{

    public function listaCargos(){

        try{

            $conn = new Conexao();
            $link = $conn->conectar();

            $consulta = "SELECT * FROM tb_cargo";

            $resultado  =$link->query($consulta);

            for ($i = 0; $i < $resultado->num_rows; $i++) {

                $dados = $resultado->fetch_assoc();

                $lista_cargos[] = array('id'=>$dados["id_cargo"],
                                        'nome'=>utf8_encode($dados["nome_cargo"]));

            }

            $json->cargo = $lista_cargos;

        }catch (mysqli_sql_exception $exception){

        }finally{
            $link->close();

        }

        return $json;

    }

}
