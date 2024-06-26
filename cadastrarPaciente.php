<?php

include_once("services/conexao.php");
include_once("controller/pacienteController.php");
include_once("model/modelPacientes.php");


$data = json_decode(file_get_contents("php://input"), true);

$nome = $data["nome"];
$sobrenome = $data["sobrenome"];
$email = $data["data"];
$cep = $data["cep"];
$logradouro = $data["logradouro"];
$numero = $data["numero"];
$bairro = $data["bairro"];
$cidade = $data["cidade"];
$uf = $data["uf"];

$controllerPacientes = new controllerPacientes();
$resultado = $controllerPacientes->cadastrarPaciente($nome, $sobrenome, $email, $cep, $logradouro,
                                                     $numero, $bairro, $cidade, $uf);
if($resultado) {
    $msg = array("msg" => "Paciente cadastrado com sucesso.");
    echo json_encode($msg);
} else {
    $msg = array("msg" => "Erro ao cadastrar paciente.");
    echo json_encode($msg);
}          