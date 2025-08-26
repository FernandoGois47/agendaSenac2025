<?php
    require'conexao.class.php';
    class Contatos {
        private $id;
        private $email;
        private $endereco;
        private $rede_social;
        private $telefone;
        private $nome;
        private $dtNasc;
        
        private $con;

        public function __construct(){
            $this->con = new Conexao();
        }
         private function existeEmail($email){
            $sql = $this->con->conectar()->prepare("SELECT id FROM contatos WHERE email = :email");
            $sql->bindParam(':email',$email,PDO::PARAM_STR);
            $sql->execute();

            if($sql->rowCount() > 0){
                $array = $sql-> fetch();
            }
            else{
                $array = array();
            }
            return $array;
         }

         public function adicionar($email, $endereco, $rede_social, $telefone, $nome, $dtNasc){
            $emailExistente = $this->existeEmail($email);
            if(count($emailExistente) == 0){
                try{
                    $this->email = $email;
                    $this->endereco = $endereco;
                    $this->rede_social = $rede_social;
                    $this->telefone = $telefone;
                    $this->nome = $nome;
                    $this->dtNasc = $dtNasc;

                    $sql = $this->con->conectar()->prepare("INSERT INTO contatos(email, endereco, rede_social, telefone, nome, dtNasc) VALUES (:email, :endereco, :rede_social, :telefone, :nome, :dtNasc)");
                    $sql->bindParam(':email',$this->email,PDO::PARAM_STR);
                    $sql->bindParam(':endereco',$this->endereco,PDO::PARAM_STR);
                    $sql->bindParam(':rede_social',$this->rede_social,PDO::PARAM_STR);
                    $sql->bindParam(':telefone',$this->telefone,PDO::PARAM_STR);
                    $sql->bindParam(':nome',$this->nome,PDO::PARAM_STR);
                    $sql->bindParam(':dtNasc',$this->dtNasc,PDO::PARAM_STR);
                    $sql->execute();
                    return TRUE;

                }catch(PDOException $ex){
                    return 'ERRO: '.$ex->getMessage();
                }
            }else {
                return FALSE;
            }

         }
         public function listar() {
            try{
                $sql = $this->con->conectar()->prepare("SELECT * FROM contatos");
                $sql-> execute();
                return $sql -> fetchAll();
            }catch(PDOException $ex) {
                echo 'ERRO: ' .$ex-> getMessage();
            }
         }
        
    }



?>