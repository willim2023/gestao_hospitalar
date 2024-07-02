<?php
class modelExames {
    public function listarExames() {
        try {
            $conn = Database::conexao();
            $consulta = $conn->query("SELECT * FROM tbl_exames");
            $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function cadastrarExame($id_prontuario, $id_funcionario_solicitante, $id_procedimentos_exame, $data_solicitacao) {
        try {
            $conn = Database::conexao();
            $inserir = $conn->prepare("INSERT INTO tbl_exames (id_prontuario, id_funcionario_solicitante, id_procedimentos_exame, data_solicitacao) VALUES (:id_prontuario, :id_funcionario_solicitante, :id_procedimentos_exame, :data_solicitacao)");
            $inserir->bindParam(':id_prontuario', $id_prontuario);
            $inserir->bindParam(':id_funcionario_solicitante', $id_funcionario_solicitante);
            $inserir->bindParam(':id_procedimentos_exame', $id_procedimentos_exame);
            $inserir->bindParam(':data_solicitacao', $data_solicitacao);
            $inserir->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function atualizarExame($id_exame, $id_prontuario, $id_funcionario_solicitante, $id_procedimentos_exame, $data_solicitacao) {
        try {
            $conn = Database::conexao();
            $atualizar = $conn->prepare("UPDATE tbl_exames SET id_prontuario = :id_prontuario, id_funcionario_solicitante = :id_funcionario_solicitante, id_procedimentos_exame = :id_procedimentos_exame, data_solicitacao = :data_solicitacao WHERE id_exame = :id_exame");
            $atualizar->bindParam(':id_exame', $id_exame);
            $atualizar->bindParam(':id_prontuario', $id_prontuario);
            $atualizar->bindParam(':id_funcionario_solicitante', $id_funcionario_solicitante);
            $atualizar->bindParam(':id_procedimentos_exame', $id_procedimentos_exame);
            $atualizar->bindParam(':data_solicitacao', $data_solicitacao);
            $atualizar->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}
?>
