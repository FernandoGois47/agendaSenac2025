<?php

if(isset($_POST['nome'])){

    $nome = htmlentities(addslashes($_POST['nome']));
    $email = htmlentities(addslashes($_POST['email']));
    $senha = htmlentities(addslashes($_POST['senha']));
    //evitar comandos html ou sql 

    if(!empty($nome) && !empty($email) && !empty($senha)){
        require_once 'classes/usuario.php';
        $us = new Usuario("agendasenac2025", "localhost", "root", "");
        if($us-> cadastrar($nome, $email, $senha)){
            echo "Cadastrador com sucesso!";
        }else{
            echo "E-mail já cadastrado!";
        }  
    }else{
        echo"Preencha todos os campos!";
    }

}

?>