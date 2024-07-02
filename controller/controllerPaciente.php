<?php
require_once 'conexao.php';
require_once 'modelPacientes.php';

class controllerPacientes {
    private $model;

    public function __construct() {
        $this->model = new modelPacientes();
    }

    public function listar() {
        return $this->model->listarPacientes();
    }

    public function cadastrar($id_prontuario, $nome, $sobrenome, $email, $cep, $logradouro, $numero, $bairro, $cidade, $uf, $id_status) {
        return $this->model->cadastrarPaciente($id_prontuario, $nome, $sobrenome, $email, $cep, $logradouro, $numero, $bairro, $cidade, $uf, $id_status);
    }

    public function atualizar($id_paciente, $id_prontuario, $nome, $sobrenome, $email, $cep, $logradouro, $numero, $bairro, $cidade, $uf, $id_status) {
        return $this->model->atualizarPaciente($id_paciente, $id_prontuario, $nome, $sobrenome, $email, $cep, $logradouro, $numero, $bairro, $cidade, $uf, $id_status);
    }
}
?>
