<?php

//Fábrica de conexões
class Conexao {
    private $usuario;
    private $senha;
    private $banco;
    private $servidor;

    private static $pdo;

    public function __construct()
    {
        $this -> servidor = "localhost";
        $this -> banco = "agendaSenac2025";
        $this -> usuario = "root";
        $this -> senha = "";
    }
    public function conectar()
    {
        try //realiza a tentativa de realização da função
        {
            if(is_null(self::$pdo))
                {
                    self:: $pdo = new PDO("mysql:host=".$this->servidor.";dbname=".$this->banco,$this->usuario,$this->senha);
                }
                //echo "Deu BoaaaAAaa!!";
            return self::$pdo;
        }
        catch(PDOException $ex) //caso o try não conseguir o catch vai apresentar uma mensagem do que esta errado
        {
            echo $ex -> getMessage();
        }
    }
}

?>