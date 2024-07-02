<?php
class modelPacientes {
    public function listarPacientes() {
        try {
            $conn = Database::conexao();
            $consulta = $conn->query("SELECT * FROM tbl_pacientes");
            $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function cadastrarPaciente($id_prontuario, $nome, $sobrenome, $email, $cep, $logradouro, $numero, $bairro, $cidade, $uf, $id_status) {
        try {
            $conn = Database::conexao();
            $inserir = $conn->prepare("INSERT INTO tbl_pacientes (id_prontuario, nome, sobrenome, email, cep, logradouro, numero, bairro, cidade, uf, id_status) VALUES (:id_prontuario, :nome, :sobrenome, :email, :cep, :logradouro, :numero, :bairro, :cidade, :uf, :id_status)");
            $inserir->bindParam(':id_prontuario', $id_prontuario);
            $inserir->bindParam(':nome', $nome);
            $inserir->bindParam(':sobrenome', $sobrenome);
            $inserir->bindParam(':email', $email);
            $inserir->bindParam(':cep', $cep);
            $inserir->bindParam(':logradouro', $logradouro);
            $inserir->bindParam(':numero', $numero);
            $inserir->bindParam(':bairro', $bairro);
            $inserir->bindParam(':cidade', $cidade);
            $inserir->bindParam(':uf', $uf);
            $inserir->bindParam(':id_status', $id_status);
            $inserir->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function atualizarPaciente($id_paciente, $id_prontuario, $nome, $sobrenome, $email, $cep, $logradouro, $numero, $bairro, $cidade, $uf, $id_status) {
        try {
            $conn = Database::conexao();
            $atualizar = $conn->prepare("UPDATE tbl_pacientes SET id_prontuario = :id_prontuario, nome = :nome, sobrenome = :sobrenome, email = :email, cep = :cep, logradouro = :logradouro, numero = :numero, bairro = :bairro, cidade = :cidade, uf = :uf, id_status = :id_status WHERE id_paciente = :id_paciente");
            $atualizar->bindParam(':id_paciente', $id_paciente);
            $atualizar->bindParam(':id_prontuario', $id_prontuario);
            $atualizar->bindParam(':nome', $nome);
            $atualizar->bindParam(':sobrenome', $sobrenome);
            $atualizar->bindParam(':email', $email);
            $atualizar->bindParam(':cep', $cep);
            $atualizar->bindParam(':logradouro', $logradouro);
            $atualizar->bindParam(':numero', $numero);
            $atualizar->bindParam(':bairro', $bairro);
            $atualizar->bindParam(':cidade', $cidade);
            $atualizar->bindParam(':uf', $uf);
            $atualizar->bindParam(':id_status', $id_status);
            $atualizar->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}
?>
