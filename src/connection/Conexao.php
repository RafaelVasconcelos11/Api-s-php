<?php
/**
 * Created by PhpStorm.
 * User: rafa_
 * Date: 11/06/2018
 * Time: 16:51
 */

class Conexao
{
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $dbname = "dvwebpb";

    public function conectar(){

        $conn = new mysqli($this->host, $this->user, $this->pass, $this->dbname);

        if($conn){

            //echo "Conexão realizada com sucesso!";

        }else{

            //echo "Falha na conexão";

        }

        return $conn;

    }

}