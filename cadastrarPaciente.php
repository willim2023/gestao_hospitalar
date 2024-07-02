<?php

// Incluir arquivos necessários
include_once("services/conexao.php");
include_once("controller/pacienteController.php");
include_once("model/modelPacientes.php");

// Receber dados do POST (JSON)
$data = json_decode(file_get_contents("php://input"), true);

// Extrair dados do JSON
$nome = $data["nome"];
$sobrenome = $data["sobrenome"];
$email = $data["email"];  // Corrigido para o campo correto
$cep = $data["cep"];
$logradouro = $data["logradouro"];
$numero = $data["numero"];
$bairro = $data["bairro"];
$cidade = $data["cidade"];
$uf = $data["uf"];

// Instanciar o controlador de pacientes
$controllerPacientes = new controllerPacientes();  // Corrigido para usar PacienteController

// Chamar o método de cadastro no controlador
$resultado = $controllerPacientes->cadastrarPaciente($nome, $sobrenome, $email, $cep, $logradouro,
                                                     $numero, $bairro, $cidade, $uf);

// Verificar o resultado e enviar resposta JSON
if ($resultado) {
    $msg = array("msg" => "Paciente cadastrado com sucesso.");
    echo json_encode($msg);
} else {
    $msg = array("msg" => "Erro ao cadastrar paciente.");
    echo json_encode($msg);
}
?>
