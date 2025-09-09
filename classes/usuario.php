 <?php

//nome,email, senha, permissoes

 Class Usuario {
    //atributos

    private $pdo;



    //metodos
    //construtor
    public function __construct($dbname, $host, $usuario, $senha )
    {
       try{
            $this->pdo = new PDO("mysql:dbname=$dbname; host=$host", $usuario, $senha);
            
       } catch (PDOException $e){
            echo 'Erro com DB: '.$e->getMessage(); // erro do banco de dados
       } catch (Exception $e){
            echo 'Erro: '.$e->getMessage(); //erro geral
       }
    }


    //cadastrar
    public function cadastrar($nome, $email, $senha){
        //antes de cadastrar verificar se o email ja existe
        $cmd = $this->pdo->prepare("SELECT id FROM usuario WHERE email = :e");
        $cmd-> bindValue(":e",$email);
        $cmd->execute();
        //veio o id é pq o email ja ta cadastrado
        if ($cmd->rowCount() > 0){
            return false;
        }else{
            $cmd = $this->pdo-> prepare("INSERT INTO usuario (nome, email, senha) values (:n, :e, :s)");
            $cmd-> bindValue(":n",$nome);
            $cmd-> bindValue(":e",$email);
            $cmd-> bindValue(":s",md5($senha)); //criptografia md5
            $cmd->execute();
            return true;
        }
        
    }
    //logar
    public function logar($email,$senha){
        $cmd = $this->pdo->prepare("SELECT * from usuario WHERE email = :e AND senha = :s");
        $cmd->bindValue(":e",$email);
        $cmd->bindValue(":s",md5($senha));
        $cmd->execute();
        if($cmd->rowCount()>0){ //se foi encontrado
            $dados = $cmd->fetch();
            session_start();
            if($dados['id'] == 1){
                //caso o id for 1, ele é o administrador
                $_SESSION['id_master'] = 1;                 
            }else{
                //caso não, ele é normal
                $_SESSION['id_usuario'] = $dados['id'];
            }
            return true; //encontrado
        }else{
            return false; //não encontrado
        }
    }


 }
 
 
 
 
 
 
 
 
 
 
 
 
 
 ?>