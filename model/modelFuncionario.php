<?php
class modelFuncionarios {
    public function listarFuncionarios() {
        try {
            $conn = Database::conexao();
            $consulta = $conn->query("SELECT * FROM tbl_funcionarios");
            $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function cadastrarFuncionario($nome, $sobrenome, $id_cargo, $id_status) {
        try {
            $conn = Database::conexao();
            $inserir = $conn->prepare("INSERT INTO tbl_funcionarios (nome, sobrenome, id_cargo, id_status) VALUES (:nome, :sobrenome, :id_cargo, :id_status)");
            $inserir->bindParam(':nome', $nome);
            $inserir->bindParam(':sobrenome', $sobrenome);
            $inserir->bindParam(':id_cargo', $id_cargo);
            $inserir->bindParam(':id_status', $id_status);
            $inserir->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function atualizarFuncionario($id_funcionario, $nome, $sobrenome, $id_cargo, $id_status) {
        try {
            $conn = Database::conexao();
            $atualizar = $conn->prepare("UPDATE tbl_funcionarios SET nome = :nome, sobrenome = :sobrenome, id_cargo = :id_cargo, id_status = :id_status WHERE id_funcionario = :id_funcionario");
            $atualizar->bindParam(':id_funcionario', $id_funcionario);
            $atualizar->bindParam(':nome', $nome);
            $atualizar->bindParam(':sobrenome', $sobrenome);
            $atualizar->bindParam(':id_cargo', $id_cargo);
            $atualizar->bindParam(':id_status', $id_status);
            $atualizar->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}
?>
