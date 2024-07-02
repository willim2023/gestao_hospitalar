<?php
require_once 'conexao.php';
require_once 'modelFuncionarios.php';

class controllerFuncionarios {
    private $model;

    public function __construct() {
        $this->model = new modelFuncionarios();
    }

    public function listar() {
        return $this->model->listarFuncionarios();
    }

    public function cadastrar($nome, $sobrenome, $id_cargo, $id_status) {
        return $this->model->cadastrarFuncionario($nome, $sobrenome, $id_cargo, $id_status);
    }

    public function atualizar($id_funcionario, $nome, $sobrenome, $id_cargo, $id_status) {
        return $this->model->atualizarFuncionario($id_funcionario, $nome, $sobrenome, $id_cargo, $id_status);
    }
}
?>
