<?php
require_once __DIR__ . '/../connect/ConnectDB.php';
require_once __DIR__ . '/../dao/UserDAO.php';
require_once __DIR__ . '/../model/User.php';

// Instancia as classes
$user = new User();
$userdao = new UserDAO();

// Pega todos os dados passados por POST
$d = filter_input_array(INPUT_POST);

// Se a operação for cadastrar, entra nessa condição
if (isset($_POST['cadastrarUsuario'])) {
    $user->setNome($d['nome']);
    $user->setSobrenome($d['sobrenome']);
    $user->setIdade($d['idade']);
    $user->setCep($d['cep']);
    $user->setBairro($d['bairro']);
    $user->setRua($d['rua']);
    $user->setCidade($d['cidade']);
    $user->setEstado($d['estado']);
    $user->setNumero($d['numero']);
    $user->setCpf($d['cpf']);
    $user->setGenero($d['genero']);

    // Call the insertUser function in DAO
    $userdao->insertUser($user);

    // Descomente esta linha para redirecionar após o cadastro
     header("Location: logado.php");
}



else if(isset($_GET['del'])){

    $user->setId($_GET['del']);

    $userdao->delete($user);

    header("Location: logado.php");
}else{
    header("Location: logado.php");
}


// se a requisição for editar
else if(isset($_POST['editar'])){

    $usuario->setNome($d['nome']);
    $usuario->setSobrenome($d['sobrenome']);
    $usuario->setIdade($d['idade']);
    $usuario->setSexo($d['sexo']);
    $usuario->setId($d['id']);

    $usuariodao->update($usuario);

    header("Location: ../../");
}