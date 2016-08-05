<?php

if(isset($_POST['nome']))
{
    echo json_encode(salvarFormulario());
}

function salvarFormulario()
{
    $retorno = array('mensagem' => '',
                    'sucesso' => false);

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "33e40";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error)
    {
        $retorno['sucesso'] = false;
        die("Faiô: " . $conn->connect_error);
    }

    $sql = 'SELECT count(*)qtd
            FROM contatos
            WHERE nome = "' . $_POST["nome"] . '"
            OR email = "' . $_POST["email"] . '";';
    $sql = $conn->query($sql);
    $resultadinho = $sql->fetch_assoc();

    if($resultadinho['qtd']>0)
    {
        $retorno['mensagem'] = "Ei, este nome ou email já existe!";
        return $retorno;
    }

    $sql = "INSERT INTO contatos (nome, email)
                VALUES ('{$_POST['nome']}','{$_POST['email']}')";

    if ($conn->query($sql) === TRUE)
    {
        $retorno['sucesso'] = true;
    } else {
        $retorno['sucesso'] = false;
    }

    $conn->close();

    if($retorno['sucesso'] == false)
    {
        $retorno['mensagem'] = 'Oh, não... deu algo errado!<br>Mas não se preocupe, ja estamos cuidando disso!';
    }else{
        $retorno['mensagem'] = 'Oba, ja registramos teu contato, Diva(o) ' . $_POST['nome'] . '!<br>Em breve entraremos em contato, viu?';
    }

    return $retorno;
}

 ?>
