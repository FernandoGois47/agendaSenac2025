 <?php

require 'conexao.class.php';
//nome,email, senha, permissoes

 Class Usuario {
    //atributos

    private $id;
    private $nome;
    private $email;
    private $senha;
    private $permissoes;

    private $pdo;



    //metodos
    //construtor
    public function __construct() {
        $this->pdo = new Conexao();
    }

    //existencia do email
    private function existeEmail($email) {
        $sql = $this->pdo->conectar()->prepare("SELECT id FROM usuario WHERE email = :email"); // puxa o email no banco pra ver se já existe um contato com o email
        $sql->bindParam(':email', $email, PDO::PARAM_STR);
        $sql->execute();

        if($sql->rowCount() > 0){
            $array = $sql->fetch(); // se encontrar, retornar o email encontrado
        } else{
            $array = array(); //se nao tem, pode atribuir para a agenda
        }
        return $array;
    }


    //cadastrar
    public function adicionar($email, $nome, $senha, $permissoes){
        $emailExistente = $this->existeEmail($email);
        if (count($emailExistente) == 0) {
            try {
                $this->nome = $nome;
                $this->email = $email;
                $this->senha = md5($senha);
                $this->permissoes = $permissoes;


                $sql = $this->pdo->conectar()->prepare("INSERT INTO usuario(nome,  email, senha, permissoes) VALUES (:nome, :email, :senha, :permissoes)");
                $sql->bindParam(":nome",             $this->nome,       PDO::PARAM_STR);
                $sql->bindParam(":email",           $this->email,       PDO::PARAM_STR);
                $sql->bindParam(":senha",           $this->senha,       PDO::PARAM_STR);
                $sql->bindParam(":permissoes",      $this->permissoes,  PDO::PARAM_STR);
                $sql->execute();
                return TRUE;

            } catch(PDOException $ex) {
                return 'ERRO: '.$ex->getMessage();
            }
        } else {
            return False;
        }
    }
    //listar
    public function listar() {
        try{
            $sql = $this->pdo->conectar()->prepare("SELECT * FROM usuario");
            $sql->execute();
            return $sql->fetchAll();


        }
        catch (PDOException $ex){
            echo 'ERRO'.$ex->getMessage();
        }
    }

    public function editar( $nome, $email,  $senha, $permissoes, $id) {
        $emailExistente = $this->existeEmail($email);
        if(count($emailExistente) > 0 && $emailExistente['id'] != $id){
            return FALSE;
        }
        else {
            try{
                $sql = $this->pdo->conectar()->prepare("UPDATE usuario SET nome = :nome,email = :email, senha = :senha, permissoes = :permissoes WHERE id = :id");
                $sql->bindParam(":nome", $nome, PDO::PARAM_STR);
                $sql->bindParam(":email", $email, PDO::PARAM_STR);
                $sql->bindParam(":senha", $senha, PDO::PARAM_STR);
                $sql->bindParam(":permissoes", $permissoes, PDO::PARAM_STR);
                $sql->bindParam(":id", $id, PDO::PARAM_STR);
                $sql->execute();
                return TRUE;
            } catch(PDOException $ex){
                echo "ERRO: ".$ex->getMessage();
            }
        }
    }
    // Método para fazer login (versão alternativa)
    public function login($email, $senha) {
        try {
            $senha_md5 = md5($senha);
            $sql = $this->pdo->conectar()->prepare("SELECT * FROM usuario WHERE email = :email AND senha = :senha");
            $sql->bindParam(':email', $email, PDO::PARAM_STR);
            $sql->bindParam(':senha', $senha_md5, PDO::PARAM_STR);
            $sql->execute();
            
            if($sql->rowCount() > 0) {
                return $sql->fetch(PDO::FETCH_ASSOC); // Retorna os dados do usuário
            } else {
                return false; // Login falhou
            }
        } catch(PDOException $ex) {
            return 'ERRO: '.$ex->getMessage();
        }
    }
 }
 
 
 
 
 
 
 
 
 
 
 
 
 
 ?>