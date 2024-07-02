<?php
class modelStatus {
    public function listarStatus() {
        try {
            $conn = Database::conexao();
            $consulta = $conn->query("SELECT * FROM tbl_status");
            $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function cadastrarStatus($descricao) {
        try {
            $conn = Database::conexao();
            $inserir = $conn->prepare("INSERT INTO tbl_status (descricao) VALUES (:descricao)");
            $inserir->bindParam(':descricao', $descricao);
            $inserir->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function atualizarStatus($id_status, $descricao) {
        try {
            $conn = Database::conexao();
            $atualizar = $conn->prepare("UPDATE tbl_status SET descricao = :descricao WHERE id_status = :id_status");
            $atualizar->bindParam(':id_status', $id_status);
            $atualizar->bindParam(':descricao', $descricao);
            $atualizar->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}
?>
