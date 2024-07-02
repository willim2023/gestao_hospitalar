<?php
require_once 'conexao.php';
require_once 'modelExames.php';

class controllerExames {
    private $model;

    public function __construct() {
        $this->model = new modelExames();
    }

    public function listar() {
        return $this->model->listarExames();
    }

    public function cadastrar($id_prontuario, $id_funcionario_solicitante, $id_procedimentos_exame, $data_solicitacao) {
        return $this->model->cadastrarExame($id_prontuario, $id_funcionario_solicitante, $id_procedimentos_exame, $data_solicitacao);
    }

    public function atualizar($id_exame, $id_prontuario, $id_funcionario_solicitante, $id_procedimentos_exame, $data_solicitacao) {
        return $this->model->atualizarExame($id_exame, $id_prontuario, $id_funcionario_solicitante, $id_procedimentos_exame, $data_solicitacao);
    }
}
?>
